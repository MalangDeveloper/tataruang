<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA PEMERIKSAAN REVISI</h3>
          <p>Dibawah ini merupakan data hasil pemeriksaan yang dilakukan oleh user dan hanya memiliki hasil persentase dibawah 50% sehingga perlu adanya peninjauan.</p>
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
              <tr class="bg-group">
                <th width="5px">NO</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Dugaan Penyakit</th>
                <th>Persentase (%)</th>
                <!-- <th>Penangan Kasus</th> -->
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                 $i=1;
                foreach ($pemeriksaan as $key) 
                {
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $key->tgl_pemeriksaan;?></td>
                <td><?php echo $key->nm_penyakit;?></td>
                <td><?php echo $key->hasil;?></td>
                <!-- <td><?php echo $key->status;?></td> -->
                <!-- <td><?php echo $key->nama;?></td> -->
                <td>
                  <a href="<?php echo base_url('Pakar/detailPemeriksaanRevisi/'.$key->id_pemeriksaan)?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-list"> Gejala</a>
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