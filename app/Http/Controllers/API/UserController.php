<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\API\APIController;

/**
 * Methods List
 * Index
 * Create
 * Update
 * Delete
 * Destroy
 */
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
            $users = $users['data'];

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

    public function destroy($id)
    {
        try {
            $user = $this->user->destroy($id);

            return $this->responseJson($user, 200);
        }
        catch(\Exception $e) {
            return $this->responseJson($e->getMessage(), 400);
        }
    }

    public function withTrashed()
    {
        try {
            $users = $this->user->withTrashed();

            return $this->responseJson($users, 200);
        }
        catch(\Exception $e) {
            return $this->responseJson($e->getMessage(), 400);
        }
    }

    public function onlyTrashed()
    {
        try {
            $users = $this->user->onlyTrashed();

            return $this->responseJson($users, 200);
        }
        catch(\Exception $e) {
            return $this->responseJson($e->getMessage(), 400);
        }
    }
}
