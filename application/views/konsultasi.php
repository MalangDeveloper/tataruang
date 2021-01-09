<!DOCTYPE html>
<html lang="en">
<head>
<title>Defisiensi Vitamin</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	
	<!-- css files -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetsWelcome/css/bootstrap.css"><!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assetsWelcome/css/style.css" media="all"><!-- custom css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assetsWelcome/css/fontawesome-all.css"><!-- fontawesome css -->
	<!-- //css files -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!-- //google fonts -->
	
</head>
<body>

<!-- header -->
<header>
	<div class="container">
		<!-- top nav -->
		<nav class="top_nav d-flex pt-4">
			<!-- logo -->
			<h1>
				<a class="navbar-brand" href="<?php echo base_url()?>Welcome">
					<span class="fa fa-male mr-2"></span> Defisiensi Vitamin
				</a>
			</h1>
			<!-- //logo -->
			<div class="w3ls_right_nav ml-auto d-flex">
				<div class="nav-icon d-flex">
					<!-- sigin -->
					<a class="text-white login_btn align-self-center mx-md-3" data-toggle="modal" data-target="#exampleModal1">
						<i class="far fa-user"></i>
					</a>
					<!-- <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#loginModal">Login</button> -->
					<!-- sigin -->
				</div>
			</div>
		</nav>
		<!-- //top nav -->
		<!-- bottom nav -->
		<nav class="navbar navbar-expand-lg navbar-light justify-content-center">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mx-auto text-center">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url()?>Welcome">
							<span class="fa fa-home" style="font-size:40px;"></span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- //bottom nav -->
	</div>
	<!-- //header container -->
</header>
<!-- //header -->

<!-- banner -->
<div class="inner_banner layer" id="home">
	<div class="container">
		<div class="banner-padding">
			<h2 class="text-center heading">Consultation Page</h2>
		</div>
	</div>
</div>
<!-- //banner -->

<!-- services -->
<section class="services py-5" id="furniture">
	<div class="container py-lg-3">
		<?php if ($this->session->flashdata('success')) {?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php  } elseif($this->session->flashdata('hapus')) {?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('hapus'); ?> 
          </div>
        <?php } elseif($this->session->flashdata('error')) {?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('error'); ?> 
          </div>
        <?php } ?>
		<h3 class="heading mb-5 text-center">Please Consult</h3>
		<h5 class="card-title ">
			<a href="single.html">Petunjuk Konsultasi</a>
		</h5>
		<p class="card-text">
			<p>(1) Untuk memulai konsultasi, isi Kuesioner dibawah ini <em>sesuai dengan kecocokan gejala</em> seperti keterangan dibawah ini :</p><br>
          	<p>Centang <span class="far fa-check-square"></span> gejala tersebut, jika :</p>
          	<p>- Sedang merasakan gejala tersebut.</p>
          	<p>- Pernah sekali, duakali, atau lebih merasakan gejala tersebut dalam waktu 3 bulan terakhir namun dengan rentang waktu berbeda.</p>
          	<p>- Sering merasakan gejala tersebut dan dalam waktu yang berdekatan.</p><br>
          	<p>(2) Jika dirasa gejala yang diisi sudah sesuai dengan gejala yang dirasa, lalu klik tombol <em>SUBMIT</em> agar sistem dapat mulai untuk memproses.</p><br>
          	<p>(3) Langkah terakhir, tunggu hingga sistem selesai memproses dan memunculkan hasil konsultasi, <em>hasil konsultasi dapat disimpan dengan klik tombol <em>PDF</em> dibawah hasil konsultasi.</em></p><br>
          	<p>(4) <em>Semoga Lekas Sembuh ^^ Semangat!!</em></p>
        </p><br>
        <form action="<?php echo site_url('Perhitungan'); ?>" method="post" enctype="multipart/form-data">
			<table class="table table-striped table-bordered data">
	            <thead>
	                <tr class="bg-group" align="center">
	            	    <!-- <th width="5px" rowspan="2" style="vertical-align: middle;">NO</th> -->
	            	    <th>NO</th>
	                	<th>Nama Gejala</th>
	                  	<th>Jawaban</th>
	                </tr>
	            </thead>
	            <tbody>
		            <?php 
		            $i=1;
		            foreach ($gejala as $key) {
		            ?>
		                <tr>
		            	    <td align="center"><?php echo $i; ?></td>
		                	<td><?php echo $key->nm_gejala;?></td>
		                	<td align="center"><input type="checkbox" name="check_list[]" alt="Checkbox" value="<?php echo $key->id_gejala ?>"></td>
		                </tr>
		            <?php
		            $i++;
		            }
		            ?>
	            </tbody>
	        </table>
			<div class="agileinfo_mail_grid_right submit-buttons text-center">
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>
</section>
<!-- //services -->

<!-- signin Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1" aria-hidden="true">
	<div class="agilemodal-dialog modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body  pt-3 pb-5 px-sm-5">
				<div class="row">
					<div class="col-md-6">
						<img src="<?php echo base_url();?>assetsWelcome/images/t4.png" class="img-fluid" alt="login_image" />
						<p class="pt-5">Jika anda pengunjung website, anda tidak perlu login untuk melakukan konsultasi, langsung kunjungi halaman Konsultasi yang terterda di halaman utama. Login hanya untuk admin dan pakar saja.</p>
					</div>
					<div class="col-md-6 align-self-center">
						<form action="<?php echo base_url("Welcome/aksi_login"); ?>" method="post">
							<div class="form-group">
								<label for="email" class="col-form-label">E-mail</label>
								<input type="text" class="form-control" placeholder=" " name="email" id="email" required="">
							</div>

							<div class="form-group">
								<label class="col-form-label">Password</label>
								<input type="password" class="input100 form-control" placeholder=" " name="password" required="">
							</div>
					
							<div class="right-w3l">
								<input type="submit" nama="submit" class="form-control" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- signin Modal -->


    <!-- js -->
    <script type="text/javascript" src="<?php echo base_url();?>assetsWelcome/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsWelcome/js/jquery-2.2.3.min.js"></script>
    <!-- //js -->

	<!-- Responsiveslides -->
	<script type="text/javascript" src="<?php echo base_url();?>assetsWelcome/js/responsiveslides.min.js"></script>
    <script>
        // You can also use"$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!-- // Responsiveslides -->
    <script type="text/javascript" src="<?php echo base_url();?>assetsWelcome/js/smoothscroll.js"></script><!-- Smooth scrolling -->

    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="<?php echo base_url();?>assetsWelcome/js/move-top.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsWelcome/js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            /*
			var defaults = {
				  containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			 };
			*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //end-smoth-scrolling -->

</body>
</html>