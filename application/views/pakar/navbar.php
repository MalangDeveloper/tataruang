<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?php echo base_url()?>Pakar" class="site_title"><i class="fa fa-user-md"></i> <span>Tata Ruang Laboratorium</span></a>
    </div>
    <div class="clearfix"></div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="<?php echo base_url('Gambar/pakar.png') ?>" class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2><?php echo $this->session->userdata("nama");?></h2>
      </div>
    </div><br/>
    <!-- /menu profile quick info -->

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li><a href="<?php echo base_url();?>Pakar"><i class="fa fa-home"></i> Home</a>
          <li><a><i class="fa fa-desktop"></i> Penyakit <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url();?>Pakar/DataPenyakit">Data Penyakit</a></li>
              <li><a href="<?php echo base_url();?>Pakar/DataKasus">Data Basis Kasus</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-stethoscope"></i> Pemeriksaan <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo base_url();?>Pakar/DataPemeriksaan"><i class="fa fa-medkit"></i> Data Pemeriksaan </a></li>
              <li><a href="<?php echo base_url();?>Pakar/DataPemeriksaanRevisi"><i class="fa fa-wrench"></i> Data Pemeriksaan Revisi </a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>