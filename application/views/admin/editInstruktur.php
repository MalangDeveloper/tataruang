<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>Edit Instruktur</h3>
          <div class="clearfix"></div>
        </div><br>
        <?php foreach($instruktur as $key) {?>
          <?=form_open_multipart('Instruktur/prosesUbahInstruktur/'.$key->id_instruktur)?>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Nama Instruktur </label>
            <div class="col-sm-8">
              <input type="hidden" name="id_instruktur" value="<?php echo $key->id_instruktur ?>">
              <input type="text" name="nama_instruktur" class="form-control" placeholder="Nama instruktur" value="<?php echo $key->nama_instruktur ?>" >
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