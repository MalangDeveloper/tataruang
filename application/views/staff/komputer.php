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
              <th>Merk</th>
              <th>Processor</th>
              <th>Memori</th>
              <th>Hardisk</th>
              <th>Foto</th>
              <th>Ruang</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
             <?php 
              $no = 1;
              foreach ($komputer as $key) 
              {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $key->merk;?></td>
              <td><?php echo $key->processor;?></td>
              <td><?php echo $key->memori;?></td>
              <td><?php echo $key->hardisk;?></td>
              <td><img src="<?php echo base_url('Gambar/komputer/')?><?php echo $key->foto;?>" alt="" border=2 height=100 width=100></td>
              <td><?php echo $key->nama_ruang;?></td>
              <td><?php echo $key->keterangan;?></td>
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