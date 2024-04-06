@extends('front.layout')
@section('title', 'Quên mật khẩu')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/confirm_register.css') }}">
@endsection

@section('content')
<div class="container forgot_password-screen my-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Quên mật khẩu</h3>
                    <div class="text-center lead">
                        <p>Vui lòng nhập email của bạn để lấy lại mật khẩu</p>
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn">
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="/login.html" class="btn btn-primary">Gửi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
