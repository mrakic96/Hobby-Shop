<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create(['name' => 'Olovke']);
        Category::create(['name' => 'Kistovi']);
        Category::create(['name' => 'Platna']);
    }
}
