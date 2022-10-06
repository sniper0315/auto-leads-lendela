<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the countries table
        \DB::table('categories')->delete();

        //Get all of the countries
        \DB::table('categories')->insert([
            'category_name' => 'Real Estate',
            'category_slug' => str_slug('Real Estate')
        ]);
    }
}
