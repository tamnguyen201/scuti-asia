<!DOCTYPE html>
<html>
<head>
    <title>Scuti-asisa</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Vui lòng cập nhật lại mật khẩu mới <a href="{{route('users.index')}}">tại đây!</a></p>
    <p>Tài khoản: {{ $details['user_name'] }}</p>
    <p>Mật Khẩu: {{ $details['password'] }}</p>
    <p>Thank you!</p>
</body>
</html>
