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
            return $this->responseJson($e->getMessage(), 400);
        }
    }

    public function create(Request $request)
    {
        try {
            $user = $this->user->create($request->all());

            return $this->responseJson($user, 200);
        }
        catch(\Exception $e) {  
            return $this->responseJson($e->getMessage(), 400);
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
            return $this->responseJson($e->getMessage(), 400);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $user = $this->user->delete($id);

            return $this->responseJson($user, 200);
        }
        catch(\Exception $e) {
            return $this->responseJson($e->getMessage(), 400);
        }
    }

    /** api/user/trashed/with/index */
    public function withTrashed()
    {
        try {
            $users = $this->user->withTrashed();

            return $users;
        }
        catch(\Exception $e) {
            return $this->responseJson($e->getMessage(), 400);
        }
    }

    /** api/user/trashed/only/index */
    public function onlyTrashed()
    {
        try {
            $users = $this->user->onlyTrashed();

            return $users;
        }
        catch(\Exception $e) {
            return $this->responseJson($e->getMessage(), 400);
        }
    }
}
