<?php

namespace App\User\Account;

use App\User\Ability\CanComment;
use App\User\Ability\CanLike;
use App\User\User;

class Silver extends User
{
    use CanLike, CanComment;
}
