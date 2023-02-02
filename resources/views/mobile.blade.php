<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('templates.tag_header')

    <link href="{{ asset('css/mobile.css') }}" rel="stylesheet">

</head>

<body>

    <div>
        <div class="p-4 text-center div_top">
            <img src="{{ asset('images/logo_bran-removebg-preview.png') }}" class="img-fluid img_logo">
        </div>

        <div class="p-5 text-center div_preview_video">
            <div class="embed-responsive embed-responsive-16by9 text-center">
                <iframe class="embed-responsive-item text-center" id="frame_video"
                    src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen>
                </iframe>
            </div>
        </div>

        <div class="p-5 text-center div_preview_img">
            <img src="{{ asset('images/logo_bran-removebg-preview.png') }}" class="img-fluid">
        </div>

        <div class="footer_text">

            <div class="text-center div_icon_bottom">
                <span class="me-3">
                    @include('component.icon_dowload')
                </span>
                <span class="ms-3">
                    @include('component.icon_mail')
                </span>

            </div>

            <div class="text-center div_text_bottom">
                <b>WOW photo created by PRO-toys</b>
                <br>
                www.protoys.online &ensp;|&ensp; LINE : @protoys &ensp;|&ensp; +66616169959
            </div>
        </div>

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
