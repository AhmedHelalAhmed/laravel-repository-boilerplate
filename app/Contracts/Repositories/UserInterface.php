<?php

namespace App\Contracts\Repositories;

/* User Dependencies */
use App\Entities\User;

interface UserInterface {
    
    public function __construct(User $user);

    public function index();

    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function withTrashed();

    public function onlyTrashed();

    public function destroy($id);
}
