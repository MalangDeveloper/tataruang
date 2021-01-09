<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA GEJALA PENYAKIT PEMERIKSAAN REVISI</h3><br>
          <p><b>Keterangan !!</b></p>
          <p>- Jika kasus ini dirasa cocok untuk dijadikan solusi untuk kasus baru maka data dibawah ini dapat disesuaikan datanya dan <em>WAJIB</em> mengisi masing-masing bobot, setelah itu klik button <b><em>SIMPAN</em></b></p>
          <p>- Namun, apabila kasus ini tidak cocok untuk dijadikan solusi untuk kasus baru maka dapat langsung klik button <b><em>HAPUS</em></b></p>
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

        <?php foreach($penyakit as $key) {?>
        <?=form_open_multipart('Pakar/ProsesRevisi/'.$key->id_pemeriksaan)?>
       

          <div class="form-group row">
            <label class="control-label col-xs-3" >Jenis Penyakit</label>
            <div class="col-sm-8">
              <select class='form-control' id='exampleFormControlSelect2' name='fk_penyakit' required>
                <option value="">-- Pilih Jenis Penyakit--</option>
                <?php foreach ($penyakitKasus as $a) {
                  echo '<option value="'.$a->id_penyakit.'" ';
                  if ($key->fk_penyakit==$a->id_penyakit)
                    echo "selected";
                  echo '>'.$a->nm_penyakit.'</option>';
                }?>
              </select>
            </div>
          </div><br>
           <?php } ?>
          
          

        <table class="table table-striped table-bordered data">
          <thead>
            <tr class="bg-group">
              <th width="5px">NO</th>
              <th>Nama Gejala</th>
              <th>Bobot</th>
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            <?php 
               $no = 1;
               foreach ($pemeriksaan as $key) 
               {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><input type="hidden" name="fk_gejala[]" value="<?php echo $key->fk_gejala ?>"><?php echo $key->nm_gejala;?></td>
              <!-- <td><?php echo $key->bobot;?></td> -->
              <td>
                <select class='form-control' id='exampleFormControlSelect2' name='bobot[]' required>
                <option value="">-- Bobot Gejala pada Penyakit --</option>
                <option value="1">1 - Biasa</option>
                <option value="3">3 - Sedang</option>
                <option value="5">5 - Dominan</option>
              </select>
              </td>
              <!-- <td>
                <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_edit<?=$key->id_detail;?>"><span class="glyphicon glyphicon-edit"></span></a>
              </td> -->
            </tr>
            <?php
              $no++;
              }
            ?>
          </tbody>
        </table>

        <div class="clearfix"></div>
          <input type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Ingin Menyimpan Hasil Revisi Sebagai Solusi Baru ?');" value="SIMPAN">

          <a href="<?php echo base_url()?>Pakar/DataPemeriksaanRevisi"><button type="button" class="btn btn-primary">KEMBALI</button></a>

        <?php echo form_close(); ?>

        <?php foreach($penyakit as $key) {?>
        <?=form_open_multipart('Pakar/ProsesRevisiDihapus/'.$key->id_pemeriksaan)?>
          <input type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda Ingin Menghapus Data dan Tidak Perlu Direvisi ?');" value="HAPUS">
        <?php } ?>
        <?php echo form_close(); ?>
        
       
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