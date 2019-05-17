<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\API\APIController;

class UserController extends APIController
{
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        try {
            $users = $this->user->index();

            return $this->responseJson($users, 200);
        }
        catch (\Exception $e) {
            return $this->responseJson($e, 400);
        }
    }

    public function create(Request $request)
    {
        try {
            $user = $this->user->create($request->all());

            return $this->responseJson($user, 200);
        }
        catch(\Exception $e) {  
            return $this->responseJson($e, 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $user = $this->user->update($data, $id);

            return $this->responseJson($user, 200);
        }
        catch(\Exception $e) {
            return $this->responseJson($e, 400);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $user = $this->user->delete($id);

            return $this->responseJson($user, 200);
        }
        catch(\Exception $e) {
            return $this->responseJson($e, 400);
        }
    }
}
