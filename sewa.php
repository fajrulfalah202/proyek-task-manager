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
include "sql/hubung.php";
$hasil = mysqli_query($konek,
"SELECT * FROM transaksi 
join status  on transaksi.id_status = status.id_status
join mobil on transaksi.id_mobil=mobil.id_mobil ORDER by id_transaksi desc " );
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

      <div class="carousel-wrapper d-flex justify-content-center align-items-center">
        
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
          <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
          <!-- Tambahkan lebih banyak indikator jika diperlukan -->
        </ol>
      
        <!-- Tempatkan kode carousel Bootstrap di sini -->
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <!-- ... Konten carousel seperti sebelumnya ... -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="gambar/calya.png" alt="Gambar 1">
            </div>
          
            <div class="carousel-item">
              <img src="gambar/toyota.jpg" alt="Gambar 3">
            </div>
            <!-- Tambahkan lebih banyak slide jika diperlukan -->
          </div>
        </div>
      </div>
      

        <!-- Slides -->
        
      <br>
      <br>
        <!-- Tombol Navigasi -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>

      <br>
      <br>
      <!-- nanti kalau suda difungsikan phpnya maka lakukan perulangan -->
      <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h4>Daftar sewa mobil</h4>
<!-- <<<<<<< HEAD -->
                <div class="d-grid gap-2 mt-5">
                    <a class="btn btn-primary" href="create.php" role="button">Tambah Data</a>
                </div>
                <ol class="list-group">
                <?php
                    while($d =$hasil -> fetch_array()) 
                    {?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                            <a href="detail.php?id_transaksi=<?=$d['id_transaksi'] ?>" class="ms-2 me-auto text-decoration-none text-dark">
                                <div class="fw-bold"> 
                                  <?=$d['id_transaksi'] ?><br>
                                  mobil: <?php echo $d['merk']?> <br>
                                  tgl pinjam: <?php echo $d['tgl_pinjam']?> <br>
                                  tgl kembali: <?php echo $d['tgl_kembali']?> <br>
                                  status: <?php echo $d['status_sesudah']?> 

                                 

                              </div>
                                
                            </a>
                            
                          
                                <form action="" method="post">
                                    <a class="btn btn-primary" href="update.php?id_transaksi=<?= $d['id_transaksi'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-danger"  href="sql/hapus.php?id_transaksi=<?= $d['id_transaksi'] ?>"onclick="return confirm('Anda yakin data <?= $d['nama'] ?> akan dihapus ?')" name="delete" value="" type="submit"><i class="fa-solid fa-trash-can"></i></a>
                                </form>
                            </span>
                        </li>
                
                   
                   
                   <?php 
                   }?>
                    
                    
                  </ol>


                



            </div>
        </div>
    </div>

      <br>
    <br><br>


    <br>
    <br><br>

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