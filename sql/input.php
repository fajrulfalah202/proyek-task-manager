<?php
include "hubung.php";
// untuk nomer id transaksi
$kueri1 = mysqli_query($konek, "SELECT max(id_transaksi) as max_trans FROM transaksi");
$data1 =mysqli_fetch_array($kueri1);
$nomer_trans = $data1['max_trans'];
$urutan1 = (int) substr($nomer_trans, 2);
// echo $urutan1;
$urutan1++;

$huruf1 = "T";
$nomer_trans = $huruf1. sprintf("%03s",$urutan1);
echo $nomer_trans."<br>";

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

// echo $id_karyawan."<br>";
// echo $id_mobil."<br>";
// echo $nopol."<br>";
// echo $kapasitas."<br>";
// echo $merk."<br>";
// echo $id_supir."<br>";
// echo $tgl_pinjam."<br>";
// echo $tgl_kembali."<br>";
// echo $status_sebelum."<br>";
// echo $status_setelah."<br>";
// echo $denda."<br>";
// echo "total: ".$total."<br>";

$kueri2 = "INSERT INTO transaksi values ('$nomer_trans', '$id_konsumen', '$id_mobil', '$id_supir', '$tgl_pinjam', '$tgl_kembali', '$id_status', '$total')";
$kueri3 = "INSERT INTO mobil values ('$id_mobil', '$id_karyawan', '$id_kategori', '$nopol', '$merk', '$kapasitas', '$harga')";
$kueri4 = "INSERT INTO status values ('$id_status', '$status_sebelum', '$status_sesudah', '$denda')";

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
// if (mysqli_query($konek, $kueri2))
// {
//    if  (mysqli_query($konek, $kueri3)) 
//    {
//     if (mysqli_query($konek, $kueri4))
//     {
//         header ("location: ../sewa.php ");
//     }
//     else
// {
//     echo "error: ". mysqli_error($konek);
// }
//    }
//    else
// {
//     echo "error: ". mysqli_error($konek);
// }
// }
// else
// {
//     echo "error: ". mysqli_error($konek);
// }
?>