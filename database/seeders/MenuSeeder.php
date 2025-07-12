<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Data untuk setiap kategori menu
        $menusData = [
            // Coffee
            [
                'category_slug' => 'Coffee',
                'menus' => [
                    [
                        'name' => 'Butterscotch',
                        'description' => 'Latte manis dengan aroma caramel butter—lembut, hangat, dan comforting.',
                        'price' => 30000,
                    ],
                    [
                        'name' => 'Aren Latte',
                        'description' => 'Espresso dan susu creamy disatukan dengan manis legitnya gula aren asli.',
                        'price' => 25000,
                    ],
                    [
                        'name' => 'Long Black',
                        'description' => 'Espresso dengan tambahan air panas—kopi hitam clean dan bold, tanpa basa-basi.',
                        'price' => 22000,
                    ],
                    [
                        'name' => 'Cafe Latte',
                        'description' => 'Perpaduan espresso dan susu steamed yang creamy—lembut, ringan, dan selalu nyaman di lidah.',
                        'price' => 25000,
                    ],
                    [
                        'name' => 'Americano',
                        'description' => 'Perpaduan espresso dan air panas—hitam, bold, dan simpel tapi berkelas.',
                        'price' => 22000,
                    ],
                    [
                        'name' => 'Cappucino',
                        'description' => 'Perpaduan espresso, fresh milk, dan foam lembut—cappuccino klasik dengan rasa yang ngena.',
                        'price' => 25000,
                    ],
                ],
            ],
            // Non Coffee
            [
                'category_slug' => 'Non Coffee',
                'menus' => [
                    [
                        'name' => 'Strawberry Milk',
                        'description' => 'Susu segar dengan rasa stroberi manis—lembut, pinky, dan mood booster banget!',
                        'price' => 26000,
                    ],
                    [
                        'name' => 'Blue Ocean',
                        'description' => 'Minuman soda biru segar dengan rasa citrus yang ceria—segar, manis, dan fun banget!',
                        'price' => 22000,
                    ],
                    [
                        'name' => 'Green Tea Latte',
                        'description' => 'Matcha Jepang dengan susu lembut—earthy, creamy, dan calming banget.',
                        'price' => 30000,
                    ],
                    [
                        'name' => 'Red Velvet Oreo',
                        'description' => 'Red velvet creamy dengan taburan Oreo—cantik, manis, dan crunchy.',
                        'price' => 30000,
                    ],
                    [
                        'name' => 'Thai Tea',
                        'description' => 'Teh Thailand dengan susu dan rempah—manis, bold, dan selalu segar.',
                        'price' => 24000,
                    ],
                    [
                        'name' => 'Lychee Yakult',
                        'description' => 'Rasa leci segar berpadu Yakult—manis, asam, dan super nyegerin.',
                        'price' => 30000,
                    ],
                    [
                        'name' => 'Manggo Latte',
                        'description' => 'Susu creamy dengan rasa mangga tropis—unik, manis, dan menyegarkan.',
                        'price' => 26000,
                    ],
                    [
                        'name' => 'Tarro Latte',
                        'description' => 'Minuman ungu lembut dengan rasa taro khas—manis, creamy, dan aesthetic!',
                        'price' => 24000,
                    ],
                    [
                        'name' => 'Rainbow Dash',
                        'description' => 'halllo hallo hallo',
                        'price' => 23000,
                    ],
                    [
                        'name' => 'Lemon Tea',
                        'description' => 'Teh segar dengan perasan lemon—asam manisnya pas buat nyegerin hari.',
                        'price' => 22000,
                    ],
                    [
                        'name' => 'Lychee Tea',
                        'description' => 'Teh dengan rasa leci yang manis dan wangi—fresh dan cocok buat segala suasana.',
                        'price' => 24000,
                    ],
                    [
                        'name' => 'Manggo Tea',
                        'description' => 'Teh buah mangga manis dan harum—tropical vibes dalam setiap tegukan.',
                        'price' => 24000,
                    ],
                    [
                        'name' => 'Sweet Tea',
                        'description' => 'Teh manis klasik yang simpel dan selalu bisa diandalkan.',
                        'price' => 14000,
                    ],
                ],
            ],
            [
                'category_slug' => 'food',
                'menus' => [
                    [
                        'name' => 'Nasi Sei Sapi',
                        'description' => 'Nasi hangat dengan sei sapi asap yang gurih dan empuk—paduan sederhana yang kaya rasa.',
                        'price' => 38000,
                    ],
                    [
                        'name' => 'Mie Sadas',
                        'description' => 'Mie pedas khas ala rumah, dengan bumbu rahasia yang bikin melek dan nagih.',
                        'price' => 22000,
                    ],
                    [
                        'name' => 'Kentang + Nugget',
                        'description' => 'Kentang goreng dan nugget renyah, kombinasi klasik yang selalu jadi andalan.',
                        'price' => 27000,
                    ],
                    [
                        'name' => 'Nasi',
                        'description' => 'Nasi putih pulen, jadi pasangan sempurna untuk segala menu favoritmu.',
                        'price' => 6000,
                    ],
                    [
                        'name' => 'Kentang Full',
                        'description' => 'Kentang goreng renyah, gurih, dan selalu jadi favorit semua suasana.',
                        'price' => 22000,
                    ],
                    [
                        'name' => 'Otak-otak',
                        'description' => 'Otak-otak goreng dengan lapisan luar yang renyah dan isi ikan yang gurih—camilan simpel yang selalu bikin nagih.',
                        'price' => 22000,
                    ],
                    [
                        'name' => 'Siomay',
                        'description' => 'Siomay ayam lembut disajikan hangat dengan saus kacang gurih yang bikin nagih.',
                        'price' => 27000,
                    ],
                    [
                        'name' => 'Singkong Keju',
                        'description' => 'Singkong goreng renyah di luar, empuk di dalam, ditabur keju parut melimpah—camilan klasik yang selalu bikin rindu.',
                        'price' => 20000,
                    ],
                    [
                        'name' => 'Dimsum',
                        'description' => 'Dimsum lembut dengan isian ayam yang juicy, dikukus sempurna dan disajikan hangat bareng saus cocolan spesial.',
                        'price' => 18000,
                    ],
                    [
                        'name' => 'Full Wonton',
                        'description' => 'Wonton isi ayam juicy dibalut kulit tipis, disajikan dengan saus gurih yang bikin nagih.',
                        'price' => 32000,
                    ],
                    [
                        'name' => 'Cireng',
                        'description' => 'Cireng kenyal dengan isian bumbu khas dan permukaan yang renyah—cocok disantap hangat bareng saus pedas manis.',
                        'price' => 22000,
                    ],
                    [
                        'name' => 'Pisang Goreng',
                        'description' => 'Pisang goreng dengan tekstur luar yang crispy dan dalam yang manis legit—teman santai paling juara kapan pun.',
                        'price' => 20000,
                    ],
                    [
                        'name' => 'Aroma Keju',
                        'description' => 'Kulit renyah berisi lelehan keju gurih—keju aroma yang crunchy di luar, lumer di dalam.',
                        'price' => 20000,
                    ],
                ],
            ],

        ];

        // Looping untuk setiap kategori dan kamar yang sesuai
        foreach ($menusData as $data) {
            // Ambil kategori berdasarkan slug
            $category = Category::where('slug', $data['category_slug'])->first();

            // Pastikan kategori ditemukan
            if ($category) {
                foreach ($data['menus'] as $index => $menuData) {
                    Menu::create([
                        'user_id' => 1,
                        'category_id' => $category->id,
                        'name' => $menuData['name'],
                        'description' => $menuData['description'],
                        'slug' => $menuData['name'],
                        'price' => $menuData['price'],
                        // Gunakan nama kategori sebagai bagian dari path gambar
                        'image' => "/img/menus/{$data['category_slug']}/" . ($index + 1) . ".jpg",
                    ]);
                }
            }
        }
    }
}
