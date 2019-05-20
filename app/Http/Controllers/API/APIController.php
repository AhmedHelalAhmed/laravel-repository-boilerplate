<?php

namespace App\Http\Controllers\API;

use App\Traits\JsonResponse;
use Dingo\Api\Routing\Helpers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class APIController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Helpers;

    public function info()
    {
        return $this->response->array([
            'app' => config('app.name'),
            'name' => config('api.name'),
            'version' => config('api.version'),
            'gd' => (function_exists('gd_info')) ? gd_info() : 'No gd_info',
            'imagick' => (extension_loaded('imagick')) ? 'Imagick Loaded' : 'Imagick not installed',
        ])->setStatusCode(200);
    }
}
