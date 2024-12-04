<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link rel="shortcut icon" href="/Voting/favicon.png" type="image/png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin:10px;
        }
        .error-code {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff4757;
            margin: 0;
            margin-bottom:20px;
        }
        .error-message {
            font-size: 1rem;
            margin: 7px 0;
        }
        .error-message.para2{
            margin-bottom:30px;
        }
        .home-button {
            text-decoration: none;
            margin-top:30px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .home-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="error-code">404 - Page Not Found</h2>
        <p class="error-message">Oops! The page you're looking for doesn't exist or has been moved.</p>
        <p class="error-message para2">Please check the URL or return to our homepage.</p>
        <a href="http://localhost/Voting/home.php" class="home-button">Go to Home</a>
    </div>
</body>
</html>
