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

	<script type="text/javascript" src="jquery-1.7.min.js"></script>
 <script>
 //Inisiasi awal penggunaan jQuery
 $(document).ready(function(){
  //Pertama sembunyikan elemen class detail
        $('.detail').hide();        

  //Ketika elemen class tampil di klik maka elemen class detail tampil
        $('.tampil').click(function(){
   $('.detail').show();
        });

  //Ketika elemen class sembunyi di klik maka elemen class detail sembunyi
        $('.sembunyi').click(function(){
   //Sembunyikan elemen class detail
   $('.detail').hide();        
        });
 });
 </script>
	
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
					<span class="fa fa-female mr-2"></span> Defisiensi Vitamin
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
			<h2 class="text-center heading">Consultation Result</h2>
		</div>
	</div>
</div>
<!-- //banner -->

<!-- services -->
<section class="services py-5" id="furniture">
	<div class="container py-lg-3">
		<h3 class="heading mb-5 text-center">Hasil Diagnosa</h3>
		<div class="x_content" style="text-align: center;">
                <img src="<?php echo base_url();?>Gambar/hd5.gif" class="img-fluid" alt="hd" height="400px" />
              </div>
              <br>

		

        
	            <?php
	            foreach ($kemungkinan_penyakit_yang_diderita as $key => $value) {
	            ?>
	            <h5 class="heading text-center">Dari hasil analisa yang didapat, kemungkinan penyakit yang anda derita adalah <b><?php echo $value['penyakit']; ?></b> dengan persentase sebesar <b name="persen[]"><?php echo $value['persentase']; ?>%</b>. Detail penyakit dan solusi pertama agar tidak semakin parah :</h5><br>
	            	<div class="form-group row">
            <label class="col-sm-3 col-form-label"> Detail Penyakit </label>
            <div class="col-sm-8">
              <textarea rows="5" cols="40" name="detail" class="form-control" placeholder="Detail Penyakit" readonly><?php echo $value['detail']; ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Solusi Penyakit </label>
            <div class="col-sm-8">
              <textarea rows="5" cols="40" name="solusi" class="form-control" placeholder="Solusi Penyakit" readonly><?php echo $value['solusi']; ?></textarea>
            </div>
          </div>
	            <?php
	            }
	            ?>
            </tbody>
        </table>
        <br><h5 class="heading text-center">Semakin besar hasil persentase yang didapat, semakin besar pula kemungkinan anda menderita penyakit tersebut. Jadi jangan menunda untuk berkonsultasi langsung ke pakarnya agar dapat segera diketahui, dicegah, dan diobati. Detail analisa penyakit dapat dilihat dengan klik button dibawah ini :</h5><br>


							<div class="agileinfo_mail_grid_right submit-buttons text-center">
			<input type="submit" class="tampil" value="Tampil"/>
<input type="submit" class="sembunyi" value="Sembunyi"/>
		</div><br>
        
 <div class="detail">
  <h5 class="heading">Gejala Dipilih</h5><br>
		<table class="table table-striped table-bordered data">
            <thead>
                <tr class="bg-group" align="center">
            	    <th width="5px">NO</th>
                	<th>Nama Gejala</th>
                </tr>
            </thead>
            <tbody>
	            <?php 
	            $i=1;
	            foreach ($gejala as $key => $value) {
	            ?>
	                <tr>
	            	    <td align="center"><?php echo $i; ?></td>
	                	<td align="center" name="gejala[]"><?php echo $list_gejala[$value]->nm_gejala; ?></td>
	                </tr>
	            <?php
	            $i++;
	            }
	            ?>
            </tbody>
        </table>

		<h5 class="heading">Perhitungan</h5><br>
		<table class="table table-striped table-bordered data">
            <thead>
                <tr class="bg-group" align="center">
            	    <th width="5px">NO</th>
                	<th>Gejala Kasus</th>
                	<th>Gejala Dipilih</th>
                	<th>Gejala Cocok</th>
                	<th>Sum Gejalah</th>
                	<th>Pembagi</th>
                	<th>Hasil (Cocok/Kasus)</th>
                </tr>
            </thead>
            <tbody>
	            <?php 
	            $i=1;
	            foreach ($table_perhitungan as $key => $value) {
	            ?>
	                <tr>
	            	    <td align="center"><?php echo $i; ?></td>
	            	    <td align="center"><?php echo $value['gejala_kasus'] ?></td>
	            	    <td align="center"><?php echo $value['gejala_dipilih'] ?></td>
	            	    <td align="center"><?php echo $value['gejala_cocok'] ?></td>
	            	    <td align="center"><?php echo $value['sum_gejala'] ?></td>
	            	    <td align="center"><?php echo $value['pembagi'] ?></td>
	                	<td align="center" name="kasus[]"><?php echo $value['hasil']; ?></td>
	                </tr>
	            <?php
	            $i++;
	            }
	            ?>
            </tbody>
        </table>

        <h5 class="heading">Hasil Analisa Penyakit</h5><br>
		<table class="table table-striped table-bordered data">
            <thead>
                <tr class="bg-group" align="center">
            	    <th width="5px">NO</th>
                	<th width="50%">Penyakit</th>
                	<th width="50%">Persentase (%)</th>
                </tr>
            </thead>
            <tbody>
	            <?php 
	            $i=1;
	            foreach ($hasil_analisa_penyakit as $key => $value) {
	            ?>
	                <tr>
	            	    <td align="center"><?php echo $i; ?></td>
	            	    <td align="center"><?php echo $value['penyakit'] ?></td>
	                	<td align="center" name="persen[]"><?php echo $value['persentase']; ?></td>
	                </tr>
	            <?php
	            $i++;
	            }
	            ?>
            </tbody>
        </table>
 </div>
        <div class="agileinfo_mail_grid_right submit-buttons text-center">
        	<p><b>Anda bisa menyimpan hasil analisi konsultasi anda dengan klik button dibawah ini, karena setelah anda ke halaman Home anda tidak dapat melihat hasil analisa anda sebelumnya.</b></p>
			<a href="<?php echo base_url(). 'Perhitungan/cetakPdf'; ?>"><button class="btn btn-warning"><span class="far fa-file-pdf"></span> PDF </button></a>
		</div>
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
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //end-smoth-scrolling -->

</body>
</html>