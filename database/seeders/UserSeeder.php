<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            'name'      => 'Admin',
            'username'  => 'admin01',
            'email'     => 'admin@mail.com',
            'nip'       => '123',
            'password'  => bcrypt('password'),
        ]);

        $user->assignRole('Super User');
    }
}
