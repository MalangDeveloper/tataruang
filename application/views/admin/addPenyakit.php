<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><span class="fa fa-list"></span> Tambah Penyakit </h2>
          <div class="clearfix"></div>
        </div><br>
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <?php echo form_open_multipart("Penyakit/simpanPenyakit"); ?>
          <div class="form-group row">
            <label for="nm_penyakit" class="col-sm-3 col-form-label"> Nama Penyakit </label>
            <div class="col-sm-8">
              <input type="text" name="nm_penyakit" class="form-control" placeholder="Nama Penyakit" value="<?php echo set_value('nm_penyakit'); ?>" >
              <?php echo form_error('nm_penyakit') ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="detail" class="col-sm-3 col-form-label"> Detail Penyakit </label>
            <div class="col-sm-8">
              <textarea name="detail" rows="5" cols="40" class="form-control" placeholder="Detail Penyakit" value="<?php echo set_value('detail'); ?>"></textarea>
              <?php echo form_error('detail') ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="solusi" class="col-sm-3 col-form-label"> Solusi Penyakit </label>
            <div class="col-sm-8">
              <textarea name="solusi" rows="5" cols="40" class="form-control" placeholder="Solusi Penyakit" value="<?php echo set_value('solusi'); ?>"></textarea>
              <?php echo form_error('solusi') ?>
            </div>
          </div><br>
          <center><button type="submit" class="btn btn-primary" name="submit"><span class="oi oi-person"></span> TAMBAH </button></center>
        </div>
        <?php echo form_close(); ?>
        <div class="col-sm-1"></div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>