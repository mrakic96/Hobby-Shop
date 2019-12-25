<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        Product::create([
            'name' => 'Olovka HB',
            'slug' => 'olovka-hb',
            'details' => 'Olovka vrste HB',
            'price' => 5,
            'description' => 'Lorem ipsum dolor sit amet, vel idque fastidii ut, pro no liber appellantur, 
                                in detracto erroribus ius.',
        ]);

        Product::create([
            'name' => 'Olovka B',
            'slug' => 'olovka-b',
            'details' => 'Olovka vrste B',
            'price' => 5,
            'description' => 'Lorem ipsum dolor sit amet, vel idque fastidii ut, pro no liber appellantur, 
                                in detracto erroribus ius.',
        ]);

        Product::create([
            'name' => 'Platno veliko',
            'slug' => 'platno-veliko',
            'details' => 'Platno velicine 2x1.5 m',
            'price' => 20,
            'description' => 'Lorem ipsum dolor sit amet, vel idque fastidii ut, pro no liber appellantur, 
                                in detracto erroribus ius.',
        ]);

        Product::create([
            'name' => 'Platno srednje',
            'slug' => 'platno-srednje',
            'details' => 'Platno velicine 1.5x1.1 m',
            'price' => 20,
            'description' => 'Lorem ipsum dolor sit amet, vel idque fastidii ut, pro no liber appellantur, 
                                in detracto erroribus ius.',
        ]);

        Product::create([
            'name' => 'Platno malo',
            'slug' => 'platno-malo',
            'details' => 'Platno velicine 1x0.6 m',
            'price' => 20,
            'description' => 'Lorem ipsum dolor sit amet, vel idque fastidii ut, pro no liber appellantur, 
                                in detracto erroribus ius.',
        ]);
    }
}
