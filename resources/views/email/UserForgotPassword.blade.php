<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <style type="text/css">
        *:not(br):not(tr):not(html) {
            font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif !important;
            -webkit-box-sizing: border-box !important;
            box-sizing: border-box !important
        }
        cite:before {
            content: "\2014 \0020" !important
        }
        @media only screen and (max-width: 600px){
            .email-body_inner, .email-footer {
                width: 100% !important
            }
        }
        @media only screen and (max-width: 500px){
            .button {
                width: 100% !important
            }
        }
    </style>
    </head>
    <body dir="ltr" style="height:100%;margin:0;line-height:1.4;background-color:#fff;color:#74787E;-webkit-text-size-adjust:none;width:100%">
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="width:100%;margin:0;padding:0;background-color:#fff">
        <tbody>
            <tr>
                <td class="content" style="color:#74787E;font-size:15px;line-height:18px;padding:0">
                    <table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="width:100%;margin:0;padding:0">
                        <tbody>
                            <tr>
                                <td class="email-masthead" style="color:#74787E;font-size:15px;line-height:18px;padding:25px 0;text-align:center">
                                    <a class="email-masthead_name" href="https://example-hermes.com/" target="_blank" style="font-size:16px;font-weight:bold;color:#2F3133;text-decoration:none;text-shadow:0 1px 0 white">
                                    <img src="https://scontent.fhan3-1.fna.fbcdn.net/v/t31.0-1/p720x720/12622243_1526863174310176_5792404773815484011_o.png?_nc_cat=110&_nc_sid=dbb9e7&_nc_ohc=0u5fhTtB0MUAX9YZvam&_nc_ht=scontent.fhan3-1.fna&oh=5003fb5922078741afee1001e2778220&oe=5F5F53FD" class="email-logo" style="max-height:100px"/>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="email-body" width="100%" style="color:#74787E;font-size:15px;line-height:18px;width:100%;margin:0;padding:0;border-top:1px solid #EDEFF2;border-bottom:1px solid #EDEFF2;background-color:#FFF">
                                    <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="width:570px;margin:0 auto;padding:0">
                                        <tbody>
                                        <tr>
                                            <td class="content-cell" style="color:#74787E;font-size:15px;line-height:18px;padding:35px">
                                                <h1 style="margin-top:0;color:#2F3133;font-size:19px;font-weight:bold">Chào {{ $details['name'] }},</h1>
                                                <p style="margin-top:0;color:#74787E;font-size:16px;line-height:1.5em">Bạn vừa yêu cầu lấy lại mật khẩu tại website {{route('home')}}</p>
                                                <p style="margin:0;color:#74787E;font-size:16px;line-height:1.5em">Vui lòng cập nhật mật khẩu cá nhân mới tại đây:</p>
                                                <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="width:100%;margin:0 auto;padding:0;text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" style="padding:10px 5px;color:#74787E;font-size:15px;line-height:18px">
                                                                <div>
                                                                    <a href="{{route('client.reset_password', $details['token'])}}" class="button" style="display:inline-block;background-color:#3869D4;border-radius:3px;font-size:15px;line-height:45px;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;color:#ffffff;width:200px" target="_blank" width="200">
                                                                    Đổi Mật Khẩu
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p style="margin:0;color:#74787E;font-size:16px;line-height:1.5em">Cảm ơn!</p> <hr>
                                                <p style="margin:0;font-size:14px;text-align:center;font-family:Arial,Helvetica,sans-serif;color:#666666;line-height:20px;padding-bottom:5px">
                                                    Đây là thư tự động từ hệ thống. Vui lòng không trả lời email này. <br>
                                                    Nếu có bất kỳ thắc mắc hay cần giúp đỡ, Bạn vui lòng liên hệ: 0123456789
                                                </p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px 5px;color:#74787E;font-size:15px;line-height:18px">
                                    <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="width:570px;margin:0 auto;padding:0;text-align:center">
                                        <tbody>
                                            <tr>
                                                <td class="content-cell" style="color:#74787E;font-size:15px;line-height:18px;padding:15px">
                                                    <p class="sub center" style="margin-top:0;line-height:1.5em;color:#AEAEAE;font-size:12px;text-align:center">
                                                        Copyright © 2020 Scuti. All rights reserved.
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
