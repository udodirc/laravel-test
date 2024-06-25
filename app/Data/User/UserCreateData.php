<?php

namespace App\Data\User;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserCreateData extends Data
{
    public function __construct(
        public string $email,
        public string $name,
        public string $password,
        public Carbon|Optional|null $emailVerifiedAt = new Optional()
    ) {
    }
}
