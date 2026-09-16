<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: {{ $background }};
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            width: 500px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        h1 {
            margin-bottom: 10px;
        }

        p {
            color: #555;
        }
    </style>
</head>

<body>
    @yield('content')
</body>
</html>