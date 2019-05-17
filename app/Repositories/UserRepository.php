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
        try {
            return $this->user->all();
        }
        catch (\Exception $e) {
            return $e;
        }
    }

    public function create($data)
    {
        try {
            $user = $this->user->create($data);

            return $user;
        }
        catch(\Exception $e) {
            return $e;
        }
    }

    public function update($data, $id)
    {
        try {
            $source = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password']
            ];

            $user = $this->user->where('id', $id)->update($source);

            return $user;
        }
        catch(\Exception $e) {
            return $e;
        }
    }

    public function delete($id)
    {
        try{
            $user = $this->user->where('id', $id)->softDeletes();

            dd(1);

            return $user;
        }
        catch(\Exception $e) {
            return $e;
        }
    }
}
