<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>Edit Komputer</h3>
          <div class="clearfix"></div>
        </div><br>
        <?php foreach($komputer as $key) {?>
          <?=form_open_multipart('Komputer/prosesUbahKomputer/'.$key->id_komputer)?>
          <div class="form-group row">
          <input type="hidden" name="id_komputer" value="<?php echo $key->id_komputer ?>">
            <label class="col-sm-3 col-form-label"> Merk </label>
            <div class="col-sm-8">
              <input type="text" name="merk" class="form-control" placeholder="Merk" value="<?php echo $key->merk ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Processor  </label>
            <div class="col-sm-8">
              <input type="text" name="processor" class="form-control" placeholder="Processor " value="<?php echo $key->processor ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Memori </label>
            <div class="col-sm-8">
            <input type="text" name="memori" class="form-control" placeholder="Memori" value="<?php echo $key->memori ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"> Hardisk </label>
            <div class="col-sm-8">
            <input type="text" name="hardisk" class="form-control" placeholder="Hardisk" value="<?php echo $key->hardisk ?>" >
            </div>
          </div>
          <div class="form-group row">
          <label class="col-sm-3 col-form-label"> Foto </label>
            <div class="col-sm-8">
            <td><img src="<?php echo base_url('assetsWelcome/komputer/')?><?php echo $key->foto;?>" alt="" border=2 height=100 width=100><?php echo $key->foto;?></td>
              <input type="file" class="form-control" id="foto" name="foto" required>
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
            <label class="control-label col-xs-3" >Keterangan</label>
            <div class="col-xs-8">
              <textarea rows="5" cols="40" name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $key->keterangan?></textarea>
            </div>
          </div>
          <div class="page-header">
            <input type="submit" class="btn btn-success" value="EDIT">&nbsp;&nbsp;
            <a href="<?php echo base_url()?>Komputer"><button type="button" class="btn btn-danger">KEMBALI</button></a>
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