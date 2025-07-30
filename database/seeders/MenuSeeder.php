<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'id' => 1,
                'name' => 'Tentang Kami',
                'url' => '#',
                'parent_id' => null,
            ],
            [
                'id' => 2,
                'name' => 'Tentang Kami',
                'url' => '/about',
                'parent_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Produk ES.ER.CE',
                'url' => '/product',
                'parent_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Blog',
                'url' => '#',
                'parent_id' => null,
            ],
            [
                'id' => 5,
                'name' => 'Berita Terkini',
                'url' => '/article',
                'parent_id' => 4,
            ],
            [
                'id' => 6,
                'name' => 'Komunitas SRC',
                'url' => '/community',
                'parent_id' => 4,
            ],
            [
                'id' => 7,
                'name' => 'Aplikasi Ayo',
                'url' => '/app-ayo',
                'parent_id' => null,
            ],

            [
                'id' => 8,
                'name' => 'Gabung SRC',
                'url' => '#',
                'parent_id' => null,
            ],
            [
                'id' => 9,
                'name' => 'Gabung Jadi Toko SRC',
                'url' => '/join-toko-src',
                'parent_id' => 8,
            ],
            [
                'id' => 10,
                'name' => 'Gabung Jadi Mitra',
                'url' => '/join-mitra-src',
                'parent_id' => 8,
            ],
        ];

        foreach ($arr as $value) {
            Menu::create($value);
        }
    }
}
