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

  <title>MEMBRES</title>
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
      <h1>VALIDATION DE COMPTES</h1>
      <nav>
      
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">LISTES DES MEMBRES</h5>
                  <form action="{{route('validate_information_compte')}}" method="post">
                    @csrf
                  <h5 class="card-title">ROLE-MEMBRES</h5>
                  <label for="nomFournisseur" class="form-label">ROLE</label>
                  <select class="" name="role_id" id="">
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                    @endforeach
                  </select> 
                    <input type="hidden" value="{{$user->id}}" name="user_id">
                    <button type="submit" class="btn btn-dark">Role-Membres</button>
                  </form>
               <table class="table datatable">
                <thead>
                  <tr>
                  <th scope="col">NUMERO</th>
                    <th scope="col">NOM</th>
                    <th scope="col">PRENOM</th>
                    <th scope="col">EMAIL</th>
                    @if($user->activation=="Desactivated")
                    <th scope="col">Activé</th>
                    @else
                    <th scope="col">Désactivé</th>
                    @endif
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->prenom}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->activation=="Desactivated")
                   <td> <a href="{{route('delete.users_compte',['id'=>$user->id])}}"> <span class="btn btn-primary">Compte Désactivé</span></td></a>
                    @else
                    <td>
                      <a href="{{route('delete.users_compte',['id'=>$user->id])}}"> <span class="btn btn-primary">Compte Activé</span></td></a>
                  </tr>
                  @endif
                </tbody>
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
      &copy; Copyright <strong><span>Gestion-des-taches</span></strong>
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

   @if(session('sucess0'))
   <script>
    alert("Operation reussie");
   </script>
   @endif
   @if(session('sucess1'))
   <script>
    alert("Operation reussie");
   </script>
   @endif
   @if(session('normal'))
   <script>
    alert("Operation reussie");
   </script>
   @endif
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