<?php

namespace Database\Seeders;

use App\Models\Loginadmin;
use Illuminate\Database\Seeder;


class AkunSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $loginadmin = [
  [
            'username'=>'admin',
            'email'=>'admin11@gmail.com',
            'password'=>bcrypt('admin123'),
            'nama'=>'admin11@.com'
        ]
        ];
        foreach ($loginadmin as $key => $value){
 Loginadmin::create($value);
        }
    }
}
