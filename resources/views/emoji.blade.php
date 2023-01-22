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

    <div class="centered text-center">
        <img src="{{ asset('images/emoji-removebg-preview.png') }}" class="img-fluid" alt="...">
        <br>
        <div class="mt-5">
            <img src="{{ asset('images/text-removebg-preview.png') }}" class="img-fluid" alt="...">
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
