<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function index()
    {

        return view('auth.login-page');
    }

    public function store(LoginRequest $request)
    {

        $user = $request->only(['email', 'password'], $request->get('remeber', false));

        if (Auth::attempt($user)) {

            return to_route('home')->withSuccess('You have successfully logged in!');
        } else {
            
            flash()->addError('Login Failed, The Email name or password are incorrect');

            return Redirect::back();
        }
    }

    public function logout()
    {
        auth::logout();

        return to_route('home');
    }
}
