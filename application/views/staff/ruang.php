<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA PEMESANAN</h3>
          <div class="clearfix"></div>
        </div>
        <table class="table table-striped table-bordered data">
          <thead>
            <tr class="bg-group"">
              <th width="5px">NO</th>
              <th>Kode Lab</th>
              <th>Nama Ruang</th>
              <th>Nama Gedung</th>
              <th>Total Kapasistas</th>
              <th>Internet</th>
              <th>Wifi</th>
              <th>LCD</th>
              <th>Sound System</th>
              <th>Catatan</th>
            </tr>
          </thead>
          <tbody>
             <?php 
              $no = 1;
              foreach ($ruang as $key) 
              {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->kode_lab;?></td>
              <td><?php echo $key->nama_ruang;?>
                <a href="<?= base_url() ?>Staff/detailKomputer/<?= $key->id_ruang?>" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Detail</a></button>
              </td>
              <td><?php echo $key->nama_gedung;?></td>
              <td><?php echo $key->total_kapasitas;?></td>
              <td><?php echo $key->internet;?></td>
              <td><?php echo $key->wifi;?></td>
              <td><?php echo $key->lcd;?></td>
              <td><?php echo $key->sound_system;?></td>
              <td><?php echo $key->catatan;?></td>
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
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>