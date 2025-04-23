<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            'Clothing',
            'Jewellery',
            'Shoes',
            'Accessories',
            'Collections',
            'Sale',
        ];

        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'name' => $category,
                'slug' => Str::slug($category),
                'visible' => true, // default value
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('categories')->insert($data);
    }
}
