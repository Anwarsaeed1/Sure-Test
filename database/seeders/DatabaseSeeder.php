<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    // If Have Two Enviroment and need Change Seeder in Production , Testing , Local Now i will do same in all 
    if (App::Environment() === 'local'){
       
        $this->call(ItemTableSeeder::class);
    
    }elseif(App::Environment() === 'production'){

        $this->call(ItemTableSeeder::class); 

    }elseif(App::Environment() === 'testing'){
   
        $this->call(ItemTableSeeder::class); 
   
    }

    }
}
