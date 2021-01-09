<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?php echo base_url()?>Staff" class="site_title"><i class="fa fa-user-md"></i> <span>Tata Ruang Laboratorium</span></a>
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
          <li><a href="<?php echo base_url();?>Staff"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo base_url();?>Staff/DataPemesanan"><i class="fa fa-book"></i> Pemesanan</a></li>
          <li><a href="<?php echo base_url();?>Staff/DataRuang"><i class="fa fa-cube"></i> Ruang</a></li>
          <li><a href="<?php echo base_url();?>Staff/DataKomputer"><i class="fa fa-desktop"></i> Komputer</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>