<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ $mailData['title'] }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }

        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }

        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }

        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }

        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }

        .text-end {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }

        .no-border {
            border: 1px solid #fff !important;
        }

        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js'"></script>
    <script>
        function generatePDF() {
            const element = document.getElementById("pdf")
            html2pdf()
                .from(element)
                .save();
        }
    </script>
</head>

<body>

    <div id="pdf">
        <p>Dear <b>{{ $mailData['name'] }}</b>,</p>

        <p>Congratulations on your successful appointment as a <b>Real Estate Agent</b> at Ifenti Global Service! We are excited to have you join our team to help clients find their perfect properties.</p>

        <p>To activate your account and start managing property listings on our platform, please click <a href="">Ifenti Global</a> and log in using the credentials below:</p>

        <ul>
            <li>Username: <b>{{ $mailData['email'] }}</b></li>
            <li>Password: <b>{{ $mailData['password'] }}</b></li>
            <li>Role: <b>{{ $mailData['role_as'] }}</b></li>
        </ul>

        <p>If you have any questions or need assistance, please feel free to contact our support team.</p>

        <p>Kind regards,</p>
        <p>Ifenti Global Service Team</p>
    </div>
</body>

</html>
