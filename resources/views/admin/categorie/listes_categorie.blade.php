<!DOCTYPE html>
<html lang="en">

<style>
  img {
        width: 50px; /* You can adjust the width as needed */
        height: auto; /* Maintain the aspect ratio */
    }
</style>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CATEGORIES</title>
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
      <h1>NOMBRES DES CATEGORIE : </h1>
      <nav>
      
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

     

          <div class="card">
            <div class="card-body">
            @auth
            @if(Illuminate\Support\Facades\Auth::user()->user_role=='ADMIN')
              <h5 class="card-title">LISTES DES CATEGORIES</h5>
                <form action="{{route('new.categorie')}}" method="post">
                  @csrf
                  <label for="">Categorie</label>
                  <input type="text" name="name" required>
                  <input type="hidden" name="user_action" value="{{Illuminate\Support\Facades\Auth::user()->nom}}" required>
                  <button type="submit">Valider</button>
                </form>
                @endif
               <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Date-creation</th>
                    <th scope="col">Date-update</th>
                    @if(Illuminate\Support\Facades\Auth::user()->user_role=='ADMIN')
                    <th scope="col">Mise-à-jour</th>
                    @endif
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                     @foreach($categorieAll as $categorie)
                    <th scope="row">{{$categorie->id}}</th>
                    <td>{{$categorie->name}}</td>
                    <td>{{$categorie->created_at}}</td>
                    <td>{{$categorie->updated_at}}</td>
                    @if(Illuminate\Support\Facades\Auth::user()->user_role=='ADMIN')
                    <td><a  href="{{route('view.update',['id'=>$categorie->id])}}" class="btn btn-primary"><i class="bi bi-pencil"></i></a></td>
                    @endif
                  </tr>

                  @endforeach
                </tbody>
                @endauth
              </table>
              
    </div>
  </div>
</div>




 


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



</script>
</html>