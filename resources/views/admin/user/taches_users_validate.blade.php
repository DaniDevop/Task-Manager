<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>TACHES-MEMBRES</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Favicons -->
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
    <h1>NOMBRES DES TACHES VALIDEE : {{$tachesNumber}} </h1>
    <nav></nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">TACHES PERSONNEL</h5>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Numéro</th>
                  <th scope="col">Taches-name</th>
                  <th scope="col">Categorie</th>
                  <th scope="col">Date-echeances</th>
                  <th scope="col">Membres</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tachesAll as $taches)
                  <tr>
                    <th scope="row">{{$taches->id}}</th>
                    <td>{{$taches->taches_name}}</td>
                    <td>{{$taches->categorie->name}}</td>
                    <td>{{$taches->date_echeances}}</td>
                    <td>{{$taches->User->name}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    &copy; Copyright <strong><span>STOCK</span></strong>
  </div>
  <div class="credits">
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
