<?php
$konek = mysqli_connect("localhost","root","","sewa_mobil" );

if(!$konek)
{
    die("koneksi gagal :". mysqli_connect_error());
}

?>
