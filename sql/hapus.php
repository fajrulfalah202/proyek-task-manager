<?php
 if (isset($_GET["id_transaksi"])) {
     $id_transaksi = $_GET["id_transaksi"];
 }
 include "hubung.php";
 $kuhap = "DELETE from transaksi where id_transaksi = '$id_transaksi'";
 if (mysqli_query($konek, $kuhap));
 header ("location: ../sewa.php ");
 ?>