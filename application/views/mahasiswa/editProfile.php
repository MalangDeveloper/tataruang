<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA MAHASISWA</h3>
          <div class="clearfix"></div>
        </div><br>

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

        <?php foreach($mahasiswa as $key) { ?>

          <?php echo form_open_multipart("mhs/updateProfile"); ?>

          <div class="form-group row">
            <label for="e-ma" class="col-sm-3 col-form-label" > Username </label>
            <div class="col-sm-8">
              <input type="hidden" name="id_mahasiswa" class="form-control"  value="<?php echo $key->id_mahasiswa ?>">
              <input type="text" name="nim" class="form-control" placeholder="Username" value="<?php echo $key->nim ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label"> Password </label>
            <div class="col-sm-8">
              <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $key->password ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label"> Nama </label>
            <div class="col-sm-8">
              <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama Lengkap" value="<?php echo $key->nama_mahasiswa ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Fakultas</label>
            <div class="col-sm-8">
              <select class='form-control' id='fakultas' name='id_fakultas' disabled>
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
        <br>
          <center><button type="submit" class="btn btn-success" name="submit"><span class="oi oi-person"></span>SIMPAN</button>
            <a href="<?php echo base_url()?>mhs"><button type="button" class="btn btn-danger">KEMBALI</button></a>
          <a 
                            href="javascript:;"
                             data-id="<?php echo $key->id_mahasiswa ?>"
                            data-password="<?php echo $key->password ?>"
                            data-toggle="modal" data-target="#edit-data">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-primary">Ubah Password</button>
                        </a></center>
        </div>
       
        <div class="col-sm-1"></div>
        <!-- </form> -->
     <?php echo form_close(); ?>

<?php
}
?>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  <h4 class="modal-title">Ubah Password</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('mhs/ubahpass')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Password</label>
                            <div class="col-lg-10">
                              <input type="hidden" id="id_mahasiswa" name="id_mahasiswa">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="submit"> Ubah&nbsp;</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)

            // Isi nilai pada field
            modal.find('#id_mahasiswa').attr("value",div.data('id_mahasiswa'));
            modal.find('#password').attr("value",div.data('password'));
        });
    });
</script>

<!-- jaga-jaga script agar modal atau pop up dapat muncul -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>