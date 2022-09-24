<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $user = new User();
        $user->name = 'Cristian Antonio';
        $user->email = 'tauro24_vs@hotmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole('admin');

        $user = new User();
        $user->name = 'Pedro Pablo';
        $user->email = 'pedropablo@hotmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole('usuario');
    }
}
