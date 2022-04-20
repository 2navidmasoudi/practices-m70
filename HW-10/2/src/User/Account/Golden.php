<?php

namespace App\User\Account;

use App\User\Ability\CanArchive;
use App\User\Ability\CanComment;
use App\User\Ability\CanLike;
use App\User\User;

class Golden extends User
{
    use CanLike, CanComment, CanArchive;
}
