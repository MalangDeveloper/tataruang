<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA PENYAKIT</h3>
          <div class="clearfix"></div>
        </div>
        <div class="pull-right"><a href="<?php echo base_url(). "Penyakit/addPenyakit"; ?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> ADD NEW</button></a></div><br><br><br>
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
              <th>Kode Penyakit</th>
              <th>Nama Penyakit</th>
              <th>Detail Penyakit</th>
              <th>Solusi</th>
              <th width="70px">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              foreach ($penyakit as $key)
              {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->kd_penyakit;?></td>
              <td><?php echo $key->nm_penyakit;?></td>
              <td><?php echo $key->detail;?></td>
              <td><?php echo $key->solusi;?></td>
              <td>
                <a href="<?= base_url() ?>Penyakit/ubahPenyakit/<?= $key->id_penyakit?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a></button>
                <a href="<?= base_url() ?>Penyakit/hapusPenyakit/<?= $key->id_penyakit?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data : <?=$key->nm_penyakit;?> ?');" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></button>
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

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>