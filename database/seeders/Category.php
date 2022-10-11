<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Categories::turnicate();
        $category->create([
            'name' => 'Category 1',
            'slug' => 'category-1',
            'description' => 'Category 1 Description',
        ]);
    }
}
