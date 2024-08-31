<!-- resources/views/emails/inquiry.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $mailData['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #414ab1;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        .content {
            padding: 20px;
        }

        .content h1 {
            color: #333333;
            font-size: 20px;
        }

        .content p {
            color: #555555;
            line-height: 1.6;
            font-size: 14px;
        }

        .footer {
            text-align: center;
            color: #888888;
            padding: 10px 0;
            font-size: 12px;
        }

        .footer a {
            color: #414ab1;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            {{ $mailData['title'] }}
        </div>
        <div class="content">
            <h1>New Emaill Received</h1>
            <p><strong>Name:</strong> {{ $mailData['last_name'] }}, {{ $mailData['first_name'] }}</p>
            <p><strong>Email:</strong> {{ $mailData['email'] }}</p>
            <p><strong>Phone:</strong> {{ $mailData['phone'] }}</p>
            <p><strong>Message:</strong></p>
            <p>{{ $mailData['message'] }}</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
            <p><a href="">Visit our website</a></p>
        </div>
    </div>
</body>

</html>
