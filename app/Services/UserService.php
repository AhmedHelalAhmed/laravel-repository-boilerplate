<?php

namespace App\Services;

use App\Contracts\Repositories\UserInterface;

class UserService
{
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        try {
            $users = $this->user->index();

            return $users;
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
            return $user;
        }
    }

    public function update($data, $id)
    {
        try {
            $user = $this->user->update($data, $id);

            return $user;
        }
        catch(\Exception $e) {
            return $e;
        }
    }

    public function delete($id)
    {
        try {
            $user = $this->user->delete($id);

            return $user;
        }
        catch(\Exception $e) {
            return $e;
        }
    }
}
