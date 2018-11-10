<?php

use Illuminate\Database\Seeder;
use App\Domains\User\User;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->name = 'DevSquad';
        $user->email = 'devsquad@development.com';
        $user->password = bcrypt('devsquad');

        $user->save();
    }
}
