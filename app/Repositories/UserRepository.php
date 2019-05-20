<?php

namespace App\Repositories;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Transformers\UserTransformer;

use App\Entities\User;
use App\Contracts\Repositories\UserInterface;

class UserRepository implements UserInterface
{
    public function __construct(Manager $fractal, UserTransformer $transform, User $user)
    {
        $this->fractal      = $fractal;
        $this->transform    = $transform;
        $this->user         = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        $users = new Collection($users, $this->transform);
        $users = $this->fractal->createData($users);

        return $users->toArray();
    }

    public function create($data)
    {
        $user = $this->user->create($data);

        return $user;
    }

    public function update($data, $id)
    {
        $data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ];

        $user = $this->user->where('id', $id)->update($data);

        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->where('id', $id)->delete();

        return $user;
    }

    public function withTrashed()
    {
        $users = $this->user->withTrashed()->get();

        return $users;
    }

    public function onlyTrashed()
    {
        $users = $this->user->onlyTrashed()->get();

        return $users;
    }

    public function destroy($id)
    {
        $users = $this->user->destroy($ids);

        return $users;
    }
}
