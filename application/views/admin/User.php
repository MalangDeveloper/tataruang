<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA USER</h3>
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
              <th>Nama</th>
              <th>Email</th>
              <th>Password</th>
              <th>Fakultas</th>
              <th>Level</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i=1;
              foreach ($user as $key) 
              {
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $key->nama;?></td>
              <td><?php echo $key->email;?></td>
              <td><?php echo $key->password;?></td>
              <td><?php echo $key->nama_fakultas;?></td>
              <td><?php echo $key->level;?></td>
              <td><?php echo $key->created_at;?></td>
              <td><?php echo $key->updated_at;?></td>
              <td>
                <a href="<?= base_url() ?>Users/hapus_user/<?= $key->id_users?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data : <?=$key->nama;?> ?');"><span class="glyphicon glyphicon-trash"></span></a>
                <a href="<?= base_url() ?>User/ubah_user/<?= $key->id_users?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a>
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

<!-- ============ MODAL ADD =============== -->
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah User</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'Users/simpanUser'?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Nama</label>
            <div class="col-xs-8">
              <input name="nama" class="form-control" type="text" placeholder="Nama" required>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Email</label>
            <div class="col-xs-8">
              <input name="email" class="form-control" type="email" placeholder="Email" required>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Password</label>
            <div class="col-xs-8">
              <input name="password" class="form-control" type="password" placeholder="Password" required>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Fakultas</label>
            <div class="col-sm-8">
              <select class='form-control' id='fakultas' name='id_fakultas' required>
                <option value="">-- Pilih Fakultas--</option>
                <?php foreach ($fakultas as $a) {
                  echo '<option value="'.$a->id_fakultas.'" ';
                  if ($key->id_fakultas==$a->id_fakultas)
                    echo "selected";
                  echo '>'.$a->nama_fakultas.'</option>';
                }?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >No. Telepon</label>
            <div class="col-xs-8">
              <input name="noWa" class="form-control" type="text" placeholder="No. Telepon" required>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Level</label>
            <div class="col-xs-8">
              <select class='form-control' id='exampleFormControlSelect2' name='level' required>
                <option value="">-- Level User --</option>
                <option value="Admin">Admin</option>
                <option value="Pakar">Pakar</option>
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

<!-- jaga-jaga script agar modal atau pop up dapat muncul -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>