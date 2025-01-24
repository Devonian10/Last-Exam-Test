<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg-dark d-flex align-item-center justify-content-center min-vh-100">
    <div class="p-5 m-5 text-center">
        <div class="card p-5 rounded-5">
            <h1 class="display-1 fw-bold" style="color: #E90026;">404</h1>
            <h4 class=display-6>Page not found</h4>

            <hr>

            <p class="lead fw-normal">
                page is unavailabel
            </p>
            <div>
                <a href="{{ url('/') }}" class="btn btn-primary rounded-5 px-5">Go to home</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>