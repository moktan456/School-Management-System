<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; //For eloquent use

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Query builder way
        // DB::table('users')->insert([
        //     'usertype' => 'Admin',
        //     'name' => 'Nima Dorji Moktan',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('admin123'),
        //     'image' => '202105051659Half Photo - Self.jpg',
        // ]);
        //Eloquent way
        $user = new User;
        $user->usertype = 'Admin';
        $user->name = 'Nima Dorji Moktan';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('admin123');
        $user->image = '202105051659Half Photo - Self.jpg';
        $user->save();

    }
}
