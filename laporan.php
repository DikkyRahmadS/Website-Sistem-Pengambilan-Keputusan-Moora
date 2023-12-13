<?php

require 'functions.php';

//BUKA SEMUA DATA YANG ADA DI TABLE hasil_akhir DAN URUTKAN KODE TERBARU TAMPIL DIATAS
$data = query("SELECT * FROM hasil_akhir ORDER BY kode DESC");

?>

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

    .text-riwayat {
      width: 100%;
      color: grey;
      text-align: center;
      border-bottom: 1px solid grey;
      line-height: 0.1em;
      margin: 10px 0 20px;
    }

    h6 span {
      padding: 0 10px;
    }

    tr:hover {
      -webkit-transform: scale(1.03);
      transform: scale(1.03);
      font-weight: bold;
    }

    .margin-content {
      margin-left: 290px;
      margin-right: 20px;
    }

    @media screen and (max-width: 1440px) {
      .container {
        width: auto;
      }
    }
  </style>

  <title>LAPORAN</title>
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
        LAPORAN PENILAIAN TERBAIK
      </h3>
    </center>


    <div class="table-responsive p-4">
      <table class="table table-striped shadow">
        <tr class="bg-info">
          <th width="150">Kode</th>
          <th width="300">Tanggal</th>
          <th>Total Data</th>
          <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php
        foreach ($data as $hasil_akhir) {
        ?>

          <?php
          //memanggil kode yang ada di table hasil_akhir
          $kode = $hasil_akhir['kode'];
          //menghitung total data dari data masing masing kode
          $total = mysqli_query($con, "SELECT COUNT(kode_hasil) AS TOTAL FROM nilai WHERE kode_hasil = '$kode'");
          $totaldata = mysqli_fetch_assoc($total);
          ?>

          <tr>
            <td><?= $hasil_akhir['kode']; ?></td>
            <td><?= $hasil_akhir['tanggal']; ?></td>
            <td><?= $totaldata['TOTAL']; ?></td>
            <td>
              <a href="detail_laporan.php?kode=<?= $hasil_akhir['kode']; ?>" class="btn btn-info">Lihat</a>
              <a href="hapus_laporan.php?kode=<?= $hasil_akhir['kode']; ?>" class="btn btn-danger">Hapus</a>
            </td>
          </tr>

        <?php } ?>
      </table>
    </div>


    <br><br>
    <h6 class="text-riwayat"><span class="bg-light">-----</span></h6>

    <br><br>
  </div>




  <!-- 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
   -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>