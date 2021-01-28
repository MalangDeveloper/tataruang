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
              <input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $key->tgl_lahir ?>" >
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
          <div class="page-header">
            <input type="submit" class="btn btn-success" value="SIMPAN">&nbsp;&nbsp;
            <a href="<?php echo base_url()?>Instruktur"><button type="button" class="btn btn-danger">KEMBALI</button></a>
          </div>
          <?php echo form_close(); ?>
        <?php } ?>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>