
<!-- banner -->
<div class="inner_banner layer" id="home">
	<div class="container">
		<div class="banner-padding">
			<h2 class="text-center heading">Consultation Result</h2>
		</div>
	</div>
</div>
<!-- //banner -->

<!-- services -->
<section class="services py-5" id="furniture">
	<div class="container py-lg-3">
		<h3 class="heading mb-5 text-center">Hasil Diagnosa</h3>

		<h5 class="heading">Gejala Dipilih</h5><br>
		<table class="table table-striped table-bordered data">
            <thead>
                <tr class="bg-group" align="center">
            	    <th width="5px">NO</th>
                	<th>Nama Gejala</th>
                </tr>
            </thead>
            <tbody>
	            <?php 
	            $i=1;
	            foreach ($gejala as $key => $value) {
	            ?>
	                <tr>
	            	    <td align="center"><?php echo $i; ?></td>
	                	<td align="center" name="gejala[]"><?php echo $value; ?></td>
	                </tr>
	            <?php
	            $i++;
	            }
	            ?>
            </tbody>
        </table>

		<h5 class="heading">Perhitungan</h5><br>
		<table class="table table-striped table-bordered data">
            <thead>
                <tr class="bg-group" align="center">
            	    <th width="5px">NO</th>
                	<th>Gejala Kasus</th>
                	<th>Gejala Dipilih</th>
                	<th>Gejala Cocok</th>
                	<th>Sum Gejalah</th>
                	<th>Pembagi</th>
                	<th>Hasil (Cocok/Kasus)</th>
                </tr>
            </thead>
            <tbody>
	            <?php 
	            $i=1;
	            foreach ($table_perhitungan as $key => $value) {
	            ?>
	                <tr>
	            	    <td align="center"><?php echo $i; ?></td>
	            	    <td align="center"><?php echo $value['gejala_kasus'] ?></td>
	            	    <td align="center"><?php echo $value['gejala_dipilih'] ?></td>
	            	    <td align="center"><?php echo $value['gejala_cocok'] ?></td>
	            	    <td align="center"><?php echo $value['sum_gejala'] ?></td>
	            	    <td align="center"><?php echo $value['pembagi'] ?></td>
	                	<td align="center" name="kasus[]"><?php echo $value['hasil']; ?></td>
	                </tr>
	            <?php
	            $i++;
	            }
	            ?>
            </tbody>
        </table>

        <h5 class="heading">Hasil Analisa Penyakit</h5><br>
		<table class="table table-striped table-bordered data">
            <thead>
                <tr class="bg-group" align="center">
            	    <th width="5px">NO</th>
                	<th width="50%">Penyakit</th>
                	<th width="50%">Persentase (%)</th>
                </tr>
            </thead>
            <tbody>
	            <?php 
	            $i=1;
	            foreach ($hasil_analisa_penyakit as $key => $value) {
	            ?>
	                <tr>
	            	    <td align="center"><?php echo $i; ?></td>
	            	    <td align="center"><?php echo $value['penyakit'] ?></td>
	                	<td align="center" name="persen[]"><?php echo $value['persentase']; ?></td>
	                </tr>
	            <?php
	            $i++;
	            }
	            ?>
            </tbody>
        </table>

        <h5 class="heading">Anda Kemungkinan Menderita Penyakit :</h5><br>
		<table class="table table-striped table-bordered data">
            <thead>
                <tr class="bg-group" align="center">
            	    <th width="4%">NO</th>
                	<th width="18%">Penyakit</th>
                	<th width="30%">Detail</th>
                	<th width="30%">Solusi</th>
                	<th width="18%">Persentase (%)</th>
                </tr>
            </thead>
            <tbody>
	            <?php 
	            $i=1;
	            foreach ($kemungkinan_penyakit_yang_diderita as $key => $value) {
	            ?>
	                <tr>
	            	    <td align="center"><?php echo $i; ?></td>
	            	    <td align="center"><?php echo $value['penyakit']; ?></td>
	            	    <td align="center"><?php echo $value['detail']; ?></td>
	            	    <td align="center"><?php echo $value['solusi']; ?></td>
	                	<td align="center" name="persen[]"><?php echo $value['persentase']; ?></td>
	                </tr>
	            <?php
	            $i++;
	            }
	            ?>
            </tbody>
        </table>
	</div>
</section>
<!-- //services -->