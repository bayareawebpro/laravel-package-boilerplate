<?php

namespace Workbench\App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as BaseUser;

class User extends BaseUser
{
    use HasFactory;
    protected static function newFactory(): Factory
    {
        return \Orchestra\Testbench\Factories\UserFactory::new();
    }
}
