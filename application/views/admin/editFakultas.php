<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>Edit Fakultas</h3>
          <div class="clearfix"></div>
        </div><br>
        <?php foreach($fakultas as $key) {?>
          <?=form_open_multipart('Fakultas/prosesUbahFakultas/'.$key->id_fakultas)?>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Nama Fakultas </label>
            <div class="col-sm-8">
              <input type="hidden" name="id_fakultas" value="<?php echo $key->id_fakultas ?>">
              <input type="text" name="nama_Fakultas" class="form-control" placeholder="Nama Fakultas" value="<?php echo $key->nama_fakultas ?>" >
            </div>          
          <div class="page-header">
            <input type="submit" class="btn btn-success" value="EDIT">&nbsp;&nbsp;
            <a href="<?php echo base_url()?>Fakultas"><button type="button" class="btn btn-danger">KEMBALI</button></a>
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