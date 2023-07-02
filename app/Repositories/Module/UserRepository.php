<?php

namespace App\Repositories\Module;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct(User $userModel)
    {
        parent::__construct($userModel);
    }

    // Add additional methods specific to User repository
}
