<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $brands = [
            ['name' => 'Zara', 'website' => 'https://www.zara.com'],
            ['name' => 'H&M', 'website' => 'https://www.hm.com'],
            ['name' => 'Gucci', 'website' => 'https://www.gucci.com'],
            ['name' => 'Louis Vuitton', 'website' => 'https://www.louisvuitton.com'],
            ['name' => 'Balenciaga', 'website' => 'https://www.balenciaga.com'],
            ['name' => 'Uniqlo', 'website' => 'https://www.uniqlo.com'],
            ['name' => 'Tommy Hilfiger', 'website' => 'https://www.tommy.com'],
            ['name' => 'Ralph Lauren', 'website' => 'https://www.ralphlauren.com'],
            ['name' => 'Pandora', 'website' => 'https://www.pandora.net'],
            ['name' => 'Tiffany & Co.', 'website' => 'https://www.tiffany.com'],
            ['name' => 'Swarovski', 'website' => 'https://www.swarovski.com'],
            ['name' => 'Cartier', 'website' => 'https://www.cartier.com'],
            ['name' => 'Chopard', 'website' => 'https://www.chopard.com'],
            ['name' => 'Bvlgari', 'website' => 'https://www.bvlgari.com'],
            ['name' => 'Nike', 'website' => 'https://www.nike.com'],
            ['name' => 'Adidas', 'website' => 'https://www.adidas.com'],
            ['name' => 'Puma', 'website' => 'https://www.puma.com'],
            ['name' => 'Reebok', 'website' => 'https://www.reebok.com'],
            ['name' => 'Vans', 'website' => 'https://www.vans.com'],
            ['name' => 'Converse', 'website' => 'https://www.converse.com'],
            ['name' => 'New Balance', 'website' => 'https://www.newbalance.com'],
            ['name' => 'Timberland', 'website' => 'https://www.timberland.com'],
            ['name' => 'Fossil', 'website' => 'https://www.fossil.com'],
            ['name' => 'Ray-Ban', 'website' => 'https://www.ray-ban.com'],
            ['name' => 'Michael Kors', 'website' => 'https://www.michaelkors.com'],
            ['name' => 'Coach', 'website' => 'https://www.coach.com'],
            ['name' => 'Prada', 'website' => 'https://www.prada.com'],
            ['name' => 'Versace', 'website' => 'https://www.versace.com'],
            ['name' => 'Chanel', 'website' => 'https://www.chanel.com'],
            ['name' => 'Hermès', 'website' => 'https://www.hermes.com'],
            ['name' => 'Burberry', 'website' => 'https://www.burberry.com'],
            ['name' => 'Dolce & Gabbana', 'website' => 'https://www.dolcegabbana.com'],
            ['name' => 'Fendi', 'website' => 'https://www.fendi.com'],
            ['name' => 'Givenchy', 'website' => 'https://www.givenchy.com'],
            ['name' => 'Rolex', 'website' => 'https://www.rolex.com'],
            ['name' => 'Omega', 'website' => 'https://www.omegawatches.com'],
            ['name' => 'TAG Heuer', 'website' => 'https://www.tagheuer.com'],
            ['name' => 'Bose', 'website' => 'https://www.bose.com'],
            ['name' => 'Beats by Dre', 'website' => 'https://www.beatsbydre.com'],
            ['name' => 'JBL', 'website' => 'https://www.jbl.com'],
            ['name' => 'Dyson', 'website' => 'https://www.dyson.com'],
            ['name' => 'Apple', 'website' => 'https://www.apple.com'],
            ['name' => 'Samsung', 'website' => 'https://www.samsung.com'],
            ['name' => 'Sony', 'website' => 'https://www.sony.com'],
            ['name' => 'Microsoft', 'website' => 'https://www.microsoft.com'],
        ];

        $data = [];

        foreach ($brands as $brand) {
            $data[] = [
                'name' => $brand['name'],
                'slug' => Str::slug($brand['name']),
                'website' => $brand['website'],
                'visible' => true, // default value
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('brands')->insert($data);
    }
}
