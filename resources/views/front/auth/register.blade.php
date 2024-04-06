@extends('front.layout')
@section('title', 'Đăng ký')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endsection

@section('content')
<div class="container register-screen">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form>
                <div class="form-group">
                    <h2 class="text-center">Đăng ký tài khoản mới</h2>
                </div>
                <div class="form-group">
                    <label for="fullName">Họ và tên</label>
                    <input type="text" class="form-control" id="fullName" placeholder="Nhập họ và tên">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Nhập username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập email">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="confirmPassword"
                        placeholder="Nhập lại mật khẩu">
                </div>
                <div class="form-group text-right">
                    <a href="/forgot_password.html">Quên mật khẩu?</a>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
                <div class="form-group text-center">
                    <p>Bạn đã có tài khoản? <a href="/login.html">Đăng nhập</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
