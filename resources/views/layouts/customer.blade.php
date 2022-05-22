<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/50a6b5ed9d.js" crossorigin="anonymous"></script>
  <style type="text/css">
    .navbar {
      background-color: salmon;
    }

    a{
      text-decoration: none;
      color: black;
    }

    .container-fluid {
      padding-left: 30px;
    }

    .d-flex{
      padding-right: 30px;
    }

    .d-flex .form-control{
      width: 300px;

    }

    .container-fluid a:hover{
      background-color: lightblue;
      color: white;
    }

    .dropdown-item:hover{
      background-color: lightblue;
      color: white;
    }

    .carousel-inner{
      height: 450px;
      padding-left: 30px;
      padding-right: 30px;
    }

    .carousel-item img {
      border-radius: 20px;
      height: 450px;
    }

    /*clear float*/
    .cf:before,
    .cf:after {
      content: " "; /* 1 */
      display: table; /* 2 */
    }

    .cf:after {
      clear: both;
    }

    .cf {
      *zoom: 1;
    }
  </style>

  <title>@yield('title') Alphabet Store</title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('customer.index')}}"><img src="{{asset('pict/logo.png')}}" alt="" width="30" height="30" class="d-inline-block align-text-top">
      Alphabet Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('customer.index')}}">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kategori
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Chicklit</a></li>
              <li><a class="dropdown-item" href="#">Romance</a></li>
              <li><a class="dropdown-item" href="#">Teen Fiction</a></li>
            </ul>
            
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('customer.listCart') }}">Keranjang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('customer.riwayat')}}">Riwayat Pembelian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('customer.logout')}}">Logout</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Masukan kata kunci disini..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  @yield('konten')

  <footer class="bg-dark text-white p-5 mt-5">
    <div class="row">
      <div class="col-md-3">
        <h5>Layanan Pelanggan</h5>
        <ul>
          <li>Pusat Bantuan</li>
          <li>Metode Pembelian</li>
          <li>Metode Pengiriman</li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Tentang Kami</h5>
        <p>Alphabet Store adalah salah satu toko buku online terlengkap dan terpercaya yang ada di Bekasi. Kami menyediakan berbagai macam koleksi buku berkualitas dan original. Berbagai macam genre bisa anda dapatkan di Alphabet Store. Kami mampu bersaing dengan toko buku yang ada karena harga disini relatif lebih murah, tanpa mengurangi kualitas dann pelayanan yang kami berikan. Kepuasa pelanggan adalah prioritas kami.</p>
      </div>
      <div class="col-md-3">
        <h5>Mitra Kerjasama</h5>
        <ul>
          <li>Gojek</li>
          <li>Grab</li>
          <li>Jne</li>
          <li>Jnt</li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Hubungi Kami</h5>
        <ul>
          <li>Telepon : 021-12345678</li>
          <li>Email : alphabet@store.com</li>
          <li>Instagram : alphabet.store</li>
        </ul>
      </div>
    </div>
  </footer>



















  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
</body>
</html>