<!DOCTYPE html> 
<html><head> 
 <title>Pemeriksaan</title> 
 <style> 
  table{ 
   border-collapse: collapse; 
   width: 90%; 
   margin: 0 auto; 
  } 
  table th{ 
   border:1px solid #000; 
   padding: 3px; 
   font-weight: bold; 
   text-align: center; 
  } 
  table td{ 
   border: 1px solid #000; 
   padding: 3px; 
   vertical-align: top; 
  } 
 </style>
 <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head><body>
  <h2 style="text-align: center">Defisiensi Vitamin</h2><br><br>
<h1><p style="text-align: center"><b>Consultation Result</b></p> </h1>
<p style="text-align: center">Dari gejala-gejala yang dipilih sebagai berikut :</p>
<table> 
 <tr>
      <th>Gejala</th>
 </tr> 
 <?php foreach ($gejala as $key) { 
 ?> 
  <tr>
  <td><?php echo $key->nm_gejala;?></td>
  </tr> 
 <?php
  }?> 
</table><br><br>
<p style="text-align: center">Menghasilkan analisa seperti dibawah ini yang merupakan dugaan penyakit dari hasil konsultasi dengan sistem. Segera periksakan ke ahlinya agar penyakit tidak semakin parah. Semoga lekas membaik ^^</p>
<table> 
 <tr>
      <th>Tanggal Pemeriksaan</th>
      <th>Penyakit</th>
      <th>Detail Penyakit</th>
      <th>Solusi Penyakit</th>
      <th>Persentase (%)</th>
 </tr> 
 <?php $id=1; foreach ($pemeriksaan as $key) { 
 ?> 
  <tr>
  <td><?php echo $key->tgl_pemeriksaan;?></td>
  <td><?php echo $key->nm_penyakit;?></td>
  <td><?php echo $key->detail;?></td>
  <td><?php echo $key->solusi;?></td>
  <td><?php echo $key->hasil;?></td>
  </tr> 
 <?php
 $id++; 
  }?> 
</table>
 
</body></html>