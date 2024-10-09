<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logoserat.png') }}">
    <title>Coming Soon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
    }

    .coming-soon {
        background-image: url('https://via.placeholder.com/1920x1080'); /* Background image */
        background-size: cover;
        background-position: center;
        height: 100vh;
    }

    .content {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    h1 {
        font-size: 3.5rem;
        color: #333;
    }

    p {
        font-size: 1.25rem;
        color: #666;
    }

    button, .btn-secondary {
        padding: 10px 20px;
        font-size: 1rem;
    }

    </style>
</head>

<body>
    <div class="coming-soon d-flex align-items-center justify-content-center vh-100 text-center">
        <div class="content">
            <h1 class="display-4">Coming Soon</h1>
            <p class="lead">Fitur sedang dalam proses pengerjaan⚒️</p>
            <div class="mt-4">
                <a href="/" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
