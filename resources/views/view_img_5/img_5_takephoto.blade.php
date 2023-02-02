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

    <div class="container-fluid">

        <div class="d-flex justify-content-center">
            <div class="numberCircle text-center"
                style="font-size: 11rem; margin-top: 8rem; font-weight: bolder; cursor: pointer;" id="btn_upload_img">
                <span id="text_show"> </span>
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

        // var refreshIntervalId = setInterval(function () {
        //     main()
        // }, 1000);
        var refreshIntervalId = null
        // refreshIntervalId = setInterval(main, 1000);


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

            axios.get('http://127.0.0.1:5000/take-picture')
                // axios.post('/take')
                .then((response) => {
                    // console.log(response.data.message)
                    url = `${response.data.message}/image0${take_img}.jpg`
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

        $('#btn_upload_img').on('click', function () {
            // document.getElementById("btn_upload_file").click();
        })

        $('.bg_template_img').each(function (index) {
            $(this).append('<input type="file" id="upload_' + (index + 1) +
                '" class="d-none input_file_value">');
        });

        $('#btn_upload_file').on('change', function () {
            let input = document.getElementById("btn_upload_file");
            let files = input.files;

            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                let fileType = file["type"];
                let validImageTypes = ["image/jpeg", "image/png"];
                if ($.inArray(fileType, validImageTypes) < 0) {
                    // invalid file type code goes here.
                    continue;
                }

                let reader = new FileReader();
                reader.onload = function () {
                    $('.img_set_size').each(function (index) {
                        let id = $(this).attr('id');
                        let output = document.getElementById(id);
                        let txt_id = $(this).closest('.card').find('.text_template_img')
                            .attr('id')

                        let secondInput_id = $(this).closest('.card').find(
                                '.input_file_value')
                            .attr('id')

                        $('#text_show').text(index + 2)
                        output.classList.remove("d-none");
                        if ($(this).attr('src') == '') {

                            let txt = document.getElementById(txt_id);

                            txt.classList.add("d-none");
                            output.src = reader.result;

                            const dataTransfer = new DataTransfer();
                            dataTransfer.items.add(file); //your file(s) reference(s)
                            document.getElementById(secondInput_id).files = dataTransfer
                                .files;

                            if (index === $('.img_set_size').length - 1) {
                                upload_img();
                            }

                            return false;
                        }
                    })
                };
                reader.readAsDataURL(file);
            }

            input.value = "";
        })

        function upload_img() {
            $(".input_file_value").each(function () {
                var files = $(this).get(0).files;
                // do something with the files
                console.log(files)
            });
            $(".background_loading").css("display", "block");

            window.location = '{{ url("/preview_video") }}';
        }

        $(document).on('click', '.img_set_size', function () {
            let input = $(this).closest('.card').find('.input_file_value');
            input.click();
        });

        $(document).on('change', '.input_file_value', function () {
            let input = document.getElementById($(this).attr('id'));
            let files = input.files;
            console.log(files)
            // if (files[0] == undefined) return 0;
        });

    })

</script>
