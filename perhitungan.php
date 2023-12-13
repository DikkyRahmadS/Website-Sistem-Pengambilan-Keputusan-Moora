<?php
session_start();
require 'functions.php';

// JIKA TIDAK MENERIMA DATA ID ALTERNATIF MAKA LEMPAR KEMBALI KE data_penilaian.php
if (!isset($_POST['id_alternatif'])) {
  echo "<script>
  alert('Pilih Data Alternatif Dahulu ! ')
  document.location.href='data_penilaian.php'
  </script>";
} else {

  //JIKA MENERIMA DATA ID ALTERNATIF MAKA JALANKAN HALAMAN perhitungan.php

  //BUKA TABLE KRITERIA DAN TAMPILKAN FIELD kpertama
  $datakriteriakpertama = mysqli_query($con, "SELECT * FROM kriteria WHERE kriteria = 'Anggota RT'");
  $kpertama = mysqli_fetch_assoc($datakriteriakpertama);

  //BUKA TABLE KRITERIA DAN TAMPILKAN FIELD kkedua
  $datakriteriakkedua = mysqli_query($con, "SELECT * FROM kriteria WHERE kriteria = 'Anggota RT balita dan anak sekolah'");
  $kkedua = mysqli_fetch_assoc($datakriteriakkedua);

  //BUKA TABLE KRITERIA DAN TAMPILKAN FIELD kketiga
  $datakriteriakketiga = mysqli_query($con, "SELECT * FROM kriteria WHERE kriteria = 'Status'");
  $kketiga = mysqli_fetch_assoc($datakriteriakketiga);

  //BUKA TABLE KRITERIA DAN TAMPILKAN FIELD kkeempat
  $datakriteriakkeempat = mysqli_query($con, "SELECT * FROM kriteria WHERE kriteria = 'Tanggungan Lansia'");
  $kkeempat = mysqli_fetch_assoc($datakriteriakkeempat);

  //BUKA TABLE KRITERIA DAN TAMPILKAN FIELD kkelima
  $datakriteriakkelima = mysqli_query($con, "SELECT * FROM kriteria WHERE kriteria = 'Tempat Tinggal'");
  $kkelima = mysqli_fetch_assoc($datakriteriakkelima);

  //BUKA TABLE KRITERIA DAN TAMPILKAN FIELD kkeenam
  $datakriteriakkeenam = mysqli_query($con, "SELECT * FROM kriteria WHERE kriteria = 'Pendapatan'");
  $kkeenam = mysqli_fetch_assoc($datakriteriakkeenam);

  //BUKA TABLE KRITERIA DAN TAMPILKAN FIELD kketujuh
  $datakriteriakketujuh = mysqli_query($con, "SELECT * FROM kriteria WHERE kriteria = 'Status PKH'");
  $kketujuh = mysqli_fetch_assoc($datakriteriakketujuh);

  //MEMBUAT KODE OTOMATIS

  //MENGAMBIL DATA item DENGAN KODE PALING BESAR
  $a = mysqli_query($con, "SELECT max(kode) AS kodeterbesar from hasil_akhir");
  $b = mysqli_fetch_array($a);
  $kodeitem = $b['kodeterbesar'];

  //MENGAMBIL ANGKA DARI KODE item TERBESAR MENGGUNAKAN FUNSI substr
  //DAN DIUBAH KE INTEGER (int)

  $urutan = (int) substr($kodeitem, 3, 3);

  //BILANGAN YANG DIAMBIL INI DI TAMBAH 1 UNTUK MENENTUKAN NOMOR URUT BERIKUTNYA
  $urutan++;

  //MEMBENTUK KODE BARU
  //PERINTAH printf("%03s",$urutan); BERGUNA UNTUK MEMBUAT STRING MENJADI 3 KARAKTER
  //MISAL printf("%03s",15); MAKAMENGHASILKAN '015'
  $kodeitem = "k" . sprintf("%03s", $urutan);

  //JIKA TOMBOL SIMPAN DITEKAN MAKA
  if (isset($_POST['simpan'])) {
    if (insert_hasil_perankingan($_POST) > 0) {
      echo "<script>
          alert('data tersimpan')
          document.location.href='laporan.php'
          </script>";
    }
  }
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
        font-weight: bold;
        color: darkblue;
      }

      tr:hover {
        -webkit-transform: scale(1.03);
        transform: scale(1.03);
        font-weight: bold;
      }

      .margin-content {
        margin-left: 290px;
      }

      @media screen and (max-width: 1440px) {
        .container {
          width: auto;
        }
      }
    </style>

    <title>PERHITUNGAN</title>
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
    <div class="container bg-light shadow p-3 mb-5 margin-content">

      <center>
        <h3 style="
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 20px;
  ">
          DATA ALTERNATIF TERPILIH
        </h3>
      </center>

      <div class="table-responsive p-4">
        <table class="table table-striped shadow">
          <tr class="bg-info">
            <th width="150">Id Alternatif</th>
            <th>Nama Alternatif</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>C6</th>
            <th>C7</th>
          </tr>

          <?php
          $id_alternatifs = $_POST['id_alternatif'];

          foreach ($id_alternatifs as $id_alternatif) {
            $data = mysqli_query($con, "SELECT * FROM alternatif WHERE id_alternatif = '$id_alternatif' ");
            while ($alt = mysqli_fetch_assoc($data)) {
          ?>


              <tr>
                <td><?= $alt['id_alternatif']; ?></td>
                <td><?= $alt['nama_alternatif']; ?></td>
                <td><?= $alt['c1']; ?></td>
                <td><?= $alt['c2']; ?></td>
                <td><?= $alt['c3']; ?></td>
                <td><?= $alt['c4']; ?></td>
                <td><?= $alt['c5']; ?></td>
                <td><?= $alt['c6']; ?></td>
                <td><?= $alt['c7']; ?></td>
              </tr>


          <?php
            }
          }

          ?>

          </form>
        </table>
      </div>


      <br><br>
      <h1 style="border-bottom:3px dodgerblue solid"></h1>
      <br><br>

      <center>
        <h3 style="
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 20px;
  ">
          NORMALISASI
        </h3>
      </center>

      <div class="table-responsive p-4">
        <table class="table table-striped shadow">
          <tr class="bg-info">
            <th width="150">Id Alternatif</th>
            <th>Nama Alternatif</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>C6</th>
            <th>C7</th>
          </tr>

          <?php

          $pembagi1 = 0;
          $pembagi2 = 0;
          $pembagi3 = 0;
          $pembagi4 = 0;
          $pembagi5 = 0;
          $pembagi6 = 0;
          $pembagi7 = 0;

          $id_alternatifs = $_POST['id_alternatif'];
          foreach ($id_alternatifs as $id_alternatif) {
            $data = mysqli_query($con, "SELECT * FROM alternatif WHERE id_alternatif = '$id_alternatif' ");
            while ($alt = mysqli_fetch_assoc($data)) {

              $pembagi1 += pow($alt['c1'], 2);
              $akar1 = sqrt($pembagi1);

              $pembagi2 += pow($alt['c2'], 2);
              $akar2 = sqrt($pembagi2);

              $pembagi3 += pow($alt['c3'], 2);
              $akar3 = sqrt($pembagi3);

              $pembagi4 += pow($alt['c4'], 2);
              $akar4 = sqrt($pembagi4);

              $pembagi5 += pow($alt['c5'], 2);
              $akar5 = sqrt($pembagi5);

              $pembagi6 += pow($alt['c6'], 2);
              $akar6 = sqrt($pembagi6);

              $pembagi7 += pow($alt['c7'], 2);
              $akar7 = sqrt($pembagi7);
            }
          }

          ?>



          <?php
          $id_alternatifs = $_POST['id_alternatif'];
          foreach ($id_alternatifs as $id_alternatif) {
            $data = mysqli_query($con, "SELECT * FROM alternatif WHERE id_alternatif = '$id_alternatif' ");
            while ($alt = mysqli_fetch_assoc($data)) {

          ?>


              <tr>
                <td><?= $alt['id_alternatif']; ?></td>
                <td><?= $alt['nama_alternatif']; ?></td>
                <!-- -----------C1----------- -->
                <td>
                  <?php $c1 = $alt['c1'] / $akar1;
                  echo round($c1, 4); ?>
                </td>
                <!-- -----------C2----------- -->
                <td>
                  <?php $c2 = $alt['c2'] / $akar2;
                  echo round($c2, 4); ?>
                </td>
                <!-- -----------C3----------- -->
                <td>
                  <?php $c3 = $alt['c3'] / $akar3;
                  echo round($c3, 4); ?>
                </td>
                <!-- -----------C4----------- -->
                <td><?php $c4 = $alt['c4'] / $akar4;
                    echo round($c4, 4); ?>
                </td>
                <!-- -----------C5----------- -->
                <td><?php $c5 = $alt['c5'] / $akar5;
                    echo round($c5, 4); ?>
                </td>
                <!-- -----------C6----------- -->
                <td><?php $c6 = $alt['c6'] / $akar6;
                    echo round($c6, 4); ?>
                </td>
                <!-- -----------C7----------- -->
                <td><?php $c7 = $alt['c7'] / $akar7;
                    echo round($c7, 4); ?>
                </td>
              </tr>


          <?php

            }
          }
          ?>
        </table>
      </div>


      <br><br>
      <h1 style="border-bottom:3px dodgerblue solid"></h1>
      <br><br>

      <center>
        <h3 style="
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 20px;
  ">
          TERBOBOT
        </h3>
      </center>

      <div class="table-responsive p-4">
        <table class="table table-striped shadow">
          <tr class="bg-info">
            <th width="150">Id Alternatif</th>
            <th>Nama Alternatif</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>C6</th>
            <th>C7</th>
          </tr>

          <?php
          $id_alternatifs = $_POST['id_alternatif'];
          foreach ($id_alternatifs as $id_alternatif) {
            $data = mysqli_query($con, "SELECT * FROM alternatif WHERE id_alternatif = '$id_alternatif' ");
            while ($alt = mysqli_fetch_assoc($data)) {

          ?>

              <tr>
                <td><?= $alt['id_alternatif']; ?></td>
                <td><?= $alt['nama_alternatif']; ?></td>
                <!-- -----------C1----------- -->
                <td>
                  <?php $c1 = $alt['c1'] / $akar1;
                  $kpertama1 = $kpertama['bobot'] * $c1;
                  // echo $kpertama['bobot'] . " * " . round($c1, 6) . " = " . round($kpertama1, 6);
                  echo round($kpertama1, 4);
                  ?>
                </td>
                <!-- -----------C2----------- -->
                <td>
                  <?php $c2 = $alt['c2'] / $akar2;
                  $kkedua1 = $kkedua['bobot'] * $c2;
                  // echo $kkedua['bobot'] . " * " . round($c2, 6) . " = " . round($kkedua1, 6);
                  echo round($kkedua1, 4);
                  ?>
                </td>
                <!-- -----------C3----------- -->
                <td>
                  <?php $c3 = $alt['c3'] / $akar3;
                  $kketiga1 = $kketiga['bobot'] * $c3;
                  // echo $kketiga['bobot'] . " * " . round($c3, 6) . " = " . round($kketiga1, 6);
                  echo round($kketiga1, 4);
                  ?>
                </td>
                <!-- -----------C4----------- -->
                <td>
                  <?php $c4 = $alt['c4'] / $akar4;
                  $kkeempat1 = $kkeempat['bobot'] * $c4;
                  // echo $kkeempat['bobot'] . " * " . round($c4, 6) . " = " . round($kkeempat1, 6);
                  echo round($kkeempat1, 4);
                  ?>
                </td>
                <!-- -----------C5----------- -->
                <td>
                  <?php $c5 = $alt['c5'] / $akar5;
                  $kkelima1 = $kkelima['bobot'] * $c5;
                  // echo $kkelima['bobot'] . " * " . round($c5, 6) . " = " . round($kkelima1, 6);
                  echo round($kkelima1, 4);
                  ?>
                </td>
                <!-- -----------C6----------- -->
                <td>
                  <?php $c6 = $alt['c6'] / $akar6;
                  $kkeenam1 = $kkeenam['bobot'] * $c6;
                  // echo $kkeenam['bobot'] . " * " . round($c6, 6) . " = " . round($kkeenam1, 6);
                  echo round($kkeenam1, 4);
                  ?>
                </td>
                <!-- -----------C7----------- -->
                <td>
                  <?php $c7 = $alt['c7'] / $akar7;
                  $kketujuh1 = $kketujuh['bobot'] * $c7;
                  // echo $kketujuh['bobot'] . " * " . round($c7, 6) . " = " . round($kketujuh1, 6);
                  echo round($kketujuh1, 4);
                  ?>
                </td>
              </tr>

          <?php
            }
          }

          ?>

        </table>
      </div>


      <br><br>
      <h1 style="border-bottom:3px dodgerblue solid"></h1>
      <br><br>

      <center>
        <h3 style="
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 20px;
  ">
          HASIL AKHIR
        </h3>
      </center>

      <div class="table-responsive p-4">
        <table class="table table-striped shadow">
          <tr class="bg-info">
            <th width="150">Id Alternatif</th>
            <th>Nama Alternatif</th>
            <th>Total</th>
          </tr>



          <?php
          $id_alternatifs = $_POST['id_alternatif'];
          foreach ($id_alternatifs as $id_alternatif) {
            $data = mysqli_query($con, "SELECT * FROM alternatif WHERE id_alternatif = '$id_alternatif' ");
            while ($alt = mysqli_fetch_assoc($data)) {

          ?>


              <?php $alt['id_alternatif']; ?>
              <?php $alt['nama_alternatif']; ?>
              <!-- -----------C1----------- -->

              <?php $c1 = $alt['c1'] / $akar1;
              $kpertama1 = $kpertama['bobot'] * $c1;
              //  echo $kpertama['bobot'] . " * " . round($c1, 6) . " = " . round($kpertama1, 6);
              round($kpertama1, 4);
              ?>
              <!-- -----------C2----------- -->
              <?php $c2 = $alt['c2'] / $akar2;
              $kkedua1 = $kkedua['bobot'] * $c2;
              // echo $kkedua['bobot'] . " * " . round($c2, 6) . " = " . round($kkedua1, 6);
              round($kkedua1, 4);
              ?>
              <!-- -----------C3----------- -->
              <?php $c3 = $alt['c3'] / $akar3;
              $kketiga1 = $kketiga['bobot'] * $c3;
              // echo $kketiga['bobot'] . " * " . round($c3, 6) . " = " . round($kketiga1, 6);
              round($kketiga1, 4);
              ?>
              <!-- -----------C4----------- -->
              <?php $c4 = $alt['c4'] / $akar4;
              $kkeempat1 = $kkeempat['bobot'] * $c4;
              // echo $kkeempat['bobot'] . " * " . round($c4, 6) . " = " . round($kkeempat1, 6);
              round($kkeempat1, 4);
              ?>
              <!-- -----------C5----------- -->
              <?php $c5 = $alt['c5'] / $akar5;
              $kkelima1 = $kkelima['bobot'] * $c5;
              // echo $kkelima['bobot'] . " * " . round($c5, 6) . " = " . round($kkelima1, 6);
              round($kkelima1, 4);
              ?>
              <!-- -----------C6----------- -->
              <?php $c6 = $alt['c6'] / $akar6;
              $kkeenam1 = $kkeenam['bobot'] * $c6;
              // echo $kkeenam['bobot'] . " * " . round($c6, 6) . " = " . round($kkeenam1, 6);
              round($kkeenam1, 4);
              ?>
              <!-- -----------C7----------- -->
              <?php $c7 = $alt['c7'] / $akar7;
              $kketujuh1 = $kketujuh['bobot'] * $c7;
              // echo $kketujuh['bobot'] . " * " . round($c7, 6) . " = " . round($kketujuh1, 6);
              round($kketujuh1, 4);
              ?>

              <form action="" method="POST" class="form-group">
                <tr>
                  <input type="hidden" name="kode" value="<?= $kodeitem; ?>">
                  <!-- --------------ID ALTERNATIF-------------- -->
                  <input type="hidden" name="id_alternatif[]" value="<?= $alt['id_alternatif'] ?>">
                  <td><?= $alt['id_alternatif']; ?></td>
                  <!-- --------------NAMA ALTERNATIF-------------- -->
                  <input type="hidden" name="nama_alternatif[]" value="<?= $alt['nama_alternatif'] ?>">
                  <td><?= $alt['nama_alternatif']; ?></td>
                  <!-- --------------TOTAL HASIL-------------- -->
                  <td>
                    <?php
                    $totalll = $kpertama1 + $kkedua1 + $kketiga1 + $kkeempat1 + $kkelima1 - $kkeenam1 + $kketujuh1;
                    echo round($totalll, 4);
                    ?>
                    <input type="hidden" name="total_hasil[]" value="<?= round($totalll, 4); ?>">
                  </td>
                </tr>


            <?php
            }
          }

            ?>

            <button type="submit" name="simpan" class="btn btn-success" style="float: right;">Simpan</button>
            <br><br>
              </form>

        </table>
      </div>


    </div>

  <?php   } ?>
  <!-- 
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
       -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

  </body>

  </html>