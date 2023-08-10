<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ICON -->
    <link href="/assets/img/logo_piksi.png" rel="icon" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- MY STYLE CSS -->
    <link href="/assets/css/my-style.css" rel="stylesheet">

    <title>Sistem Informasi Kepegawaian Politeknik Piksi Ganesha</title>
</head>

<body>
    <!-- Scroll To Up -->
    <button class="btn btn-secondary position-fixed" style="width: 50px; height: 50px; right: 30px; bottom: 30px; z-index: 100;" onclick="topFunction()" id="scrlToUp" title="Go to top"><i class="fas fa-chevron-up"></i></button>

    <section class="auth-background d-flex" style="height: 600px;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; right: 10px; left: 10px;">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/assets/img/logo_piksi.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    <b>SIM-PEG PPG</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" href="/landing">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="#about">About</a>
                        <a class="nav-link" href="#manual-book">Manual Book</a>
                        <a class="nav-link" href="#information">Information</a>
                        <a class="nav-link" href="https://www.karir.piksi.ac.id/">Lowongan Kerja</a>
                        <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt mr-1"></i>Login</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container my-auto">
            <h1 class="text-center"><b>SISTEM KEPEGAWAIAN (SIM-PEG)</b></h1>
            <h3 class="text-center">POLITEKNIK PIKSI GANESHA</h3>
        </div>
    </section>
    <!-- Section Beranda -->
    <section class="bg-white">
        <div class="container pt-5 pb-2">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <h3 class="text-white">SIM-PEG</h3>
                    <h5>Sistem Informasi Kepegawaian</h5>
                    <h5>Politeknik Piksi Ganesha</h5>
                    <p class="leads">Aplikasi pengelolaan data kepegawaian di lingkungan institusi Kampus Politeknik Piksi Ganesha.</p>
                    <hr>
                    <div class="d-flex justify-content-start">
                        <a href="/login" class="btn btn-primary" style="width: 100%;"><i class="fas fa-sign-in-alt mr-1"></i>Login Pegawai</a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="text-center mb-5">
                        <img src="/assets/img/bg_dashboard.png" class="img-fluid" alt="..." style="width: 450px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section About -->
    <section id="about" class="bg-light">
        <div class="container bg-light pt-5 pb-5">
            <div class="text-center mb-5">
                <h1>ABOUT</h1>
                <div class="bg-secondary m-5" style="height: 1px;"></div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div id="carouselExampleIndicators" class="carousel slide pb-3 mx-auto" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/assets/img/A.jpg" class="d-block w-100 rounded-lg" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/B.jpg" class="d-block w-100 rounded-lg" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <h1 class="display-5 text-center">SISTEM INFORMASI KEPEGAWAIAN (SIM-PEG)</h1>
                    <hr>
                    <p class="leads text-center">Sistem Informasi Kepegawaian (SIM-PEG) adalah sistem informasi yang dikembangkan untuk dapat memudahkan memberikan informasi data-data pegawai di Politeknik Piksi Ganesha yang saling berinteraksi mencapai tujuan yang telah ditargetkan. SIM-PEG menangani pengelolaan data kepegawaian khususnya meliputi: pendataan pegawai, proses perencanaan dan formasi kepegawaian, penggajian, penilaian angka kredit, mutasi pegawai, dan sistem pelaporan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Manual Book -->
    <section id="manual-book" class="bg-white">
        <div class="container pt-5 pb-5">
            <div class="text-center mb-5">
                <h1>MANUAL BOOK</h1>
                <div class="bg-secondary m-5" style="height: 1px;"></div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card bg-dark mt-3 shadow-sm border-0" style="height: 650px;">
                            <div class="container">
                                <div class="text-center text-white pt-5"><i class="fas fa-users fa-2xl"></i></div>
                                <h3 class="text-white mt-3">Manajemen Kepegawaian</h3>
                                <div class="bg-white m-3 align-center" style="height: 1px;"></div>
                                <div class="box-preview">
                                    <img src="/assets/panduan-manajemen-kepegawaian.jpg" class="img-fluid rounded-lg image-preview mt-4" alt="..." style="width: 300px;">
                                    <div class="middle">
                                        <a href="/assets/panduan-manajemen-kepegawaian.pdf" class="btn btn-danger" style="width: 150px;"><i class="fas fa-file-download mr-1"></i>PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card bg-dark mt-3 shadow-sm border-0" style="height: 650px;">
                            <div class="container">
                                <div class="text-center text-white pt-5"><i class="fas fa-calendar-alt fa-2xl"></i></div>
                                <h3 class="text-white mt-3">Manajemen Presensi</h3>
                                <div class="bg-white m-3 align-center" style="height: 1px;"></div>
                                <div class="box-preview">
                                    <img src="/assets/panduan-manajemen-presensi.jpg" class="img-fluid rounded-lg image-preview mt-4" alt="..." style="width: 300px;">
                                    <div class="middle">
                                        <a href="/assets/panduan-manajemen-presensi.pdf" class="btn btn-danger" style="width: 150px;"><i class="fas fa-file-download mr-1"></i>PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Manual Book -->
    <section id="information" class="bg-light">
        <div class="container pt-5 pb-5">
            <div class="text-center mb-5">
                <h1>INFORMATION</h1>
                <div class="bg-secondary m-5" style="height: 1px;"></div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15842.735263776942!2d107.6377337!3d-6.9283452!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e62c85d4bcbd%3A0x33d8416165587aed!2sPoliteknik%20Piksi%20Ganesha!5e0!3m2!1sid!2sid!4v1691030642299!5m2!1sid!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card bg-dark shadow-sm border-0" style="height: 350px;">
                            <div class="container">
                                <h3 class="text-white text-center mt-3">Contact Us</h3>
                                <div class="bg-white m-3 align-center" style="height: 1px;"></div>
                                <form>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Type here.." rows="3"></textarea>
                                    </div>
                                    <div class="form-inline">
                                        <button type="submit" class="btn btn-secondary" style="width: 100%;"><i class="fas fa-paper-plane mr-1"></i>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer" class="bg-dark">
        <div class="container pt-3 pb-3 text-center text-decoration-none text-white">
            <span>Copyright &copy; SIM-PEG PPG {{ date('Y') }} | Develoved by M Zaenal Iksan</span>
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/7e6a46288f.js" crossorigin="anonymous"></script>
    <script>
        // Get the button
        let mybutton = document.getElementById("scrlToUp");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

</body>

</html>