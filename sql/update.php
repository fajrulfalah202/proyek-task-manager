<?php
include "hubung.php";
// untuk nomer id transaksi
// $kueri1 = mysqli_query($konek, "SELECT max(id_transaksi) as max_trans FROM transaksi");
// $data1 =mysqli_fetch_array($kueri1);

    $id_transaksi = $_POST['id_transaksi'];


// $urutan1 = (int) substr($nomer_trans, 2);
// // echo $urutan1;
// $urutan1++;

// $huruf1 = "T";
// $nomer_trans = $huruf1. sprintf("%03s",$urutan1);
// echo $nomer_trans."<br>";

$id_konsumen = $_POST['id_konsumen'];
$id_mobil = $_POST['id_mobil'];
$id_supir = $_POST['id_supir'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$id_status = $_POST ['id_status'];
$harga = $_POST ['harga'];

$id_karyawan = $_POST['id_karyawan'];
$nopol = $_POST['nopol'];
$kapasitas = $_POST['kapasitas'];
$merk = $_POST['merk'];
$id_kategori = $_POST['id_kategori'];


$status_sebelum = $_POST ['status_sebelum'];
$status_sesudah = $_POST ['status_setelah'];
$denda = $_POST ['denda'];

$total = $harga+$denda;
// echo $id_transaksi;
// echo $id_karyawan."<br>";
// echo $id_mobil."<br>";
// echo $nopol."<br>";
// echo $kapasitas."<br>";
// echo $merk."<br>";
// echo $id_supir."<br>";
// echo $tgl_pinjam."<br>";
// echo $tgl_kembali."<br>";
// echo $status_sebelum."<br>";
// echo $status_sesudah."<br>";
// echo $denda."<br>";
// echo "total: ".$total."<br>";

$kueri2 = "UPDATE transaksi set id_supir = '$id_supir', tgl_pinjam='$tgl_pinjam', tgl_kembali = '$tgl_kembali',  total_harga = '$total' where id_transaksi = '$id_transaksi'";
$kueri3 = "UPDATE mobil set id_karyawan ='$id_karyawan', id_kategori= '$id_kategori', nopol ='$nopol', merk='$merk', kapasitas='$kapasitas', harga='$harga' where id_mobil='$id_mobil'";
$kueri4 = "UPDATE status set status_sebelum='$status_sebelum', status_sesudah='$status_sesudah',denda= '$denda' where id_status ='$id_status' ";

// echo $kueri2;
// echo $kueri3;
// echo $kueri4;

if (
    mysqli_query($konek, $kueri4)&&
    mysqli_query($konek, $kueri3) &&
    mysqli_query($konek, $kueri2) 

)
{
    header ("location: ../sewa.php ");
}
else
{
    echo "error: ". mysqli_error($konek);
}

?>