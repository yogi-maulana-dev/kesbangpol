<?php

namespace Database\Seeders;

use App\Models\Categori;
use Illuminate\Database\Seeder;


class CategoriSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         $categori = new Categori;
         $categori->name = "Berita";
         $categori->slug = "Berita";
         $categori->save();


    }
}
