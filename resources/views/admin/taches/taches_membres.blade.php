<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SUIVIS TACHES</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Favicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="/img/favicon.png" rel="icon">
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">
        @include('layout.header')
    </header>

    <aside id="sidebar" class="sidebar">
        @include('layout.sidebar')
    </aside>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>NOMBRES DES TACHES : </h1>
            <nav>

            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LISTES DES TACHES</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Numéro</th>
                                        <th scope="col">Taches-name</th>
                                        <th scope="col">Categorie</th>
                                        <th scope="col">Date-echeances</th>
                                        <th scope="col">Retirer</th>
                                        <th scope="col">Rappel</th>
                                        <th scope="col">Valider</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tachesAll as $taches)
                                    <tr>
                                    @if($dateCurrent <= $taches->date_echeances)
                                        <th scope="row">{{$taches->id}}</th>
                                        <td>{{$taches->taches_name}}</td>
                                        <td>{{$taches->categorie->name}}</td>
                                        <td><span style="color:red;">{{$taches->date_echeances}}</span></td>
                                        
                                        <td><a class="btn btn-dark" href="{{route('retire.taches.membres',['id'=>$taches->id])}}"><i class="bi bi-x-circle-fill"></i></a></td>
                                        <td><a class="btn btn-dark" href="{{route('update.taches.view',['id'=>$taches->id])}}"><i class="bi bi-envelope-open-heart-fill"></i></a></td>
                                        <td><a class="btn btn-dark" href="{{route('update.taches.view',['id'=>$taches->id])}}"><i class="bi bi-pin-angle-fill"></i></a></td>
                                          @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>STOCK</span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">mapangounzigoudaniellevy@gmail.com</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/chart.js/chart.umd.js"></script>
    <script src="/vendor/echarts/echarts.min.js"></script>
    <script src="/vendor/quill/quill.min.js"></script>
    <script src="/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/vendor/tinymce/tinymce.min.js"></script>
    <script src="/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>

</body>

</html>
