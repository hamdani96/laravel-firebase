<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hamdan',
            'email' => 'hamdani@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Meliodas',
            'email' => 'meliodas@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
