<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .center{
            position: absolute;
            top: 40%;
            left: 35%;
            font-size: 5em;
            color: red;
        }
    </style>
</head>
<body>
    <h1 class="center">{{$usuario}}</h1>
    <img style="width: 100%;height: 100%" src="{{ public_path($imagen) }}" alt="">
</body>
</html>
