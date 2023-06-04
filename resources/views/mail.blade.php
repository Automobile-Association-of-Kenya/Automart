<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Template</title>
    <style>
        /* Reset some default styles */
        body, table, td, a {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000000;
        }

        table {
            border-collapse: collapse;
        }

        /* Main container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header section */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 200px;
            height: auto;
        }

        /* Content section */
        .content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Footer section */
        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #dddddd;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" width="100px" height="70px">
        </div>
        <div class="content">
            <h1>Hello!</h1>
            <p>This is a sample email template.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p></p>
        </div>
        <div class="footer">
            <p>© 2023 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
