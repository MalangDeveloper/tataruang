<!DOCTYPE html> 
<html><head> 
 <title>Cetak Jadwal</title> 
 <link rel="icon" type="image/x-icon" href="<?php echo base_url('Gambar/icon.ico')?>">
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
  <h2 style="text-align: center">DATA JADWAL PEMESANAN RUANG</h2><br><br>
<h1><p style="text-align: center"><b>Universitas Islam Malang</b></p> </h1>
<p style="text-align: center">JL. Mayjend Haryono 193 Malang, 65144</p>
<br>
<table> 
 <tr>
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
 </tr> 
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
  </tr> 
 <?php
  $no++;
  }
?>
</table>
 
</body></html>