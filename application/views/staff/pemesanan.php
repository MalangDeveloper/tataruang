<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA PEMESANAN</h3>
          <div class="clearfix"></div>
        </div>
        <!-- <div class="pull-right"><a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add_new"><span class="glyphicon glyphicon-plus"></span> Add New</a></div><br><br> -->
        <div class="pull-right"><a href="<?= base_url() ?>Staff/tambahPemesanan/" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span>Add New</a></div><br><br>

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
        <table class="table table-striped table-bordered data">
          <thead>
            <tr class="bg-group"">
              <th width="5px">NO</th>
              <th>Kode Lab</th>
              <th>Nama Ruang</th>
              <th>Gedung</th>
              <th>Tanggal</th>
              <th>Jam Awal</th>
              <th>Jam Akhir</th>
              <th>Fakultas</th>
              <th>Kursus</th>
              <th>Nama Instruktur</th>
              <th>Nama Staff</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              foreach ($pemesanan as $key) 
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
              <td><?php echo $key->nama_fakultas;?></td>
              <td><?php echo $key->nama_kursus;?></td>
              <td><?php echo $key->nama_instruktur;?></td>
              <td><?php echo $key->nama;?></td>
              <td><a href="<?= base_url() ?>Staff/ubahPemesanan/<?= $key->id_pemesanan?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a></button>
              </td>
            </tr>
            <?php
              $no++;
              }
            ?>
          </tbody>
        </table>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-- ============ MODAL ADD =============== -->

<!--END MODAL ADD-->

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>