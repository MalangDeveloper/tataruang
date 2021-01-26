<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA KOMPUTER</h3>
          <h4>
            <?php echo $nama_ruang->kode_lab;?> - <?php echo $nama_ruang->nama_ruang;?>, Gedung <?php echo $nama_ruang->nama_gedung;?>
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
              <tr class="bg-group">
                <th width="5px">NO</th>
                <th>Merk</th>
                <th>Processor</th>
                <th>Memori</th>
                <th>Hardisk</th>
                <th>Foto</th>
                <th>Total Komputer</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $i=1;
                foreach ($komputer as $key) 
                {
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $key->merk;?></td>
                  <td><?php echo $key->processor;?></td>
                  <td><?php echo $key->memori;?></td>
                  <td><?php echo $key->hardisk;?></td>
                  <td><img src="<?php echo base_url('Gambar/komputer/')?><?php echo $key->foto;?>" alt="" border=2 height=100 width=100></td>
                  <td><?php echo $key->total_komputer;?></td>
                  <td><?php echo $key->keterangan;?></td>
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