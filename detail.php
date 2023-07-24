<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>sewa mobil - home</title>
</head>

 <?php
 if (isset($_GET["id_transaksi"])) {
     $id_transaksi = $_GET["id_transaksi"];
 }
 include "sql/hubung.php";
//  echo $id_transaksi;
 $hasil = mysqli_query($konek,
 "SELECT * FROM transaksi 
 join status  on transaksi.id_status = status.id_status
 join mobil on transaksi.id_mobil=mobil.id_mobil
 join konsumen on transaksi.id_konsumen = konsumen.id_konsumen
 where transaksi.id_transaksi = '$id_transaksi'" );
  $d = mysqli_fetch_array($hasil);
 ?>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-light " href="#"><h2>sewa mobil</h2></a>
        <button class="navbar-toggler btn btn-outline-light" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-light" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">armada</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">anggota</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">history</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="#">logout</a>
              </li>
          </ul>
         
        </div>
      </nav>

    <!-- -------------------------------------- -->


    <div class="container mt-5">

<div class="card">
    <div class="card-body">


        <table class="table mt-5">

            <tbody>
                <thead>
                  <h3>  daftar transaksi</h3>
</thead>
                <tr>
                    <td>transaksi</td>
                    <td><?php echo $d["id_transaksi"]; ?></td>
                </tr>
                <tr>
                    <td>nama</td>
                    <td><?php echo $d["nama"]; ?></td>
                </tr>
                <tr>
                    <td>no ktp</td>
                    <td><?php echo $d["no_ktp"]; ?></td>
                </tr>
                <tr>
                    <td>no telpon</td>
                    <td><?php echo $d["telp"]; ?></td>
                </tr>
                <tr>
                    <td>mobil</td>
                    <td><?php echo $d["merk"]; ?></td>
                </tr>
                <tr>
                    <td>tgl pinjam</td>
                    <td><?php echo $d["tgl_pinjam"]; ?></td>
                </tr>
                <tr>
                    <td>tgl kembali</td>
                    <td><?php echo $d["tgl_kembali"]; ?></td>
                </tr>
                <tr>
                    <td>status</td>
                    <td><?php echo $d["status_sesudah"]; ?></td>
                </tr>
                <tr>
                    <td>denda</td>
                    <td><?php echo "Rp.".$d["denda"]; ?></td>
                </tr>
                <tr>
                    <td>total</td>
                    <td><?php echo "Rp.".$d["total_harga"]; ?></td>
                </tr>
               
            </tbody>
        </table>

        <div class="row" pt-5>

            <div class="col">
                <a href="sewa.php" class="btn btn-primary" role="button"> kembali</a>
            </div>
        </div>

    </div>




</div>
</div>




    <!-- Footer------------------------------------ -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>sewa mobil
            </h6>
            <p>
                di mana ada bisa sewa mobil dengan murah meriah dengan presyaratan yang mudah

            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Surabaya, Jawa Timur</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@sewamobil.com
            </p>
            <p><i class="fas fa-phone me-3"></i> +62 852 2211 2321 </p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-reset fw-bold" href="#">sewamobil</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
      
      



    
</body>
</html>