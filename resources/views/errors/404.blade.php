<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="{{ asset('front_end_style/assets/img/favicon.png') }}" type="image/gif">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .error-container {
            max-width: 600px;
        }

        h1 {
            font-size: 6rem;
            margin-bottom: 0;
            color: #125258;
        }

        h2 {
            font-size: 2rem;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #125258;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.2s ease-in-out;
        }

        a:hover {
            background-color: #125258;
        }

    </style>
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <h2>Oops! Page not found.</h2>
        <p>The page you are looking for might have been removed or is temporarily unavailable.</p>
        <a href="{{ url('/') }}">Go to Homepage</a>
    </div>
</body>
</html>
