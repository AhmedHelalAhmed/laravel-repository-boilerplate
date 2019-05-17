<?php

namespace App\Contracts\Repositories;

use Illuminate\Container\Container as Application;
use App\Entities\User;

interface UserInterface {
    public function __construct(User $user);

    public function index();

    public function create($data);

    public function update($data, $id);

    public function delete($id);
}
