<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html"/>
    <link href="{{ asset('css/portal.css') }}" rel="stylesheet">
    <title>AnimationLine</title>
    <style type="text/css">
        body {
            font-family: "Helvetica Neue", "Open Sans", sans-serif;
            color: #737373;
        }

        a {
            color: #ff5a1a
        }

        h1 {
            font-weight: 300;
        }

        .btn {
            display: inline-block;
            border-radius: 4px;
            text-decoration: none;
            color: #FFFFFF !important;
            background: #ff5a1a;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
<table style="padding: 0; width: 100%;">
    <tr>
        <td>
            <table style="width: 600px; padding: 0; border: 1px solid #EDEDED; border-spacing: 0px; margin: 0px auto;">
                <tr>
                    <td style="background-color: #FFFFFF;border-bottom: 1px solid #EDEDED">
                        <img src="{{ asset('img/logo.svg') }}" alt="AnimationLine"
                             style="margin: 25px auto; display: block; height: 50px; width: 100%">
                    </td>
                </tr>
                <tr>
                    <td style="background-color: #FFFFFF;padding: 30px 70px; font-size: 16px; line-height: 1.5;">
                        @yield('content')
                        <p>Cheers, <br>The AnimationLine Team</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
