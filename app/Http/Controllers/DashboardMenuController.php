<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DashboardMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.menus.index', [
            'menus' =>  Menu::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menus.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('image'));
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:menus',
            'category_id' => 'required',
            'image' => 'image|file|mimes:png,jpg,jpeg|max:2048',
            'price' => 'required',
            'description' => 'required'
        ]);

        // menyimpan gambar ke dalam storage
        if ($request->hasFile('image')) {
            $filename = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/menu-images'), $filename);
            $validatedData['image'] = 'menu-images/' . $filename;
        }

        $validatedData['name'] = ucwords($validatedData['name']);
        $validatedData['user_id'] = auth()->user()->id;

        Menu::create($validatedData);

        return redirect('/dashboard/menus')->with('success', 'Menu baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show() {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $authenticatedUser = auth()->user();

        if ($authenticatedUser) {
            return view('dashboard.menus.edit', [
                'menu' => $menu,
                'categories' => Category::all()
            ]);
        } else {
            return redirect('/dashboard/menus')->with('fail', "You don't have a menu with the following URL!");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'name' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|mimes:png,jpg,jpeg|max:2048',
            'price' => 'required',
            'description' => 'required'
        ];

        if ($request->slug != $menu->slug) {
            $rules['slug'] = 'required|unique:menus';
        }

        $validatedData = $request->validate($rules);

        // menyimpan gambar ke dalam storage setelah data di validasi
        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $filename = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/menu-images'), $filename);
            $validatedData['image'] = 'menu-images/' . $filename;
        }

        $validatedData['user_id'] = auth()->user()->id;

        Menu::where('id', $menu->id)->update($validatedData);

        return redirect('/dashboard/menus')->with('success', 'Menu berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // Hapus file fisik dari public/storage/menu-images
        if ($menu->image) {
            $imagePath = public_path('storage/' . $menu->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Hapus data menu dari database
        $menu->delete();

        return redirect('/dashboard/menus')->with('success', 'Menu berhasil dihapus!');
    }



    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
