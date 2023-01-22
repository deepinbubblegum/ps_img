<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('templates.tag_header')

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

</head>

<body>

    @include('templates.menuBar')

    <div class="centered text-center">
        {{-- <i class="fas fa-camera" style="font-size: 10em;"></i> --}}
        <div class="row">
            <div class="col">
                <img src="{{ asset('images/icon_img/3D Photo.png') }}" class="card-img-top" alt="..."
                    style="cursor: pointer; width:10rem; margin-right: 5rem;"
                    onclick="window.location='{{ url("/img_8_takephoto") }}'">
            </div>
            <div class="col">
                <img src="{{ asset('images/icon_img/slomo.png') }}" class="card-img-top" alt="..."
                    style="cursor: pointer; width:10rem;" onclick="window.location='{{ url("/img_8_takephoto") }}'">
            </div>
            <div class="col">
                <img src="{{ asset('images/icon_img/Paparazzi.png') }}" class="card-img-top" alt="..."
                    style="cursor: pointer; width:10rem; margin-left: 5rem;"
                    onclick="window.location='{{ url("/img_8_takephoto") }}'">
            </div>
        </div>

    </div>

    <div class="footered text-center">
        @include('templates.footer')
    </div>

</body>

</html>

<script>
    $(document).ready(function () {

        $('#icon_camera').on('click', function () {
            window.location = `{{ url('/img_5_takephoto') }}`;
        })

    })

</script>
