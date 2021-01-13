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
                <th>Nama Kursus</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i=1;
                foreach ($kursus as $key) 
                {
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $key->nama_kursus;?></td>
                  <td>
                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?=$key->id_kursus;?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="<?= base_url() ?>Kursus/hapusKursus/<?= $key->id_kursus?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data : <?=$key->nama_kursus;?> ?');"><span class="glyphicon glyphicon-trash"></span></a></button>
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
        <h3 class="modal-title" id="myModalLabel">Tambah Kursus</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'/Kursus/simpanKursus'?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Nama Kursus</label>
            <div class="col-xs-8">
              <input name="nama_kursus" class="form-control" type="text" placeholder="Nama Kursus" required>
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

<?php 
  $no = 1;
  foreach ($kursus as $key) 
  {
?>
<div class="modal fade" id="modal_edit<?=$key->id_kursus;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php echo site_url('Kursus/prosesUbah'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Kursus</h4>
        </div>
        <div class="modal-body">     
          <input type="hidden" readonly value="<?=$key->id_kursus;?>" name="id_kursus" class="form-control">
          <div class="form-group">
            <label class="control-label col-xs-3" >Nama Kursus</label>
            <div class="col-xs-8">
              <input name="nama_kursus" class="form-control" type="text" value="<?=$key->nama_kursus;?>" required>
            </div>
          </div><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>
        </div>
    </form>
  </div>
</div>
</div>
<?php
  $no++;
  }
?>

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>