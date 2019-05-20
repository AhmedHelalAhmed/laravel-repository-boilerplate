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
        $users = $this->user->index();

        return $users;
    }

    public function create($data)
    {
        $user = $this->user->create($data);

        return $user;
    }

    public function update($data, $id)
    {
        $user = $this->user->update($data, $id);

        return $user;
    }

    public function delete($id)
    {
        $user = $this->user->delete($id);

        return $user;
    }

    public function withTrashed()
    {
        $users = $this->user->withTrashed();

        return $users;
    }

    public function onlyTrashed()
    {
        $users = $this->user->onlyTrashed();

        return $users;
    }

    public function destroy($id)
    {
        $user = $this->user->destroy($id);

        return $user;
    }
}
