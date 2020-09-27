<!DOCTYPE html>
<html>
<head>
    <title>Scuti-asisa</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Sử dụng mã này để cập nhật mật khẩu của bạn :</p>
    <p>Mã OTP: {{ $details['token'] }}</p>
    <p>Thank you!</p>
</body>
</html>
