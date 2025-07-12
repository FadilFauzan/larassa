<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


class PasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function changePassword()
    {
        return view('auth.change-password');
    }

    public function processChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:8',
            'repeat_password' => 'required|min:8|same:new_password',
        ]);
    
        
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back();
            // return dd('gagal');
        }

        if ($request->new_password != $request->repeat_password) {
            return back();
            // return dd('gagal');
        }

        auth()->user()->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect('dashboard')->with('success', 'Your password has been changed successfully');
    }
}
