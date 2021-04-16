<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ProduitSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     CategorySeeder::class,
        // ]);
        // // $this->call([
        // //     ProduitSeeder::class,

        // // ]);
        // //creer des produits
        // Produit::factory(10)->create();

        // //creer des utilisateurs
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
        ]);
       
        
    }
}
