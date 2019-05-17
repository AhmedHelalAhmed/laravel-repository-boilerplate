<?php

namespace App\Http\Controllers\API;

use App\Traits\JsonResponse;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class APIController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, JsonResponse;

    public function info()
    {
        return $this->responseJson([[
            'app' => config('app.name'),
            'name' => config('api.name'),
            'version' => config('api.version'),
            'gd' => (function_exists('gd_info')) ? gd_info() : 'No gd_info',
            'imagick' => (extension_loaded('imagick'))? 'Imagick Loaded' : 'Imagick not installed',
        ]]);
    }
}
