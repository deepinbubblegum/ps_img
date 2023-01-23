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
                <iframe class="embed-responsive-item" id="frame_video" src="" allowfullscreen style="
                    width: 800px;
                    height: 500px;
                ">
                </iframe>
            </div>

            <div class="container px-4 text-center mt-3">
                <div class="row gx-5">
                    <div class="col text-start px-0">
                        <button type="button" class="btn btn-secondary btn-lg w-100" id="icon_camera">
                            Retake
                        </button>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col text-end px-0">
                        <button type="button" onclick="window.location='{{ url("/preview_photo") }}'"
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
        $(".background_loading").css("display", "block");

        API_takeVideo();

        function API_takeVideo() {
            axios.get('http://127.0.0.1:5000/render-5acts-video')
                .then((response) => {
                    $('#frame_video').attr('src', response.data.message)
                    $(".background_loading").css("display", "none");
                })
                .catch((error) => {
                    console.log({
                        ...error
                    })
                })

        }

        $('#icon_camera').on('click', function () {
            axios.get('http://127.0.0.1:5000/retake-picture')
                .then((response) => {
                    window.location = `{{ url('/img_5_takephoto') }}`;
                })
                .catch((error) => {
                    console.log({
                        ...error
                    })
                })
        })

    })

</script>
