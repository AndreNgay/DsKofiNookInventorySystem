<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0e4d7; /* Burlywood background color */
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #deb887; /* Burlywood container background color */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #8b7355; /* Burlywood text color */
        }
        p {
            color: #5e4934; /* Darker brown text color */
        }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #8b7355; /* Burlywood button color */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #5e4934; /* Darker brown on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Verify Your Email</h1>
        <p>Hello {{ $user->name }},</p>
        <p>Click the following link to verify your email:</p>

        <a href="{{ route('verification.verify', ['token' => $user->verification_token]) }}" class="btn btn-primary">Verify Email</a>

    </div>
</body>
</html>
