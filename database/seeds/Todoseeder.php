<?php

use Illuminate\Database\Seeder;

class Todoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Todo::truncate(); 
        factory(App\Todo::class, 5)->create();
    }
}
