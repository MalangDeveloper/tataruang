<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>JADWAL YANG DIIKUTI</h3>
          <h4>
            <?php echo $nama_mahasiswa->nim;?> - <?php echo $nama_mahasiswa->nama_mahasiswa;?>
          </h4>
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
          <table class="table table-striped table-bordered data">
          <thead>
            <tr class="bg-group"">
              <th width="5px">NO</th>
              <th>Kode Lab</th>
              <th>Nama Ruang</th>
              <th>Gedung</th>
              <th>Tanggal</th>
              <th>Jam Awal</th>
              <th>Jam Akhir</th>
              <th>Kursus</th>
              <th>Nama Instruktur</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $no = 1;
              foreach ($pemesanan as $key) 
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
              <td><?php echo $key->nama_kursus;?></td>
              <td><?php echo $key->nama_instruktur;?></td>                    
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
</div>

<!-- ============ MODAL ADD BARANG =============== -->
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Komputer</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'/Komputer/simpanKomputer'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Merk</label>
            <div class="col-xs-8">
              <input name="merk" class="form-control" type="text" placeholder="Merk" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Processor</label>
            <div class="col-xs-8">
              <input name="processor" class="form-control" type="text" placeholder="Processor" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Memori</label>
            <div class="col-xs-8">
              <input name="memori" class="form-control" type="text" placeholder="Memori" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Hardisk</label>
            <div class="col-xs-8">
              <input name="hardisk" class="form-control" type="text" placeholder="Hardisk" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Foto</label>
            <div class="col-xs-8">
              <input type="file" class="form-control" id="foto" name="foto" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Total Komputer</label>
            <div class="col-xs-8">
              <input name="total_komputer" class="form-control" type="number" placeholder="Total Komputer" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Ruang</label>
            <div class="col-sm-8">
              <select class='form-control' id='ruang' name='id_ruang' required>
                <option value="">-- Pilih Ruang--</option>
                <?php foreach ($ruang as $a) {
                  echo '<option value="'.$a->id_ruang.'" ';
                  echo '>'.$a->nama_ruang.' - Gedung: '.$a->nama_gedung.'</option>';
                }?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Keterangan</label>
            <div class="col-xs-8">
              <textarea rows="5" cols="40" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button class="btn btn-info">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL ADD BARANG-->

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>