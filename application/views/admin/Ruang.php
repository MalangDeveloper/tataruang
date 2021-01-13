<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA KURSUS</h3>
          <div class="clearfix"></div>
        </div><br>
        <div class="pull-right"><a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add_new"><span class="glyphicon glyphicon-plus"></span> Add New</a></div><br><br>
        <?php if ($this->session->flashdata('success')) {?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php } elseif($this->session->flashdata('hapus')) { ?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('hapus'); ?> 
          </div>
        <?php } elseif($this->session->flashdata('error')) {?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?> 
          </div>
        <?php } ?>
          <table class="table table-striped table-bordered data">
            <thead>
              <tr class="bg-group">
                <th width="5px">NO</th>
                <th>Kode Lab</th>
                <th>Nama Ruang</th>
                <th>Nama Gedung</th>
                <th>Total Kapasitas</th>
                <th>Internet</th>
                <th>Wifi</th>
                <th>LCD</th>
                <th>Sound System</th>
                <th>Catatan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i=1;
                foreach ($ruang as $key) 
                {
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $key->kode_lab;?></td>
                  <td><?php echo $key->nama_ruang;?></td>
                  <td><?php echo $key->nama_gedung;?></td>
                  <td><?php echo $key->total_kapasitas;?></td>
                  <td><?php echo $key->internet;?></td>
                  <td><?php echo $key->wifi;?></td>
                  <td><?php echo $key->lcd;?></td>
                  <td><?php echo $key->sound_system;?></td>
                  <td><?php echo $key->catatan;?></td>
                  <td>
                    <a href="<?= base_url() ?>Ruang/ubahRuang/<?= $key->id_ruang?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a></button>
                    <a href="<?= base_url() ?>Ruang/hapusRuang/<?= $key->id_ruang?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data : <?=$key->nama_ruang;?> ?');" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></button>
                  </td>
                </tr>
              <?php
                $i++;
                }
              ?>
            </tbody>
          </table>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ============ MODAL ADD BARANG =============== -->
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Ruang</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'/Ruang/simpanRuang'?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Nama Ruang</label>
            <div class="col-xs-8">
              <input name="nama_ruang" class="form-control" type="text" placeholder="Nama Ruang" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button class="btn btn-info">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL ADD BARANG-->

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>