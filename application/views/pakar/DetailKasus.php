<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA GEJALA PENYAKIT</h3>
          <div class="clearfix"></div>
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
            </tr>
            <?php
              $no++;
              }
            ?>
          </tbody>
        </table>
        <div class="clearfix"></div>
        <a href="<?php echo base_url()?>Pakar/DataKasus"><button type="button" class="btn btn-success">KEMBALI</button></a>
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