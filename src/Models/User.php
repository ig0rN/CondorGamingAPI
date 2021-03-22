<?php

namespace Src\Models;

use Core\Model;

class User extends Model
{
    protected string $table = 'admin_users';
    protected array $fillable = ['username', 'password'];
}