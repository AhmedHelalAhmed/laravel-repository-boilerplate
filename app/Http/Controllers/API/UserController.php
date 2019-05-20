<?php

namespace App\Http\Controllers\API;

/* User Dependencies */
use App\Http\Controllers\API\APIController;
use App\Services\UserService;
use App\Transformers\UserTransformer;

/**
 * Methods List
 * - Index
 * - Create
 * - Update
 * - Delete
 * - Destroy
 * - withTrashed
 * - onlyTrashed
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

            return $this->response->paginator($users, new UserTransformer)->setStatusCode(200);
        }
        catch (\Exception $e) {
            return $this->response->error($e->getMessage(), 400);
        }
    }

    public function create(Request $request)
    {
        try {
            $user = $this->user->create($request->all());

            return $this->response->array($user)->setStatusCode(200);
        }
        catch(\Exception $e) {  
            return $this->response->error($e->getMessage(), 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $user = $this->user->update($data, $id);

            return $this->response->array($user)->setStatusCode(200);
        }
        catch(\Exception $e) {
            return $this->response->error($e->getMessage(), 400);
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $user = $this->user->delete($id);

            return $this->response->array($user)->setStatusCode(200);
        }
        catch(\Exception $e) {
            return $this->response->error($e->getMessage(), 400);
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->user->destroy($id);

            return $this->response->array($user)->setStatusCode(200);
        }
        catch(\Exception $e) {
            return $this->response->error($e->getMessage(), 400);
        }
    }

    public function withTrashed()
    {
        try {
            $users = $this->user->withTrashed();

            return $this->response->array($users)->setStatusCode(200);
        }
        catch(\Exception $e) {
            return $this->response->error($e->getMessage(), 400);
        }
    }

    public function onlyTrashed()
    {
        try {
            $users = $this->user->onlyTrashed();

            return $this->response->array($users)->setStatusCode(200);
        }
        catch(\Exception $e) {
            return $this->response->error($e->getMessage(), 400);
        }
    }
}
