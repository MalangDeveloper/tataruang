<!DOCTYPE html>
<html lang="en">
<head>
<title>Tata Ruang Laboratorium</title>
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

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assetsDatatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assetsDatatables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assetsDatatables/datatables.min.css"/>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
	
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
					<span class="fa fa-desktop"></span> TATA RUANG LABORATORIUM
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
						<a class="nav-link active" href="<?php echo base_url()?>Welcome">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link scroll" href="#jadwal">Jadwal</a>
					</li>
					<li class="nav-item">
						<a class="nav-link scroll" href="#visimisi">Visi & Misi</a>
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
<div class="banner" id="home" style="background-image: url('assetsWelcome/images/bg3.jpg');">
	<div class="container">
		<div class="banner-text">
			<div class="slider-info text-center">
				<div class="agileinfo-logo">
					<h2> TATA RUANG LABORATORIUM </h2>
				</div>
				<h3 class="txt-w3_agile">Universitas Islam Malang</h3>
			</div>
			<div class="row banner-grids text-center mt-md-5 mt-3">
				<div class="col-lg-3 col-md-2">
					<span class="fa clr4 fa-user" style="font-size:150px;"/>
					<!-- <img src="assetsWelcome/images/bathing.png" class="img-fluid" alt="" /> -->
				</div>
				<div class="col-lg-6 col-md-8 banner-para">
					<p class="">Sistem manajemen untuk mengelola tata ruang laboratorium di Universitas Islam Malang. Staff dapat memesan ruang laboratorium untuk dapat digunakan sesuai waktu yang diinginkan.</p>
				</div>
				<div class="col-lg-3 col-md-2">
					<span class="fa clr4 fa-desktop" style="font-size:150px;"/>
					<!-- <img src="assetsWelcome/images/chair.png" class="img-fluid" alt="" /> -->
				</div>
			</div>
			<div class="thim-click-to-bottom text-center">
				<div class="rotate">
					<a href="#about" class="scroll">
					   <i class="fas fa-angle-double-down"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //banner -->

<!-- slider -->
<br><br>
<section class="slider" id="jadwal">
	<div class="container-fluid">
		<div class="right_col" role="main">
			<h3 class="heading mb-5 text-center">Jadwal Pemakaian Laboratorium</h3>
		<table class="table table-striped table-bordered data">
		          <thead>
		            <tr class="bg-group">
		              <th width="5px">NO</th>
		              <th>Kode Lab</th>
		              <th>Nama Ruang</th>
		              <th>Gedung</th>
		              <th>Tanggal</th>
		              <th>Jam Awal</th>
		              <th>Jam Akhir</th>
		            </tr>
		          </thead>
		          <tbody>
		            <?php 
		              $no = 1;
		              foreach ($pesan as $key) 
		              {
		            ?>
		            <tr>
		              <td><?php echo $no; ?></td>
		              <td><?php echo $key->kode_lab;?></td>
		              <td><?php echo $key->nama_ruang;?></td>
		              <td><?php echo $key->nama_gedung;?></td>
		              <td><?php echo $key->tanggal;?></td>
		              <td><?php echo $key->jam_awal;?></td>
		              <td><?php echo $key->jam_akhir;?></td>
		            </tr>
		            <?php
		              $no++;
		              }
		            ?>
		          </tbody>
		        </table>
		</div>
	</div>
</section>
</br>
<section class="slider" id="visimisi">
	<div class="container-fluid">
		<hr width="50%" style="border: 1px black solid;" /><br>
		<h3 class="heading mb-5 text-center">Visi dan Misi</h3>
		<div class="row">
			<div class="col-md-6 slider-left-img p-0">
				<img src="assetsWelcome/images/tips1.jpg" class="img-fluid w-100" alt="" />
			</div>
			<div class="col-lg-6">
				<div class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<div class="testi-pos">
								<h4>Visi Universitas Islam Malang</h4>
							</div>
							<div class="testi-agile">
								<p>
									Menjadi Universitas unggul bertaraf internasional, berorientasi masa depan dalam IPTEKS dan budaya, untuk kemaslahatan umat yang berakhlaqul karimah, berlandaskan Islam Ahlussunnah waljama’ah.
								</p>								
							</div><br>
						</li>
						<li>
							<div class="testi-pos">
								<h4>Misi Universitas Islam Malang</h4>
							</div>
							<div class="testi-agile">
								<p>
										-&nbsp; &nbsp;Meningkatkan kualitas pendidikan, penelitian, pengabdian kepada masyarakat, yang berpihak pada kemaslahatan umat menuju universitas berkualifikasi internasional (world class university)
									</br>
										-&nbsp; &nbsp;Mengembangkan dan menyebarluaskan akses pendidikan dan ajaran Islam Ahlussunnah waljama’ah .
									</br>
									    -&nbsp; &nbsp;Menguatakan kapasitas institusi untuk mewujudkan kualiotas pendidikan dan pembelajaran yang handal serta unggul berstandar internasional dengan meningkatkan tata kelola yang baik ( Good University Governance)
								</p>
							</div><br>					
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //slider -->

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
						<img src="assetsWelcome/images/t4.png" class="img-fluid w-100" alt="login_image"/>
					</div>
					<div class="col-md-6 align-self-center">
						<form action="<?php echo base_url("Welcome/aksi_login"); ?>" method="post">
							<div class="form-group">
								<label for="email" class="col-form-label">Username</label>
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
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/media/js/jquery2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
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