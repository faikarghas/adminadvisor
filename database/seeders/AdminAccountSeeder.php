<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'admin',
                'email' => 'admin@aimzsea.com',
                'level' => 'admin',
                'password' => bcrypt('adminaimzsea123!')
            ],
            [
                'username' => 'advisor',
                'name' => 'advisor',
                'email' => 'advisor@aimzsea.com',
                'level' => 'advisor',
                'password' => bcrypt('advisoraimzsea123!')
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
