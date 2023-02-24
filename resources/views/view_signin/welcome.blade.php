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

    {{-- @include('templates.menuBar') --}}

    <div class="centered text-center">
        {{-- <i class="fas fa-camera" style="font-size: 10em;"></i> --}}
        <div id="icon_camera" style="cursor: pointer;">
            @include('component.qrscan')
        </div>

    </div>

    <div class="footered text-center">
        @include('templates.footer')
    </div>

</body>

</html>

<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "http://127.0.0.1:5000/api/camera/liveview/stop",
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });

        function clearCode() {
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:5000/api/camera/scan/qrcode/clear",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    window.location = `{{ url('/qrscan') }}`;
                }
            });
        }

        $('#icon_camera').on('click', function () {
            // window.location = `{{ url('/qrscan') }}`;
            clearCode();
        })

    })

</script>
