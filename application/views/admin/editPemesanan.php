<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>Edit Pemesanan</h3>
          <div class="clearfix"></div>
        </div><br>
        <?php foreach($pemesanan as $key) {?>
          <?=form_open_multipart('Admin/prosesUbahpemesanan/'.$key->id_pemesanan)?>
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
          <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Kursus</label>
            <div class="col-sm-8">
              <select class='form-control' id='kursus' name='id_kursus' required>
                <option value="">-- Pilih Kursus--</option>
                <?php foreach ($kursus as $a) {
                  echo '<option value="'.$a->id_kursus.'" ';
                  if ($key->id_kursus==$a->id_kursus)
                    echo "selected";
                  echo '>'.$a->nama_kursus.'</option>';
                }?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Instruktur</label>
            <div class="col-sm-8">
              <select class='form-control' id='instruktur' name='id_instruktur' required>
                <option value="">-- Pilih Instruktur--</option>
                <?php foreach ($instruktur as $a) {
                  echo '<option value="'.$a->id_instruktur.'" ';
                  if ($key->id_instruktur==$a->id_instruktur)
                    echo "selected";
                  echo '>'.$a->nama_instruktur.'</option>';
                }?>
              </select>
            </div>
          </div>
         <div class="form-group row">
            <label class="col-sm-3 col-form-label" >Ruang</label>
            <div class="col-sm-8">
              <select class='form-control' id='ruang' name='id_ruang' required>
                <option value="">-- Pilih Ruang--</option>
                <?php foreach ($ruang as $a) {
                  echo '<option value="'.$a->id_ruang.'" ';
                  if ($key->id_ruang==$a->id_ruang)
                    echo "selected";
                  echo '>'.$a->nama_ruang.'</option>';
                }?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Tanggal </label>
            <div class="col-sm-8">
              <input type="date" name="tanggal" class="form-control" value="<?php echo $key->tanggal ?>" format="Y/m/d"></input>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Jam Awal </label>
            <div class="col-sm-8">
              <input type="time" name="jam_awal" class="form-control" value="<?php echo $key->jam_awal ?>" ></input>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Jam Akhir </label>
            <div class="col-sm-8">
              <input type="time" name="jam_akhir" class="form-control" value="<?php echo $key->jam_akhir ?>" ></input>
            </div>
          </div>
          <div class="page-header">
            <input type="submit" class="btn btn-success" value="EDIT">&nbsp;&nbsp;
            <a href="<?php echo base_url()?>Admin/DataPemesanan"><button type="button" class="btn btn-danger">KEMBALI</button></a>
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