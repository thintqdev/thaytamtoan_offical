<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Đăng nhập hệ thống - Thầy Tâm Toán</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("assets/img/favicon.png")}}">
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome/css/all.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome/css/fontawesome.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/morris/morris.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/css/style.css")}}">
</head>
<body>
<div class="main-wrapper">
    <div class="account-page">
        <div class="container">
            <h3 class="account-title text-white">Đăng nhập</h3>
            <div class="account-box">
                <div class="account-wrapper">
                    <div class="account-logo">
                        <img src="{{asset("assets/img/logo.png")}}" alt="ThayTamToanAdmin">
                    </div>
                    @if ($errors->any())
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('admin.auth.login') }}" method="post" autofocus>
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group text-center custom-mt-form-group">
                            <button class="btn btn-primary btn-block account-btn" type="submit">Đăng nhập</button>
                        </div>
                        <div class="text-center">
                            <a href="forgot-password.html">Quên mật khẩu</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset("assets/js/jquery-3.6.0.min.js")}}"></script>
<script src="{{ asset("assets/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{ asset("assets/js/jquery.slimscroll.js")}}"></script>
<script src="{{ asset("assets/js/app.js")}}"></script>
</body>
</html>
