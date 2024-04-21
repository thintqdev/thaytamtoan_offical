@extends('front.layout')
@section('title', 'Đặt lại mật khẩu')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
@endsection

@section('content')
<div class="container reset-password-screen my-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Đặt lại mật khẩu</h3>
                    <form action="{{ route('front.post.reset_password', ['token' => $token]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="password">Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Nhập mật khẩu mới">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
