<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA BASIS KASUS</h3>
          <div class="clearfix"></div>
        </div>
        <div class="pull-right"><a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add_new"><span class="glyphicon glyphicon-plus"></span> Add New</a></div><br><br>
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
            <tr class="bg-group">
              <th width="5px">NO</th>
              <th>Kode Kasus</th>
              <th>Penyakit</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              foreach ($kasus as $key) 
              {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->kd_kasus;?></td>
              <td><?php echo $key->nm_penyakit;?></td>
              <td>
                <a href="<?php echo base_url('BasisKasus/detailKasus/'.$key->id_kasus)?>" class="btn btn-primary"><span class="glyphicon glyphicon-list"></span> Detail</a>
                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?=$key->id_kasus;?>"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="<?php echo base_url('BasisKasus/hapusKasus/'.$key->id_kasus)?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data : <?=$key->nm_penyakit;?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Kasus Penyakit</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'BasisKasus/simpanKasus'?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Penyakit</label>
            <div class="col-sm-8">
              <select class='form-control' id='exampleFormControlSelect2' name='id_penyakit' required>
                <option value="">-- Pilih Penyakit --</option>
                <?php foreach ($penyakitKasus as $key) {
                  echo "<option value=".$key->id_penyakit.">".$key->nm_penyakit."</option>";
                }?>
              </select>
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
<!--END MODAL ADD-->

<?php 
  $no = 1;
  foreach ($kasus as $key) 
  {
?>
<div class="modal fade" id="modal_edit<?=$key->id_kasus;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php echo site_url('BasisKasus/prosesUbahKasus'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Kasus</h4>
        </div>
        <div class="modal-body">     
          <input type="hidden" readonly value="<?=$key->id_kasus;?>" name="id_kasus" class="form-control">
          <div class="form-group">
            <label class="control-label col-xs-3" >Penyakit</label>
            <div class="col-sm-8">
              <select class='form-control' id='exampleFormControlSelect2' name='fk_penyakit' required>
                <option value="">-- Pilih Penyakit--</option>
                <?php foreach ($penyakitKasus as $a) {
                  echo '<option value="'.$a->id_penyakit.'" ';
                  if ($key->fk_penyakit==$a->id_penyakit)
                    echo "selected";
                  echo '>'.$a->nm_penyakit.'</option>';
                }?>
              </select>
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