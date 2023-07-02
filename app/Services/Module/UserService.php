<?php

namespace App\Services\Module;

use App\Models\User;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function __construct(User $userModel)
    {
        parent::__construct($userModel);
    }

    // Add additional methods specific to User service
}
