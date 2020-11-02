<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'pipe14';
        $user->email = 'pipe14@gmail.com';
        $user->tel = '0960927904';
        $user->password = Hash::make('pipe1234');
        $user->save();
    }
}
