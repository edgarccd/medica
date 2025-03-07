<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hospital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body><br>
    <div class="container-sm text-center" style="box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);border-radius: 25px;"> <br>
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-5"><br>
                <a href="/"><img src="/img/caduceo.jpg" alt="" style="width: 100px; height:100px;"> </a>
                {{ $slot }}
                <br><br>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
