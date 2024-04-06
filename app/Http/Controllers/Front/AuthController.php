<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('front.auth.login');
    }

    public function registerView()
    {
        return view('front.auth.register');
    }

    public function forgotPasswordView()
    {
        return view('front.auth.forgot_password');
    }

    public function passwordResetView()
    {
        return view('front.auth.reset_password');
    }
}
