<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DashboardEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.event.index', [
            'events' => Event::All(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('dashboard.event.show', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('dashboard.event.edit', [
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'date' => 'required'
        ];

        if ($request->slug != $event->slug) {
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

        Event::where('id', $event->id)->update($validatedData);

        return redirect('/dashboard/events')->with('success', 'Event "' . $validatedData['title'] . '" berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
