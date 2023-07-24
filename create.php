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
join mobil on transaksi.id_mobil=mobil.id_mobil  " );
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

      <!-- ----------------------------------------------------------------- -->

      <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Tambah Data</h4>
                <form action="sql/input.php" method="post"  enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="id_konsumen" name="id_konsumen" placeholder="1203210093" required>
                        <label for="id_konsumen">id_konsumen</label>
                    </div>

                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_karyawan" required>
                          <option selected>id_karyawan</option>
                          <option value="L261">Faridz Zora</option>
                          <option value="L901">Wiji Thukul Armanto</option>
                          <option value="P196">Faradilla Putri Astuti</option>
                          <option value="P818">Cintya Oktavia Arum</option>
                          <option value="P916">Clara Sinta</option>
                          <option value="P917">Anya Kuya</option>
                      </select>
                      <label for="floatingSelect">pekerja</label>
                    
                  </div>

                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="id_mobil" name="id_mobil" placeholder="1203210093" required>
                      <label for="id_mobil">id mobil</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nopol" name="nopol" placeholder="1203210093" required>
                    <label for="nopol">nomer polisi</label>
                </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="1203210093" required>
                    <label for="kapasitas">kapasitas</label>
                </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="1203210093" required>
                    <label for="harga">harga</label>
                </div>

                 

                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_kategori" required>
                        <option selected>kategori</option>
                        <option value="001">City Car</option>
                        <option value="002">Family Car</option>
                        <option value="003">Luxury Car</option>
                    </select>
                    <label for="floatingSelect">kategori</label>
                  
                </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="merk" required>
                            <option selected>merk mobil</option>
                            <option value="Daihatsu Ayla ">Daihatsu Ayla </option>
                            <option value="Avanza">Avanza </option>
                            <option value="Brio">Brio </option>
                            <option value="Xenia">Xenia </option>
                            <option value="Agya">Agya </option>
                            <option value="Inova">Inova </option>
                            <option value="Fortuner">Fortuner </option>
                            <option value="Honda Jazz">Honda Jazz </option>
                            <option value="Suzuki Ignis">Suzuki Ignis </option>
                            <option value="Suzuki APV">Suzuki APV </option>
                            <option value="Toyota Hiace">Toyota Hiace </option>
                            <option value="Hyundai H-1">Hyundai H-1 </option>
                            <option value="Toyota Avanza">Toyota Avanza </option>
                            <option value="Honda Mobilio">Honda Mobilio</option>
                            <option value="Mitsubisi Xpander">Mitsubisi Xpander</option>
                            <option value="BMW X1">BMW X1</option>
                            <option value="Mercedes GLE">Mercedes GLE</option>
                        </select>
                        <label for="floatingSelect">Jenis mobil</label>
                    </div>

                    <!-- --------------------------------------- -->
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="id_supir" required>
                          <option selected>null</option>
                          <option value="SR000">Tanpa Supir</option>
                          <option value="SR001">Achmad Kasim</option>
                          <option value="SR002">Wahyu Sudrajat</option>
                          <option value="SR003">Jaelani</option>
                          <option value="SR004">Ahmad Adudu</option>
                          <option value="SR005">Dendy Malik</option>
                          <option value="SR006">Julius Caesar</option>
                          <option value="SR007">Tok Aba</option>
                          <option value="SR008">Tok Dalang</option>
                          <option value="SR009">Lim Halim</option>
                          <option value="SR010">Junggo Pratama</option>
                          <option value="SR011">Junggo Pratama</option>
                      </select>
                      <label for="floatingSelect">supir</label>
                    
                  </div>
                  <!-- -------------------------- -->
                  <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" placeholder="1203210093" required>
                    <label for="tgl_pinjam">tgl pinjam</label>
                </div>
                  <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" placeholder="1203210093" required>
                    <label for="tgl_kembali">tgl kembali</label>
                </div>
                <!-- ------------------------------------------------- -->
                <!-- id status input pake php -->
                <?php
                $kueri1 = mysqli_query($konek, "SELECT max(id_status) as max_status FROM status");
                $data1 =mysqli_fetch_array($kueri1);
                $nomer_trans = $data1['max_status'];
                $urutan1 = (int) substr($nomer_trans, 2);
                
                $urutan1++;
                $huruf1 = "S";
                $nomer_trans = $huruf1. sprintf("%03s",$urutan1);
                // echo $nomer_trans;
                ?>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id_status"  value="<?php echo $nomer_trans;?>" name="id_status" placeholder="1203210093" required>
                  <label for="id_status">id status</label>
              </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="status_sebelum" name="status_sebelum" placeholder="1203210093" required>
                  <label for="status_sebelum">kondisi sebelum</label>
              </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="status_setelah" name="status_setelah" placeholder="1203210093" required>
                  <label for="status_setelah">kondisi setelah</label>
              </div>

              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="denda" value ="0" name="denda" placeholder="1203210093" required>
                <label for="denda">denda </label>
            </div>

            <!-- ------------------------ -->

            
                    <div class="d-grid gap-2 mt-5">
                        <button class="btn btn-primary" type="submit" name="save" >Submit</button>
                    </div>
                </form>

                
               


            </div>
        </div>
    </div>
    <!-- content -->

      <br>
      <br>
   

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