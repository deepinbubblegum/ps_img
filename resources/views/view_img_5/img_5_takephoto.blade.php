<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('templates.tag_header')

    <link href="{{ asset('css/img_5_takephoto.css') }}" rel="stylesheet">

</head>

<body>

    @include('component.loading')

    <img src="http://127.0.0.1:5000/api/camera/liveview" class="img_background_Mjpeg">

    <div class="container-fluid">

        <div class="d-flex justify-content-center">
            <div class="numberCircle text-center"
                style="font-size: 11rem; margin-top: 8rem; font-weight: bolder; cursor: pointer;" id="btn_upload_img">
                <span id="text_show" style="color: black;"> </span>
                <input type="file" id="btn_upload_file" class="d-none" accept="image/png, image/jpeg" multiple>
            </div>
        </div>



        <div class="row row-cols-1 row-cols-md-5 g-2 ms-5 me-5" style="margin-top: 5rem">
            <div class="col">
                <div class="card bg_template_img">
                    <img src="" class="card-img-top d-none img_set_size" id="preview_1">
                    <div class="text-center p-3 text_template_img" id="preview_txt_1">
                        1
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg_template_img">
                    <img src="" class="card-img-top d-none img_set_size" id="preview_2">
                    <div class="text-center p-3 text_template_img" id="preview_txt_2">
                        2
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg_template_img">
                    <img src="" class="card-img-top d-none img_set_size" id="preview_3">
                    <div class="text-center p-3 text_template_img" id="preview_txt_3">
                        3
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg_template_img">
                    <img src="" class="card-img-top d-none img_set_size" id="preview_4">
                    <div class="text-center p-3 text_template_img" id="preview_txt_4">
                        4
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg_template_img">
                    <img src="" class="card-img-top d-none img_set_size" id="preview_5">
                    <div class="text-center p-3 text_template_img" id="preview_txt_5">
                        5
                    </div>
                </div>
            </div>
        </div>

        <div class="footered text-center d-inline">
            @include('templates.footer')
        </div>

    </div>

</body>

</html>

<script>
    $(document).ready(function () {

        let sec = 5000;
        let text_sec = 5
        let take_img = 0;
        $(".background_loading").css("background-color", "#ece8e8ed")

        axios.all([
                axios.get(`http://127.0.0.1:5000/api/camera/clear/tmp`),
                axios.get(`http://127.0.0.1:5000/api/camera/clear/images`),
                axios.get(`http://127.0.0.1:5000/api/camera/clear/videos`),
            ])
            .then(axios.spread((data1, data2) => {
                // output of req.
                // window.location = `{{ url('/img_5_takephoto') }}`;
            }));

        // var refreshIntervalId = setInterval(function () {
        //     main()
        // }, 1000);
        var refreshIntervalId = null
        refreshIntervalId = setInterval(main, 1000);


        function main() {
            // console.log(take_img)
            if (take_img >= 5) {
                clearInterval(refreshIntervalId);
                window.location = '{{ url("/preview_video") }}';
                return
            }

            if (text_sec == 0) {
                API_takeImg()
                clearInterval(refreshIntervalId);
            }

            text_sec = text_sec == 0 ? 3 : text_sec
            $('#text_show').text(text_sec)
            text_sec--
        }


        function API_takeImg() {
            take_img++
            $(".background_loading").css("display", "block");

            axios.get('http://127.0.0.1:5000/api/camera/capture')
                // axios.post('/take')
                .then((response) => {
                    // console.log(response.data.message)
                    url = `http://127.0.0.1:5000/${response.data.message}`
                    $(`#preview_${take_img}`).attr('src', url)
                    $(`#preview_${take_img}`).removeClass("d-none");
                    $(`#preview_txt_${take_img}`).addClass("d-none");
                    $(".background_loading").css("display", "none");
                    refreshIntervalId = setInterval(main, 1000);
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
