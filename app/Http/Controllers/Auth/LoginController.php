<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $request->validate([
            'user' => 'required|string',
            'password' => 'required|string',
        ]);

        $auth = null;
        $authWithEmail = User::where(['email' => $request->user, 'active' => 1])->first();
        $authWithUsername = User::where(['username' => $request->user, 'active' => 1])->first();

        if (!empty($authWithEmail) && empty($authWithUsername)) {
            $auth = $authWithEmail;
        }

        if (empty($authWithEmail) && !empty($authWithUsername)) {
            $auth = $authWithUsername;
        }

        if (!empty($auth) && Hash::check($request->password, $auth->password)) {
            Auth::login($auth);
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    
}
