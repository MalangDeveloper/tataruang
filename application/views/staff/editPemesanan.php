<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>Edit Pemesanan</h3>
          <div class="clearfix"></div>
        </div><br>

        <?php if ($this->session->flashdata('success')) {?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php } elseif($this->session->flashdata('hapus')) { ?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('hapus'); ?> 
          </div>
        <?php } elseif($this->session->flashdata('error')) {?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?> 
          </div>
        <?php } ?>

        <?php foreach($pemesanan as $key) {?>
          <?=form_open_multipart('Staff/prosesUbahpemesanan/'.$key->id_pemesanan)?>
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
                    echo '>'.$a->nama_ruang.' - Gedung: '.$a->nama_gedung.'</option>';
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
            <input type="submit" class="btn btn-success" value="SIMPAN">&nbsp;&nbsp;
            <a href="<?php echo base_url()?>Staff/DataPemesanan"><button type="button" class="btn btn-danger">KEMBALI</button></a>
          </div>
          <?php echo form_close(); ?>
        <?php } ?>

        
        <table class="table table-striped table-bordered data">
          <thead>
            <tr class="bg-group">
              <th width="5px">NO</th>
              <th>Kode Lab</th>
              <th>Nama Ruang</th>
              <th>Gedung</th>
              <th>Tanggal</th>
              <th>Jam Awal</th>
              <th>Jam Akhir</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              foreach ($pesan as $key) 
              {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->kode_lab;?></td>
              <td><?php echo $key->nama_ruang;?></td>
              <td><?php echo $key->nama_gedung;?></td>
              <td><?php echo $key->tanggal;?></td>
              <td><?php echo $key->jam_awal;?></td>
              <td><?php echo $key->jam_akhir;?></td>
            </tr>
            <?php
              $no++;
              }
            ?>
          </tbody>
        </table>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>