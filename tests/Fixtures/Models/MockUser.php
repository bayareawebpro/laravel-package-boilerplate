<?php

namespace BayAreaWebPro\PackageName\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;

class MockUser extends Model
{
    protected $table = 'users';

    public $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'email_verified_at',
    ];
}

