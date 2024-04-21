<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailServiceJob;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function passwordResetView($token)
    {
        return view('front.auth.reset_password', ['token' => $token]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            toastr()->addSuccess('Đăng nhập thành công!');
            return redirect()->route('front.home');
        } else {
            toastr()->addError('Email hoặc mật khẩu không đúng!');
            return redirect()->back();
        }
    }

    public function register(Request $request)
    {
        $dataUser = $request->only('email', 'password', 'username', 'full_name');

        $user = User::create($dataUser);
        $user->account()->create([]);
        toastr()->addSuccess('Đăng ký tài khoản thành công!');

        Auth::login($user);

        return redirect()->route('front.home');
    }

    public function forgotPassword(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            // Send email to user
            $token = \Str::random(120);
            PasswordReset::updateOrCreate(
                [
                    'email' => $email,
                ],
                [
                    'email' => $email,
                    'token' => $token,
                    'created_at' => now(),
                ]
            );
            $dataInfo = [
                'to' => $email,
                'subject' => config('const.subject_mail.forgot_password'),
                'full_name' => $user->full_name,
                'token' => $token
            ];

            $dataView = [
                'view_name' => 'front.emails.forgot_password',
            ];

            dispatch(new SendMailServiceJob($dataInfo, $dataView));

            toastr()->addSuccess('Vui lòng kiểm tra email để lấy lại mật khẩu!');
        } else {
            toastr()->addError('Email không tồn tại!');
        }

        return redirect()->back();
    }

    public function resetPassword(Request $request, $token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        if ($passwordReset) {
            $password = $request->password;

            $user = User::where('email', $passwordReset->email)->first();
            $user->update([
                'password' => $password
            ]);

            $passwordReset->delete();

            toastr()->addSuccess('Đổi mật khẩu thành công!');
            return redirect()->route('front.login');
        } else {
            toastr()->addError('Token không tồn tại!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('front.home');
    }
}
