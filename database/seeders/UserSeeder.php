<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'name' => 'Amal',
                'email' => 'amal@gmail.com',
                'contact_no' => '0771294850',
                'active' => 1,
                'admin' => 1,
                'email_verified_at' => null,
                'password' => '$2y$10$HuxH7N2PlQ1t28TWrYOH8.CLR4Ex5QohszUv8U2E8AGiRNW4N7wcq',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bimal',
                'email' => 'bimal@gmail.com',
                'contact_no' => '0775759460',
                'active' => 1,
                'admin' => 0,
                'email_verified_at' => null,
                'password' => '$2y$10$6T90tsmh/HSihC082dZgy.Ug1ozbXf9MUX6SMm/Ns/suHWfQJKJ2G',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hirimal',
                'email' => 'hirimal@gmail.com',
                'contact_no' => '0775755765',
                'active' => 1,
                'admin' => 0,
                'email_verified_at' => null,
                'password' => '$2y$10$If6lEkG1ClU6S9VhYhxbFe5y9Smru2nhlQfHgdhzNy.pxVZuUNj/W',
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);


    }
}
