<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $users = User::orderByRaw("username = 'admin' DESC")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'username' => strtolower(str_replace(' ', '.', $request->input('username')))
        ]);

        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'is_admin' => 'required|in:1',
        ]);

        // encypt passsword
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'Berhasil Menambahkan Pengguna "' . $validatedData['name'] . '"');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        User::destroy($user->id);

        return redirect('/dashboard/users')
            ->with('success', 'Pengguna "' . $user->name . '" berhasil di hapus!');
    }
}
