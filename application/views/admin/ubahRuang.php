<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>Edit Ruang</h3>
          <div class="clearfix"></div>
        </div><br>
        <?php foreach($ruang as $key) {?>
          <?=form_open_multipart('Ruang/prosesUbahRuang/'.$key->id_ruang)?>
          <div class="form-group row">
          <input type="hidden" name="id_ruang" value="<?php echo $key->id_ruang ?>">
            <label class="col-sm-3 col-form-label"> Kode Lab </label>
            <div class="col-sm-8">
              <input type="text" name="kode_lab" class="form-control" placeholder="Kode Lab" value="<?php echo $key->kode_lab ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Nama Ruang </label>
            <div class="col-sm-8">
              <input type="text" name="nama_ruang" class="form-control" placeholder="Nama Ruang" value="<?php echo $key->nama_ruang ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Nama Gedung </label>
            <div class="col-sm-8">
            <input type="text" name="nama_gedung" class="form-control" placeholder="Nama Gedung" value="<?php echo $key->nama_gedung ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Total Kapasitas </label>
            <div class="col-sm-8">
            <input type="text" name="total_kapasitas" class="form-control" placeholder="Total Kapasitas" value="<?php echo $key->total_kapasitas ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Internet </label>
            <div class="col-sm-8">
              <input type="radio" name="internet" value="Ada" <?php echo ($key->internet =='Ada')? 'checked':'';?>> Ada &nbsp;&nbsp;
              <input type="radio" name="internet" value="Tidak" <?php echo ($key->internet =='Tidak')? 'checked':'';?>> Tidak<br>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Wifi </label>
            <div class="col-sm-8">
              <input type="radio" name="wifi" value="Ada" <?php echo ($key->wifi =='Ada')? 'checked':'';?>> Ada &nbsp;&nbsp;
              <input type="radio" name="wifi" value="Tidak" <?php echo ($key->wifi =='Tidak')? 'checked':'';?>> Tidak<br>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> LCD </label>
            <div class="col-sm-8">
              <input type="radio" name="lcd" value="Ada" <?php echo ($key->lcd =='Ada')? 'checked':'';?>> Ada &nbsp;&nbsp;
              <input type="radio" name="lcd" value="Tidak" <?php echo ($key->lcd =='Tidak')? 'checked':'';?>> Tidak<br>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Sound System </label>
            <div class="col-sm-8">
              <input type="radio" name="sound_system" value="Ada" <?php echo ($key->sound_system =='Ada')? 'checked':'';?>> Ada &nbsp;&nbsp;
              <input type="radio" name="sound_system" value="Tidak" <?php echo ($key->sound_system =='Tidak')? 'checked':'';?>> Tidak<br>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Catatan </label>
            <div class="col-sm-8">
              <textarea rows="5" cols="40" name="catatan" class="form-control" placeholder="Catatan"><?php echo $key->catatan ?></textarea>
            </div>
          </div>
          <div class="page-header">
            <input type="submit" class="btn btn-success" value="EDIT">&nbsp;&nbsp;
            <a href="<?php echo base_url()?>Ruang"><button type="button" class="btn btn-danger">KEMBALI</button></a>
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