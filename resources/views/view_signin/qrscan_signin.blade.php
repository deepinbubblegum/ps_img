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

<body style="background-color: black; margin: 0; padding: 0;">
    <div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
        <img src="http://127.0.0.1:5000/api/camera/scan/qrcode" width="100%" height="100%" />
    </div>
    <div class="centered text-center"></div>
    <div class="footered text-center">
        @include('templates.footer')
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        setInterval(() => {
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:5000/api/camera/scan/check",
                dataType: "json",
                success: function (response) {
                    if (response.status == 'ok') {
                        window.location = `{{ url('/home') }}`;
                    }
                }
            });
        }, 600);
    })
</script>
