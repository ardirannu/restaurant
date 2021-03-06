<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="img/team/2.jpg">

  <title>Selamat Datang Di | RestoKita</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
    type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">
  <!-- tempat edit CSS -->

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">RannuResto</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Keunggulan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#teamkami">Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Cari Restoran Favoritmu !</div>
        <div class="intro-heading text-uppercase">Makan Sepuasnya !</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#resto">Temukan Disni</a>
      </div>
    </div>
  </header>

  <!-- Restoran Grid -->
  <section class="bg-light page-section" id="resto">
    <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Daftar Restoran</h2>
          <h3 class="section-subheading text-muted">Restoran Favoritmu Ada Disini !</h3>
        </div>
      </div>
      <div class="row">
  <!-- Menampilkan semua data menggunakan perulangan while -->
    <?php
      $query      = "select * from resto";
      $execute    = mysqli_query($koneksi, $query);

      while($data = mysqli_fetch_assoc($execute)) {
    ?>

      
        <div class="col-md-4 col-sm-6 portfolio-item">
          <!-- memberikan id pada target modal yg akan di jadikan parameter di modal -->
          <a class="portfolio-link" data-toggle="modal" href="#restoranModal<?php echo $data['id_resto'];?>">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src='../admin/images/<?php echo $data['foto'];?>'  alt="">
          </a>
          <div class="portfolio-caption">
            <h4><?php echo $data['nama_resto'];?></h4>
            <p class="text-muted"><?php echo $data['kota'];?></p>
            <p class="text-muted">Buka Mulai Pukul : <?php echo $data['jam_buka'];?> Waktu Setempat.</p>
          </div>
        </div>


        <!-- Restoran Modals -->

        <!-- Modal 1 -->
        <!-- Mengaitkan data dengan modal dengan membawa id -->
        <div class="portfolio-modal modal fade" id="restoranModal<?php echo $data['id_resto'];?>" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                  <div class="rl"></div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-8 mx-auto">
                    <div class="modal-body">

                      <!-- Project Details Go Here -->
                      <h2 class="text-uppercase"><?php echo $data['nama_resto'];?></h2>
                      <h5>Kota : <?php echo $data['kota'];?></h5>
                      <p>Buka Mulai Pukul : <?php echo $data['jam_buka'];?> Waktu Setempat.</p>
                      <img class="img-fluid" src='../admin/images/<?php echo $data['foto'];?>'  alt="">
                      <ul class="list-inline">
                        <li>Kisaran Harga Menu : <?php echo $data['harga'];?> </li>
                        <li>Kualitas : <?php echo $data['kualitas'];?></li>
                        <li>Jenis Menu : <?php echo $data['jenis_menu'];?></li>
                        <li>Contact : <?php echo $data['contact'];?></li>
                        <li>Alamat (Google Maps) : </li>
                      </ul>
                      <div><iframe src="<?php echo $data['alamat'];?>" width="550" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
                      <br>
                      <button class="btn btn-primary" data-dismiss="modal" type="button">
                        <i class="fas fa-times"></i>
                        Keluar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      
    <!-- Menampilkan semua data menggunakan perulangan while -->
      </div>
  </section>

  <!-- keunggulan -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Keunggulan Kami</h2>
          <h3 class="section-subheading text-muted">Nikmati Beberapa Keunggulan Kami.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-upload fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Update Data</h4>
          <p class="text-muted">Data kami selalu ter-update secara periodik, sehingga kamu dapat melihat informasi baru dari sumber terpercaya</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Responsive Design</h4>
          <p class="text-muted">Website telah menggunakan progressive web app sehingga pengguna khususnya untuk perangkat mobile dapat menikmati layanan kami.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-camera fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Nice Capture</h4>
          <p class="text-muted">Gambar yang kami tampilkan memiliki kualitas high definition dan sudut pandang menarik.</p>
        </div>
      </div>
    </div>
  </section>

    <!-- About -->
    <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          <h3 class="section-subheading text-muted">Kisah Perjalanan Kami.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>2015-2016</h4>
                  <h4 class="subheading">Launching RestoKita</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Kami memulai perjalanan kami di dunia teknologi berbekal kemampuan IT dan dukungan dari banyak pihak.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>March 2016</h4>
                  <h4 class="subheading">Kami Mendapatkan Beberapa Investor</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Pada maret 2016 kami berhasil mendapatkan beberapa investor untuk kemajuan bisnis kami.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>July 2017</h4>
                  <h4 class="subheading">Transisi Ke Digital</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Tepatnya July 2017 kami memutuskan untuk fokus ke bisnis berbasis digital.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>May 2018</h4>
                  <h4 class="subheading">Ekspansi Bisnis</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Pada May 2018, kami mulai memperluas bisnis kami ke beberapa kota di Indonesia</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="bg-light page-section" id="teamkami">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Amazing CEO</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
            <h4>Ardianto Rannu (STB : 182413, Kelas : J)</h4>
            <p class="text-muted">Backend Dev & UI Designer</p>
            <p class="text-muted">Games Enthusiast</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mx-auto text-center">
          <p class="large text-muted">"Born to Change", "Semua yang terlahir berhak untuk bermimpi dan menggapainya - Ardianto Rannu 2021-selamanya"</p>
          <p class="large text-muted">#PastiAdaJalan</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Clients -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Ardianto Rannu 2021</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Restoran Modals -->

  <!-- Modal 1 -->
  <div class="portfolio-modal modal fade" id="restoranModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                  blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia
                  expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Threads</li>
                  <li>Category: Illustration</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2 -->
  <div class="portfolio-modal modal fade" id="restoranModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                  blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia
                  expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Explore</li>
                  <li>Category: Graphic Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 3 -->
  <div class="portfolio-modal modal fade" id="restoranModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est
                  blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia
                  expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Finish</li>
                  <li>Category: Identity</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>