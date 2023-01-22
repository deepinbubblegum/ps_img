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
        <div class="container">
            {{-- <iframe src="{{ url('https://www.youtube.com/embed/5Peo-ivmupE') }}" width="560" height="315"
            frameborder="0" allowfullscreen></iframe> --}}
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ url('https://www.youtube.com/embed/5Peo-ivmupE') }}"
                    allowfullscreen style="
                    width: 800px;
                    height: 500px;
                ">
                </iframe>
            </div>

            <div class="container px-4 text-center mt-3">
                <div class="row gx-5">
                    <div class="col text-start px-0">
                        <button type="button" class="btn btn-secondary btn-lg w-100"
                            onclick="window.location='{{ url("/img_8_takephoto") }}'">
                            Retake
                        </button>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col text-end px-0">
                        <button type="button" onclick="window.location='{{ url("/preview_photo_8") }}'"
                            class="btn btn-primary btn-lg w-100">NEXT</button>
                    </div>
                </div>
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
            window.location = `{{ url('/emoji') }}`;
        })

    })

</script>
