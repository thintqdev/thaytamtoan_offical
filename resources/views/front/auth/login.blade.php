@extends('front.layout')
@section('title', 'Đăng nhập')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endsection

@section('content')
<div class="container login-screen">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form>
                <div class="form-group">
                    <h2 class="text-center">Đăng nhập tài khoản</h2>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập email">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
                <div class="form-group text-center">
                    <p>Bạn chưa có tài khoản? <a href="{{ route('front.register') }}">Đăng ký</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
