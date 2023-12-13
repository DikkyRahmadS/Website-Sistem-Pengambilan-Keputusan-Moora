<?php

require 'functions.php';

//AMBIL DATA YG DIKLIK HAPUS DI HALAMAN data_penilaian.php TADI 
$id_alternatif = $_GET['id_alternatif'];

//JALANKAN FUNGSI HAPUS
if (hapus_alternatif($id_alternatif)) {
    echo "<script>
          alert ('Data Berhasil Di Hapus')
          document.location.href='data_penilaian.php'
          </script>";
}
