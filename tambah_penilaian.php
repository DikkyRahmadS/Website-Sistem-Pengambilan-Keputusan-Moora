<?php

require 'functions.php';

//JIKA TOMBOL SIMPAN DITEKAN MAKA JALANKAN
if (isset($_POST['simpan'])) {
  //JIKA function tambah_alternatif > 0 (sukses) MAKA JALANKAN FUNGSI
  if (tambah_alternatif($_POST) > 0) {
    //DAN TAMPILKAN POP UP "DATA BERHASIL DI TAMBAH DAN LEMPAR KE HALAMAN data_penilaian.php"
    echo "<script>
          alert ('Data Berhasil Di Tambah')
          document.location.href='data_penilaian.php'
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
      color: darkblue;

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

  <title>TAMBAH Data Alternatif</title>
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
        TAMBAH DATA ALTERNATIF
      </h3>
    </center>

    <div class="col-md-7">
      <form method="post" class="form-group">
        <div class="table-responsive">
          <table class="table">

            <tr>
              <td width="200"><label>Id Alternatif</label></td>
              <td> : </td>
              <td width="500"><input type="text" name="id_alternatif" class="form-control" autocomplete="off"></td>
            </tr>

            <tr>
              <td><label>Nama Alternatif</label></td>
              <td> : </td>
              <td width="500"> <input type="text" name="nama_alternatif" class="form-control" autocomplete="off"></td>
            </tr>

            <tr>
              <td><label>C1</label></td>
              <td> : </td>
              <td width="500"> <input type="text" name="c1" class="form-control" autocomplete="off"></td>
            </tr>

            <tr>
              <td><label>C2</label></td>
              <td> : </td>
              <td width="500"> <input type="text" name="c2" class="form-control" autocomplete="off"></td>
            </tr>

            <tr>
              <td><label>C3</label></td>
              <td> : </td>
              <td width="500"> <input type="text" name="c3" class="form-control" autocomplete="off"></td>
            </tr>

            <tr>
              <td><label>C4</label></td>
              <td> : </td>
              <td width="500"> <input type="text" name="c4" class="form-control" autocomplete="off"></td>
            </tr>

            <tr>
              <td><label>C5</label></td>
              <td> : </td>
              <td width="500"> <input type="text" name="c5" class="form-control" autocomplete="off"></td>
            </tr>

            <tr>
              <td><label>C6</label></td>
              <td> : </td>
              <td width="500"> <input type="text" name="c6" class="form-control" autocomplete="off"></td>
            </tr>

            <tr>
              <td><label>C7</label></td>
              <td> : </td>
              <td width="500"> <input type="text" name="c7" class="form-control" autocomplete="off"></td>
            </tr>


            <td></td>
            <td></td>
            <td><button type="submit" name="simpan" class="btn btn-success">Simpan</button> &nbsp;&nbsp;&nbsp;
              <a href="data_penilaian.php" class="btn btn-danger">Batal</a>
            </td>
            </tr>
          </table>
        </div>

      </form>
    </div>

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