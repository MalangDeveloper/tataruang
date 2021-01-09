<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA GEJALA PENYAKIT</h3>
          <div class="clearfix"></div>
        </div>
        <div class="col-sm-10">
          <?php echo form_open_multipart("BasisKasus/simpanGejalaKasus"); ?>
          <input type="hidden" name="id_kasus" value="<?php echo $this->uri->segment(3); ?>" >
          <?php echo form_error('id_kasus') ?>
          <div class="form-group row">
            <label for="exampleFormControlSelect2" class="col-sm-3 col-form-label">Nama Gejala</label>
            <div class="col-sm-8">
              <select class='form-control' id='exampleFormControlSelect2' name='id_gejala' required>
                <option value="">-- Pilih Gejala --</option>
                <?php foreach ($gejalaKasus as $key) {
                  echo "<option value=".$key->id_gejala.">".$key->nm_gejala."</option>";
                }?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="bobot" class="col-sm-3 col-form-label"> Bobot </label>
            <div class="col-sm-8">
              <select class='form-control' id='exampleFormControlSelect2' name='bobot' required>
                <option value="">-- Bobot Gejala pada Penyakit --</option>
                <option value="1">1 - Biasa</option>
                <option value="3">3 - Sedang</option>
                <option value="5">5 - Dominan</option>
              </select>
            </div>
          </div>
          <center><button type="submit" class="btn btn-primary" name="submit"><span class="oi oi-person"></span> SUBMIT </button></center>
        </div>
        <?php echo form_close(); ?>
        <div class="col-sm-1"></div>
        <div class="clearfix"></div><br>
        <table class="table table-striped table-bordered data">
          <thead>
            <tr class="bg-group">
              <th width="5px">NO</th>
              <th>Nama Gejala</th>
              <th>Bobot</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              foreach ($kasus as $key)
              {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->nm_gejala;?></td>
              <td><?php echo $key->bobot;?></td>
              <?php $id_kasus= $this->uri->segment(3);?>
              <td><a href="<?= base_url('BasisKasus/hapusGejala/'.$key->id_detail.'/'.$id_kasus); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data : <?=$key->nm_gejala;?> ?');" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
            <?php
              $no++;
              }
            ?>
          </tbody>
        </table>
        <div class="clearfix"></div>
        <a href="<?php echo base_url()?>BasisKasus"><button type="button" class="btn btn-success">KEMBALI</button></a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>