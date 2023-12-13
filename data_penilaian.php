<?php
require 'functions.php';
//MEMBUKA SEMUA DATA YG ADA DI TABLE ALTERNATIF
$penilaian = tampilalternatif("SELECT * FROM alternatif");

//MEMBUKU KEMBALI UNTUK MEMBACA TOTAL DATA YANG ADA
$penilaian1 = mysqli_query($con, "SELECT * FROM alternatif");

//JIKA DI KLIK BUTTON CARI MAKA
if (isset($_POST['cari'])) {
  $input = $_POST['input'];
  //TAMPILKAN DATA YANG DI INPUTKAN 
  $penilaian = tampilalternatif("SELECT * FROM alternatif WHERE nama_alternatif LIKE '%$input%' OR id_alternatif LIKE '%$input%' ");
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

    @media (min-width: 1050px) {

      .hitung {
        display: none;
      }

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

  <title>Data Alternatif</title>
</head>

<body>
  <form method="post" action="perhitungan.php">
    <br>

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

    <div class="container bg-light shadow p-5 mb-5  margin-content">

      <center>
        <h3 style="
    font-weight: bold;
    color: #333;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 20px;
  ">
          DATA ALTERNATIF
        </h3>
      </center>
  </form>

  <div class="form-inline d-flex justify-content-between">
    <div class="mr-3">
      <a href="tambah_penilaian.php" class="btn btn-primary mr-2">Tambah Data</a>
      <button type="submit" name="perhitungan" class="btn btn-warning "><b>Perhitungan</b></button>
    </div>

    <div class="ml-auto">
      <form method="POST" action="" class="form-group">


        <input type="text" name="input" autofocus autocomplete="off" class="form-control shadow mr-2">


        <button type="submit" name="cari" class="btn btn-primary shadow">Cari</button>
      </form>
    </div>
  </div>

  <script>
    function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = true;
          }
        }
      } else {
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = false;
          }
        }
      }
    }
  </script>

  <div class="table-responsive p-4">
    <table class="table table-striped shadow p-3 mb-5">
      <?php $tot = mysqli_num_rows($penilaian1);
      echo "Total Data : <b>" . $tot . "</b>";
      ?>
      <tr class="bg-info">
        <th>Pilih <br> (semua) <br>
          <input type="checkbox" onchange="checkAll(this)" name="chk[]">
        </th>
        <th>Id Alternatif</th>
        <th>Nama Alternatif</th>
        <th>C1</th>
        <th>C2</th>
        <th>C3</th>
        <th>C4</th>
        <th>C5</th>
        <th>C6</th>
        <th>C7</th>
        <th>Aksi</th>
      </tr>

      <?php foreach ($penilaian as $alt) { ?>
        <tr>
          <td><input type="checkbox" name="id_alternatif[]" id="pilih" value="<?= $alt['id_alternatif']; ?>"></td>
          <td><?= $alt['id_alternatif']; ?></td>
          <td><?= $alt['nama_alternatif']; ?></td>
          <td><?= $alt['c1']; ?></td>
          <td><?= $alt['c2']; ?></td>
          <td><?= $alt['c3']; ?></td>
          <td><?= $alt['c4']; ?></td>
          <td><?= $alt['c5']; ?></td>
          <td><?= $alt['c6']; ?></td>
          <td><?= $alt['c7']; ?></td>
          <td><a href="edit_penilaian.php?id_alternatif=<?= $alt['id_alternatif']; ?>" class="btn btn-success">Edit</a> <a href="hapus_penilaian.php?id_alternatif=<?= $alt['id_alternatif']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>

      <?php } ?>


    </table>
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