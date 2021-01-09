<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>Edit Penyakit</h3>
          <div class="clearfix"></div>
        </div><br>
        <?php foreach($penyakit as $key) {?>
          <?=form_open_multipart('Penyakit/prosesUbahPenyakit/'.$key->id_penyakit)?>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Nama Penyakit </label>
            <div class="col-sm-8">
              <input type="hidden" name="id_penyakit" value="<?php echo $key->id_penyakit ?>">
              <input type="text" name="nm_penyakit" class="form-control" placeholder="Nama Penyakit" value="<?php echo $key->nm_penyakit ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Detail Penyakit </label>
            <div class="col-sm-8">
              <input type="hidden" name="id_penyakit" value="<?php echo $key->id_penyakit ?>">
              <textarea rows="5" cols="40" name="detail" class="form-control" placeholder="Detail Penyakit"><?php echo $key->detail ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Solusi Penyakit </label>
            <div class="col-sm-8">
              <input type="hidden" name="id_penyakit" value="<?php echo $key->id_penyakit ?>">
              <textarea rows="5" cols="40" name="solusi" class="form-control" placeholder="Solusi Penyakit"><?php echo $key->solusi ?></textarea>
            </div>
          </div>
          <div class="page-header">
            <input type="submit" class="btn btn-success" value="EDIT">&nbsp;&nbsp;
            <a href="<?php echo base_url()?>Penyakit"><button type="button" class="btn btn-danger">KEMBALI</button></a>
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