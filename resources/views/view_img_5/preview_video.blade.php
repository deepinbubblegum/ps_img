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
                {{-- <iframe class="embed-responsive-item" id="frame_video" src="" allowfullscreen style="
                    width: 800px;
                    height: 500px;
                ">
                </iframe> --}}
                <video width="800" height="500" id="frame_video" autoplay loop>
                    <source id="_video" src="{{ asset('images/SCUM   2022-12-03 19-31-28.mp4') }}" type="video/mp4" />
                </video>
            </div>

            <button type="button" id="autoplay">NEXT</button>

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

        var vid = document.getElementById("frame_video");

        function enableAutoplay() {
            vid.autoplay = true;
            vid.load();
        }

        $('#autoplay').on('click', function () {
            enableAutoplay()
        })

        API_takeVideo();

        function API_takeVideo() {
            axios.get('http://127.0.0.1:5000/api/render/5acts2video')
                .then((response) => {
                    $('#_video').attr('src', 'http://127.0.0.1:5000/' + response.data.message)
                    $(".background_loading").css("display", "none");

                    setTimeout(function () {
                        $('#autoplay').click();
                    }, 5000);
                })
                .catch((error) => {
                    console.log({
                        ...error
                    })
                })

        }

        $('#icon_camera').on('click', function () {
            window.location = `{{ url('/img_5_takephoto') }}`;
        })


    })

</script>
