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

    <div class="centered text-center">
        <div class="container">

            <div class="container" style="background-color: #D9D9D9; width: 1200px; height: 800px; margin-top:5rem"
                id="div_pdf">

                <div class="row">
                    <div class="col-10">

                        <div class="row row-cols-1 row-cols-md-2 g-4 mt-5">
                            <div class="col">
                                <div class="card">
                                    <iframe class="embed-responsive-item"
                                        src="{{ url('https://www.youtube.com/embed/5Peo-ivmupE') }}" allowfullscreen
                                        style="width: 473px; height: 320px;">
                                    </iframe>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <iframe class="embed-responsive-item"
                                        src="{{ url('https://www.youtube.com/embed/5Peo-ivmupE') }}" allowfullscreen
                                        style="width: 473px; height: 320px;">
                                    </iframe>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <iframe class="embed-responsive-item"
                                        src="{{ url('https://www.youtube.com/embed/5Peo-ivmupE') }}" allowfullscreen
                                        style="width: 473px; height: 320px;">
                                    </iframe>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <iframe class="embed-responsive-item"
                                        src="{{ url('https://www.youtube.com/embed/5Peo-ivmupE') }}" allowfullscreen
                                        style="width: 473px; height: 320px;">
                                    </iframe>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-2 align-self-end">
                        <img src="{{ asset('images/4.jpg') }}" class="img-fluid" alt="...">
                    </div>
                </div>

            </div>

            <div class="container px-4 text-center mt-3">
                <div class="row gx-5">
                    <div class="col text-start px-0">
                        <button type="button" class="btn btn-secondary btn-lg w-100"
                            onclick="window.location='{{ url("/4k_takephoto") }}'">
                            Retake
                        </button>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col text-end px-0">
                        <button type="button" class="btn btn-primary btn-lg w-100" id="cmd">Print</button>
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
