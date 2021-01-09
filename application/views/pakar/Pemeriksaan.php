<div class="right_col" role="main">
  <div class="row">
    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA PEMERIKSAAN</h3><br>
          <p><b>Keterangan !!</b></p>
          <p>- Status <b><em>Tanpa Revisi</em></b>, Jika kasus baru sudah memiliki hasil presentase lebih dari 50%</p>
          <p>- Status <b><em>Perlu Revisi</em></b>, Jika kasus baru hanya memiliki hasil presentase kurang dari 50%, sehingga perlu adanya proses revisi dari pakar untuk mendapatkan solusi yang tepat</p>
          <p>- Status <b><em>Diperiksa Tanpa Revisi</em></b>, Jika kasus baru hanya memiliki hasil presentase kurang dari 50% dan sudah diperiksa oleh pakar, namun kasus tersebut tidak tepat untuk dijadikan solusi baru untuk kasus selanjutnya</p>
          <p>- Status <b><em>Diperiksa Dengan Revisi</em></b>, Jika kasus baru hanya memiliki hasil presentase kurang dari 50%, sudah diperiksa dan direvisi oleh pakar karena tepat untuk dijadikan solusi baru dari kasus selanjutnya</p>
          <div class="clearfix"></div>
        </div><br>
          <table class="table table-striped table-bordered data">
            <thead>
              <tr class="bg-group">
                <th width="5px">NO</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Dugaan Penyakit</th>
                <th>Persentase (%)</th>
                <th>Status</th>
                <th>Tanggal Direvisi</th>
                <th>Pemeriksa</th>
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
                <td>
                  <?php
                    if ($key->status==1)
                    echo "Tanpa Revisi";
                    if ($key->status==2)
                    echo "Perlu Revisi";
                    if ($key->status==3)
                    echo "Diperiksa Tanpa Revisi";
                    if ($key->status==4)
                    echo "Diperiksa Dengan Revisi";
                  ?>
                </td>
                <td>
                  <?php
                    if ($key->tgl_direvisi==0000-00-00){
                      echo "-";
                    }else{
                      echo $key->tgl_direvisi;
                    }
                  ?>
                </td>
                <td>
                  <?php
                    if ($key->fk_user==null){
                      echo "-";
                    }else{
                      echo $key->nama;
                    }
                  ?>
                </td>
                <td>
                  <a href="<?php echo base_url('Pakar/detailPemeriksaan/'.$key->id_pemeriksaan)?>" class="btn btn-primary"><span class="glyphicon glyphicon-list"></a>
                  <a href="<?php echo base_url('Pakar/hapusPemeriksaan/'.$key->id_pemeriksaan)?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data : <?=$key->nm_penyakit;?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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