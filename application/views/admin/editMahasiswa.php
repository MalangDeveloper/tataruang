<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>EDIT MAHASIWA</h3>
          <div class="clearfix"></div>
        </div><br>
        <?php foreach($Mahasiswa as $key) {?>
          <?=form_open_multipart('Mahasiswa/prosesUbahMahasiswa/'.$key->id_mahasiswa)?>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Nama Mahasiswa </label>
            <div class="col-sm-8">
              <input type="hidden" name="id_mahasiswa" value="<?php echo $key->id_mahasiswa ?>">
              <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama instruktur" value="<?php echo $key->nama_mahasiswa ?>" >
            </div> 
          </div> 
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> NIM </label>
            <div class="col-sm-8">
              <input type="text" name="nim" class="form-control" placeholder="NIM" value="<?php echo $key->nim ?>" >
            </div> 
          </div>   
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Tanggal Lahir </label>
            <div class="col-sm-8">
              <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $key->tgl_lahir ?>" >
            </div> 
          </div>    
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Password </label>
            <div class="col-sm-8">
              <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $key->password ?>" disabled >
            </div> 
          </div>  
          <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Fakultas</label>
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
          
          <br>
          <center><button type="submit" class="btn btn-success"><span class="oi oi-person"></span>SIMPAN</button>
            <a href="<?php echo base_url()?>Users"><button type="button" class="btn btn-danger">KEMBALI</button></a>
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
              <form class="form-horizontal" action="<?php echo base_url('Mahasiswa/ubahpassMahasiswa/'.$key->id_mahasiswa)?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Password</label>
                            <div class="col-lg-10">
                              <input type="hidden" id="id_mahasiswa" name="id_mahasiswa">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru" minlength="8">
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


<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>