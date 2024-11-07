<?php

namespace App\Core\User\Repositories;

use App\Core\Architecture\Abstracts\AbstractRepository;
use App\Models\User;

class UserRepository extends AbstractRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}