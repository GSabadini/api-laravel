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
        $user->id = 'ca90ba97-8e0b-4ec5-a2ed-25fb68a9cd29';
        $user->name = 'DevSquad';
        $user->email = 'devsquad@desenvolvimento.com';
        $user->password = bcrypt('devsquad');

        $user->save();
    }
}
