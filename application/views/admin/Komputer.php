<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA KOMPUTER</h3>
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
                <th>Merk</th>
                <th>Processor</th>
                <th>Memori</th>
                <th>Hardisk</th>
                <th>Foto</th>
                <th>Total Komputer</th>
                <th>Ruang</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i=1;
                foreach ($komputer as $key) 
                {
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $key->merk;?></td>
                  <td><?php echo $key->processor;?></td>
                  <td><?php echo $key->memori;?></td>
                  <td><?php echo $key->hardisk;?></td>
                  <td><img src="Gambar/komputer/<?php echo $key->foto;?>" border=2 height=100 width=100></td>
                  <td><?php echo $key->total_komputer;?></td>
                  <td><?php echo $key->nama_ruang;?></td>
                  <td><?php echo $key->keterangan;?></td>
                  <td>
                    <a href="<?= base_url() ?>Komputer/ubahKomputer/<?= $key->id_komputer?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a></button>
                    <a href="<?= base_url() ?>Komputer/hapusKomputer/<?= $key->id_komputer?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data : <?=$key->merk;?> ?');" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></button>
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
        <h3 class="modal-title" id="myModalLabel">Tambah Komputer</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'/Komputer/simpanKomputer'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Merk</label>
            <div class="col-xs-8">
              <input name="merk" class="form-control" type="text" placeholder="Merk" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Processor</label>
            <div class="col-xs-8">
              <input name="processor" class="form-control" type="text" placeholder="Processor" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Memori</label>
            <div class="col-xs-8">
              <input name="memori" class="form-control" type="text" placeholder="Memori" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Hardisk</label>
            <div class="col-xs-8">
              <input name="hardisk" class="form-control" type="text" placeholder="Hardisk" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Foto</label>
            <div class="col-xs-8">
              <input type="file" class="form-control" id="foto" name="foto" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Total Komputer</label>
            <div class="col-xs-8">
              <input name="total_komputer" class="form-control" type="number" placeholder="Total Komputer" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Ruang</label>
            <div class="col-sm-8">
              <select class='form-control' id='ruang' name='id_ruang' required>
                <option value="">-- Pilih Ruang--</option>
                <?php foreach ($ruang as $a) {
                  echo '<option value="'.$a->id_ruang.'" ';
                  if ($key->id_ruang==$a->id_ruang)
                    echo "";
                  echo '>'.$a->nama_ruang.'</option>';
                }?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Keterangan</label>
            <div class="col-xs-8">
              <textarea rows="5" cols="40" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
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