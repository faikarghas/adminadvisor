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
            // [
            //     'username' => 'admin',
            //     'name' => 'admin',
            //     'email' => 'admin@aimzsea.com',
            //     'level' => 'admin',
            //     'password' => bcrypt('adminaimzsea123!')
            // ],
            // [
            //     'username' => 'advisor',
            //     'name' => 'David Orlando',
            //     'email' => 'advisor@aimzsea.com',
            //     'level' => 'advisor',
            //     'idAdvisor' => 3,
            //     'password' => bcrypt('advisoraimzsea123!')
            // ],
            [
                'username' => 'kirstieadvisor',
                'name' => 'Kirstie Irmana',
                'email' => 'advisorkirstie@aimzsea.com',
                'level' => 'advisor',
                'idAdvisor' => 4,
                'password' => bcrypt('advisoraimzsea123!')
            ],
            [
                'username' => 'stellaadvisor',
                'name' => 'Stella Hie',
                'email' => 'advisorstella@aimzsea.com',
                'level' => 'advisor',
                'idAdvisor' => 4,
                'password' => bcrypt('advisoraimzsea123!')
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
