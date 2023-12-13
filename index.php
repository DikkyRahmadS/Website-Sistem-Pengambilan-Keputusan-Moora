<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- sidebar -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  <link rel="stylesheet" href="./stylee.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <style>
    body {
      background-color: transparent;
    }

    .gambar {
      max-width: 70%;
      height: auto;
    }

    .container {
      min-height: calc(100vh - 211px - -60px);
    }


    .col-md-12 {
      padding: 8px;
    }

    .copyright {
      text-align: center;
      color: #CDD0D4;

    }

    a font {
      color: whitesmoke;
    }

    .navbar-nav a:hover {
      color: darkblue;

    }

    .margin-content {
      margin-left: 290px;
      margin-right: 20px;
    }

    @media (max-width: 1000px) {
      .judul {
        font-size: 3vh;
      }
    }

    @media screen and (max-width: 1440px) {
      .container {
        width: auto;
      }
    }
  </style>

  <title>Home</title>
</head>

<body bgcolor="f0f0f0">
  <form method="post" action="perhitungan.php">

  </form>

  <div id="nav-bar">
    <input id="nav-toggle" type="checkbox" />
    <div id="nav-header"><a id="nav-title">Kelompok 2</a>
      <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
      <hr />
    </div>
    <div id="nav-content">
      <div class="nav-button"><i class="fas fa-palette"></i><span><a href="index.php">Beranda</a></span></div>
      <div class="nav-button"><i class="fas fa-chart-bar"></i><span><a href="data_kriteria.php">Data Kriteria</a></span></div>
      <div class="nav-button"><i class="fas fa-balance-scale"></i><span><a href="data_penilaian.php">Data Alternatif</a></span></div>
      <hr />
      <div class="nav-button"><i class="fas fa-book-open"></i><span><a href="laporan.php">Laporan</a></span></div>

      <div id="nav-content-highlight"></div>
    </div>

  </div>
  </div>

  <br>
  <div class="container bg-light shadow p-5 mb-5  margin-content">

    <center>
      <h3 style="
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 20px;
  ">
        Pemilihan Penerima Bantuan Rastra Menggunakan Metode Moora
      </h3>
    </center>

    <br>

    <center>


      <p>Bantuan Rastra merupakan program pemerintah yang diberikan kepada masyarakat untuk meningkatkan
        kesejahteraan dan ketahanan pangan dalam rumah tangga, mengatasi kemiskinan dan sekaligus memberikan
        perlindungan sosial kepada masyarakat yang tidak mampu. Pemilihan penerima bantuan rastra sudah menjadi tugas
        perangkat desa memilih siapa saja layak untuk mendapatkan bantuan rastra. Mendukung keputusan pemilihan
        penerima bantuan rastra yang sifatnya multi alternative maka diperlukan metode pendukung keputusan.
        Metode MOORA (Multi-Objective Optimization on the basis of Ratio Analysis) adalah salah satu metode pengambilan keputusan multikriteria yang digunakan untuk menyelesaikan masalah dengan kriteria yang saling bertentangan.
      </p>

    </center>

    <br>
  </div>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>