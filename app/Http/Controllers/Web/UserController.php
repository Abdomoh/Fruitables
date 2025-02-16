<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function editProfileUser()
    {

        $user = Auth::user();
        return view('website.users.profiles.edit', compact('user'));
    }
    public function updateProfileUser(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);
        if (!$user) {
            return view('error-404');
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        session::flash('success', __('main.add_to_cart_success'));
        return redirect()->route('profile-user');
    }
}
