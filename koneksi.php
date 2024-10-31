<?php
$host_koneksi = "localhost";
$username_koneksi = "root";
$pasword_koneksi = "";
$database_koneksi = "angkatan3_medsos";

$koneksi = mysqli_connect($host_koneksi, $username_koneksi, $pasword_koneksi, $database_koneksi);
if(!$koneksi){
    echo "Koneksi Gagal";
}
?>