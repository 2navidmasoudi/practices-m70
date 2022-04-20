<?php

namespace App\User\Account;

use App\User\Ability\CanLike;
use App\User\User;

class Normal extends User
{
    use CanLike;
}
