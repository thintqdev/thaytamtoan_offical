<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Preschool - Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome/css/all.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome/css/fontawesome.min.css")}}">

    <link rel="stylesheet" href="{{ asset("assets/css/style.css")}}">
</head>
<body>
<div class="main-wrapper">
    <div class="account-page">
        <div class="container">
            <div class="error-box text-center">
                <h1>404</h1>
                <h3><i class="fas fa-exclamation-triangle"></i> Ôi trời, trang hiện tại không có</h3>
                <a href="{{ route('admin.documents.index') }}" class="btn btn-primary go-home">Về trang chủ</a>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset("assets/js/jquery-3.6.0.min.js")}}"></script>
<script src="{{ asset("assets/js/jquery.slimscroll.js")}}"></script>
<script src="{{ asset("assets/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{ asset("assets/js/app.js")}}"></script>
</body>
</html>
