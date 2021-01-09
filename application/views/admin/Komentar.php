<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA SARAN DAN KRITIK</h3>
          <div class="clearfix"></div>
        </div><br>
        <?php if($this->session->flashdata('hapus')) { ?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-success alert-dismissible" role="alert">
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
              <tr class="bg-group">
                <th width="5px">NO</th>
                <th>Saran & Kritik</th>
                <th width="5px">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i=1;
                foreach ($komen as $key) 
                {
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $key->komen;?></td>
                  <td>
                    <a href="<?= base_url() ?>Home/hapus_komentar/<?= $key->id_komen?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data Komentar Ini ?');"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>
              <?php
                $i++;
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

<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>