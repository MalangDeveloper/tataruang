<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA PEMESANAN</h3>
          <div class="clearfix"></div>
        </div>
        <div class="pull-right"><a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add_new"><span class="glyphicon glyphicon-plus"></span> Add New</a></div><br><br>

        <?php if ($this->session->flashdata('success')) {?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php  } elseif($this->session->flashdata('hapus')) {?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('hapus'); ?> 
          </div>
        <?php } elseif($this->session->flashdata('error')) {?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
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
              <th>Fakultas</th>
              <th>Kursus</th>
              <th>Nama Instruktur</th>
              <th>Nama Staff</th>
              <th>Action</th>
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
              <td><?php echo $key->nama_fakultas;?></td>
              <td><?php echo $key->nama_kursus;?></td>
              <td><?php echo $key->nama_instruktur;?></td>
              <td><?php echo $key->nama;?></td>
              <td><a href="<?= base_url() ?>Staff/ubahPemesanan/<?= $key->id_pemesanan?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></a></button>
              </td>
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

<!-- ============ MODAL ADD =============== -->


<?php var_dump("bvc")?></td>
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Pemesanan</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url().'Pemesanan/simpanPemesanan'?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Nama Laboratorium</label>
            <div class="col-sm-8">
              <select class='form-control' id='ruang' name='id_ruang' required>
                <option value="">-- Pilih Laboratorium--</option>
                <?php foreach ($ruang as $a) {
                  echo '<option value="'.$a->id_ruang.'" ';
                  if ($key->id_ruang==$a->id_ruang)
                    echo "selected";
                  echo '>'.$a->nama_ruang.'</option>';
                }?>
              </select>
            </div>
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
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Fakultas</label>
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
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Kursus</label>
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
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Instruktur</label>
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
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button class="btn btn-info">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--END MODAL ADD-->

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>