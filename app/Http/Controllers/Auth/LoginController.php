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
        if (!empty($request->token) && $request->token == env('APP_LOGIN_TOKEN')) {
            return view('auth.login');
        }

        return abort(404);
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $auth = User::where(['email' => $request->email, 'status' => 1])->first();

        if (!empty($auth) && Hash::check($request->password, $auth->password)) {
            Auth::login($auth);
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    
}
