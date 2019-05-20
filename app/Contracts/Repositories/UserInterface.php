<?php

namespace App\Contracts\Repositories;

use League\Fractal\Manager;
use App\Transformers\UserTransformer;
use App\Entities\User;

interface UserInterface {
    
    public function __construct(Manager $fractal, UserTransformer $transform, User $user);

    public function index();

    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function withTrashed();

    public function onlyTrashed();

    public function destroy($id);
}
