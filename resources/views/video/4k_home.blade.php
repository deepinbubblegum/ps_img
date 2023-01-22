<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('templates.tag_header')

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    <style>
        img {
            margin: auto;
            display: block;
        }

    </style>

</head>

<body>

    @include('templates.menuBar')

    <div class="centered text-center">
        {{-- <i class="fas fa-camera" style="font-size: 10em;"></i> --}}
        <div class="row">
            <div class="col text-center">
                <img src="{{ asset('images/icon_img/video_icon.png') }}" class="card-img-top" alt="..."
                    style="cursor: pointer; width:12rem; margin-top: 4rem;"
                    onclick="window.location='{{ url("/4k_takephoto") }}'">
            </div>
        </div>

    </div>

    <div class="footered text-center">
        @include('templates.footer')
    </div>

</body>

</html>
