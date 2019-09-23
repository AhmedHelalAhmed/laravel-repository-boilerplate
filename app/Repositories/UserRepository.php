<?php

namespace App\Repositories;

/* User Dependencies */
use App\Entities\User;
use App\Contracts\Repositories\UserInterface;

class UserRepository implements UserInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->paginate(25);

        return $users;
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
        $users = $this->user->where('id', $id)->destroy();

        return $users;
    }
}
