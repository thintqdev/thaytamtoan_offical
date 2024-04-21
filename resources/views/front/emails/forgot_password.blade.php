<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận yêu cầu đổi mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        h2 {
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        .code {
            font-size: 28px;
            font-weight: bold;
            color: #007bff;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <p>Xin chào {{ $dataInfo['full_name'] }}</p>
        <p>Bạn đã yêu cầu đặt lại mật khẩu cho tài khoản của bạn. Click đường dẫn dưới đây để lấy lại mật khẩu:</p>
        <a style="font-size: 24px; font-weight: bold; color: #007bff; background-color: transparent; border: none; cursor: pointer;"
            href="{{ route('front.reset_password', ['token' => $dataInfo['token']]) }}">
            Đặt lại mật khẩu
        </a>
        <p>Nếu bạn không yêu cầu điều này, bạn có thể bỏ qua email này.</p>
        <p class="footer">Cảm ơn bạn.</p>
    </div>
</body>

</html>
