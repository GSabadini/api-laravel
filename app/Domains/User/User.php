<?php

namespace App\Domains\User;

use App\Domains\Uuid as UuidTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Domains\User
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 */
class User extends Authenticatable
{
    use Notifiable;
//    use UuidTrait;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];
}
