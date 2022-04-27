<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;


class AdminSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         $user = new Admin;
         $user->username = "User1234";
         $user->nama = "User123";
         $user->alamat = "User123";
         $user->nohp = "0896";
         $user->email = "user12@mail.com";
         $user->password = bcrypt('12345678');
         $user->save();

    }
}
