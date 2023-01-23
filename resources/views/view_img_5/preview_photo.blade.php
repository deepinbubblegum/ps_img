<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('templates.tag_header')

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/preview_photo.css') }}" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.min.js"></script> --}}

</head>

<body>

    <div class="container text-center mt-5">

        <div class="container" style="background-color: #D9D9D9; width: 1200px; height: 800px;" id="div_pdf">
            <div class="row">

                <div class="col-4" style="margin-top: 2.7rem; padding: 4rem!important;">
                    @for ($i = 1; $i < 6; $i++) <div class="row mt-1">
                        <div class="col col_img">
                            <img src="" class="img-fluid preview_{{$i}}" id="preview_{{$i}}">
                        </div>
                        <div class="col col_img">
                            <img src="" class="img-fluid preview_{{$i}}" id="preview_{{$i}}">
                        </div>
                </div>
                @endfor
                <div class="row mt-1">
                    <div class="col">
                        <div class="card">
                            <img src="" class="card-img-bottom" id="preview_qr">
                        </div>
                    </div>
                    <div class="col">

                    </div>
                </div>
            </div>


            <div class="col-4">
                <div class="row rotate-col-two">
                    <div class="col">
                        <div class="row">
                            <span class="col-12 p-0">
                                <img src="" class="img-fluid img_big_2 preview_2" id="preview_2">
                            </span>
                            <span class="col-6 p-0 mt-1">
                                <img src="" class="img-fluid img_small_2 preview_3" id="preview_3">
                            </span>
                            <span class="col-6 p-0 mt-1">
                                <img src="" class="img-fluid img_small_2 preview_4" id="preview_4">
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <span class="col-6 p-0 mb-1">
                                <img src="" class="img-fluid img_small_2 preview_4" id="preview_4">
                            </span>
                            <span class="col-6 p-0 mb-1">
                                <img src="" class="img-fluid img_small_2 preview_5" id="preview_5">
                            </span>
                            <span class="col-12 p-0">
                                <img src="" class="img-fluid img_big_2 preview_3" id="preview_3">
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-4 ">
                <div class="rotate-col-three">
                    <img src="" class="img-fluid img_big_3 preview_1" id="preview_1">
                </div>
            </div>


        </div>
    </div>

    <div id="editor"></div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
        <button class="btn btn-lg" type="button" id="cmd"
            style="background-color: #EB4335; color:white; font-size: 1.5rem; width:15%">
            <i class="fa-solid fa-print me-2 ms-2"></i>
            Print
        </button>
    </div>
    </div>

    <div class="footered text-center">
        @include('templates.footer')
    </div>

</body>

</html>

<script>
    $(document).ready(function () {

        API_SaveImg();

        function API_SaveImg() {
            axios.post('http://127.0.0.1:5000/save-2storage')
                .then((response) => {
                    API_takeImg(response.data.message);
                })
                .catch((error) => {
                    console.log({
                        ...error
                    })
                })
        }

        function API_takeImg(data) {
            $(".background_loading").css("display", "block");

            for (let i = 1; i < 6; i++) {
                let class_n = `.preview_${i}`
                $(class_n).each(function () {
                    url = `${data}/images/image0${i}.jpg`
                    $(this).attr('src', url)
                });
            }
        }



        //Create PDf from HTML...
        function CreatePDFfromHTML() {
            var HTML_Width = $("#div_pdf").width();
            var HTML_Height = $("#div_pdf").height();
            var top_left_margin = 0;
            var PDF_Width = HTML_Width;
            var PDF_Height = HTML_Height;
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;

            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

            html2canvas($("#div_pdf")[0]).then(function (canvas) {
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('l', 'pt', [PDF_Width, PDF_Height]);
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width,
                    canvas_image_height);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(PDF_Width, PDF_Height);
                    // pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin *
                    //     4), canvas_image_width, canvas_image_height);
                }
                pdf.save("Your_PDF_Name.pdf");
            });
        }

        $('#cmd').click(function () {
            CreatePDFfromHTML()

            setTimeout(function () {
                // your_func();
            }, 5000);
        });


    })

</script>
