<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('templates.tag_header')

    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/preview_photo_8.css') }}" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

</head>

<body>

    <div class="container text-center mt-5">

        <div class="container" style="background-color: #D9D9D9;  width: 1200px; height: 800px;" id="div_pdf">

            <div class="row">

                <div class="col-8">
                    <div class="row" style="margin-top: 6.5rem;">
                        <div class="col col_img rotate">
                            <img src="{{ asset('images/4.jpg') }}" class="img-list">
                        </div>
                        <div class="col col_img rotate">
                            <img src="{{ asset('images/4.jpg') }}" class="img-list img_list_top">
                        </div>
                        <div class="col col_img rotate">
                            <img src="{{ asset('images/4.jpg') }}" class="img-list" style="margin-top: 11rem">
                        </div>
                        <div class="col col_img rotate">
                            <img src="{{ asset('images/4.jpg') }}" class="img-list" style="margin-top: 16.5rem">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 8rem;">
                        <div class="col col_img rotate">
                            <img src="{{ asset('images/4.jpg') }}" class="img-list">
                        </div>
                        <div class="col col_img rotate">
                            <img src="{{ asset('images/4.jpg') }}" class="img-list img_list_top">
                        </div>
                        <div class="col col_img rotate">
                            <img src="{{ asset('images/4.jpg') }}" class="img-list" style="margin-top: 11rem">
                        </div>
                        <div class="col col_img rotate">
                            <img src="{{ asset('images/4.jpg') }}" class="img-list" style="margin-top: 16.5rem">
                        </div>
                    </div>

                    <div class="row row_bot">
                        <div class="col">
                            <img src="{{ asset('images/4.jpg') }}" class="img-bot img_qr">
                        </div>

                        <div class="col-8">
                            <img src="{{ asset('images/4.jpg') }}" class="img-bot">
                        </div>
                    </div>

                </div>

                <div class="col-4">
                    <div class="col rotate ">
                        <img src="{{ asset('images/4.jpg') }}" class="img_right">
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

    </div>

    <div class="footered text-center">
        @include('templates.footer')
    </div>

</body>

</html>

<script>
    $(document).ready(function () {

        //Create PDf from HTML...
        function CreatePDFfromHTML() {
            var HTML_Width = $("#div_pdf").width();
            var HTML_Height = $("#div_pdf").height();
            var top_left_margin = 1;
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
                    pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin *
                        4), canvas_image_width, canvas_image_height);
                }
                pdf.save("Your_PDF_Name.pdf");
            });
        }

        $('#cmd').click(function () {
            CreatePDFfromHTML()
            setTimeout(function () {
                window.location = `{{ url('/emoji') }}`;
            }, 2000);
        });

    })

</script>
