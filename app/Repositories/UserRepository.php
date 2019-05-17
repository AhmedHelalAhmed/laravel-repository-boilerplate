<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;
use App\Contracts\Repositories\UserInterface as UserInterface;
use App\Entities\User;

class UserRepository implements UserInterface
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return $this->user->all();
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
}
