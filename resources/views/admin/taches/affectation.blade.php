<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AFFECTATION TACHES</title>
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
    <h1>NOMBRES DES TACHES AFFECTE : {{$numberTachesAttribue}}</h1>
    <nav></nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">LISTES DES TACHES DEJA ATTRIBUE</h5>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">Numéro</th>
                  <th scope="col">Taches-name</th>
                  <th scope="col">Categorie</th>
                  <th scope="col">Date-echeances</th>
                  <th scope="col">Membres</th>
                  <th scope="col">Annuler</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tachesAll as $taches)
                  <tr>
                    <th scope="row">{{$taches->id}}</th>
                    <td>{{$taches->taches_name}}</td>
                    <td>{{$taches->categorie->name}}</td>
                    <td>{{$taches->date_echeances}}</td>
                    <td>{{$taches->user->name}}</td>
                    <td>
                      <a class="btn btn-primary" href="{{route('retire.taches.membres',['id'=>$taches->id])}}">
                        <i class="bi bi-pin-angle"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <form action="{{route('affectation.users.taches')}}" method="post">
    @csrf
    <h4 style="color:blue" class="card-title">AFFECTATION DE TACHES</h4>
    <div class="mb-3">
      <label for="tache_id" class="form-label">TACHES</label>
      <select name="tache_id" class="form-select" id="tache_id" required>
        @foreach ($tachesAffectation as $taches)
          <option value="{{$taches->id}}">{{$taches->taches_name}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="user_id" class="form-label">USER</label>
      <select name="user_id" class="form-select" id="user_id" required>
        @foreach ($user as $membres)
          <option value="{{$membres->id}}">{{$membres->nom}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-danger">Affecté</button>
  </form>

</main>

<!-- ... (autres balises HTML) ... -->

</body>

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

</html>
