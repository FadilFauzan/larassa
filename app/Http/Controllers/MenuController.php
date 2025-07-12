<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;

class MenuCOntroller extends Controller
{
    public function index(Request $request, Category $category)
    {
        $categorySlug = request('category');

        $title = 'All Menu';
        $description = 'Nikmati berbagai pilihan menu terbaik kami, siap menemani setiap momen Anda.';

        $categoryDescriptions = [
            'coffee' => 'Nikmati ragam kopi spesial kami, diseduh dari biji pilihan untuk cita rasa yang kaya dan memikat.',
            'non coffee' => 'Segarkan harimu dengan pilihan minuman non-kopi yang lembut, nikmat, dan penuh rasa.',
            'food' => 'Temukan aneka hidangan lezat yang cocok untuk disantap kapan saja, dari ringan hingga mengenyangkan.',
        ];

        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $title = $category->name;

                // Ambil deskripsi dari mapping, fallback ke default
                $description = $categoryDescriptions[$categorySlug] ?? 'Nikmati pilihan menu ' . $category->name . ' terbaik kami.';
            }
        }

        return view('menus', [
            'title' => $title,
            'description' => $description,
            'categories' => Category::all(),
            'active' => 'menus',
            'menus' => Menu::latest()->filter(request(['search', 'category']))->paginate(8)->withQueryString(),
        ]);
    }

    public function show(menu $menu)
    {
        return view('menu', [
            'title' => 'Single Post',
            'active' => 'menus',
            'menu' => $menu
        ]);
    }
}
