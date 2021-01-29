<!DOCTYPE html> 
<html> 
<head> 
 <title>Pemesanan</title> 
 <style> 
  table{ 
   border-collapse: collapse; 
   width: 70%; 
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
</head> 

<body> 
<h1><p style="text-align: center">Data Pemesanan</p> </h1>
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
 <?php $id=0; foreach ($pemesanan as $key) { 
 $id++; 
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
 <?php }?> 
</table> 

<p style="text-align: center"><button type="submit" class="btn btn-success"><a href="<?php echo site_url('Pemeriksaan/cetakpdf')?>">Cetak PDF</a></p> 
</body> 
</html>