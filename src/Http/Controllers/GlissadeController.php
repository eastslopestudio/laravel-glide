<?php

namespace Eastslopestudio\Glissade\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotReadableException;
use League\Glide\Filesystem\FileNotFoundException;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class GlissadeController extends Controller
{
    public function __invoke(Request $request, string $path): StreamedResponse
    {
        try {
            SignatureFactory::create((string) env('APP_KEY'))->validateRequest(config('glissade.base_url').'/'.$path, $request->all());
            $server = ServerFactory::create([
                'response' => new LaravelResponseFactory($request),
                'source' => Storage::disk(config('glissade.disks.source'))->getDriver(),
                'cache' => Storage::disk(config('glissade.disks.cache'))->getDriver(),
                'cache_path_prefix' => config('glissade.cache_path_prefix'),
                'base_url' => config('glissade.base_url'),
                'max_image_size' => config('glissade.max_image_size'),
            ]);

            return $server->getImageResponse($path, $request->all());
        } catch (SignatureException $e) {
            abort(403, $e->getMessage());
        } catch (FileNotFoundException $e) {
            abort(404, $e->getMessage());
        } catch (NotReadableException $e) {
            abort(422, $e->getMessage());
        } catch (\Exception $e) {
            abort($e->getCode(), $e->getMessage());
        }
    }
}
