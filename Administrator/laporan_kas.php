<body onload = "javascript:window.print()" <?php #untuk mencetak sampai sini ?> style = "margin:0 auto; width: 1000px">
<div style = "margin-left : 20px"></div>

<?php #Membuat Watermark ?>
<div style = "margin: auto; top:20%; 
			left: 20%; 
			display:block; 
			position:absolute; 
			opacity: 0.05; 
			font-size: 200pt; 
			filter: alpha(opacity=20);">

<label>ASLI</label>
</div>

<p>&nbsp;</p>
<img src = "image/logo.png" style = "width: 10%; float:left;">
<table width="90%" cellpadding="0" cellspacing="0">
    <tr>
        <td><div align ="center"> <font size ="8"><b>Kas Keluarga Besar</b>
        </font></div></td>
    </tr>

    <tr>
        <td><div align ="center"> <font size ="5"><b>Jl. Sindang Laut No.51, Kec. Lemahabang, Kab. Cirebon, Jawa Barat
        </font></div></td>
        </b> 
    </tr>
</table><br><hr>

<?php #untuk mencetak HEADER, sampai sini ?>

<label><font size ="6"><u><center>Laporan Data Kas</center></u></font>
</label><p>&nbsp;</p>

<table style ="border: 1px solid gray;" width  ="100%" cellpadding="0"
cellspacing="0">
<tr>
    <th style ="border-right: 1px solid gray">No.</th>
    <th style ="border-right: 1px solid gray">Foto</th>
    <th style ="border-right: 1px solid gray">Kode Kas</th>
    <th style ="border-right: 1px solid gray">Nama Kas</th>
    <th style ="border-right: 1px solid gray">Saldo</th>
    <th style ="border-right: 1px solid gray">Penanggung Jawab</th>
</tr>

<?php
include 'database.php';
$db = new database();
$data_kas= $db->data_kas();
   $no = 1;
   foreach($data_kas as $row){
    ?>
<tr>

<?php #Ambil dari data barang masuk, tinggal ditambah garis kolomnya saja ?>

<td align ="center" style="border-right: 1px solid gray; border-top: 1px 
solid gray; padding: 3px 5px; "><?php echo $no++; ?></td>    
<td align ="center" style="border-right: 1px solid gray; border-top: 1px 
solid gray; padding: 3px 5px; "><?php echo "<img src= 'Dokumen/$row[foto]' width='100' height='100'>" ?></td> 
<td align ="center" style="border-right: 1px solid gray; border-top: 1px 
solid gray; padding: 3px 5px; "><?php echo $row['kd_kas']  ?></td> 
<td  style="border-right: 1px solid gray; border-top: 1px 
solid gray; padding: 3px 5px; "><?php echo $row['nm_kas'] ?></td> 
<td align ="center" style="border-right: 1px solid gray; border-top: 1px
solid gray; padding: 3px 5px; ">Rp. <?php echo $row['saldo'] ?></td> 
<td style="border-right: 1px solid gray; border-top: 1px
solid gray; padding: 3px 5px; "><?php echo $row['nm_pj'] ?></td>
<?php #number format untuk membuat angkat co.20.000 untuk membagi 3 3, 0 disini untuk menghilangkan koma ?> 

</tr>

<?php }
?>

</table>

<?php #untuk mencetak ISI, sampai sini ?>

<p>&nbsp;</p>

<?php #nbsp untuk memberi jarak ?>


<table align = "right" cellpadding ="0" cellspacing = "0">
<?php #align agar tanda tangan disebelah kanan ?>
<tr><td><center>Cirebon, <?php echo date("d F Y") ?> 
<?php #Tanggal hari ini akan ditampilkan secara otomatis, fungsi Date(ada tanggal bulan tahun, tahun bulan tanggal)(m=no bulan F=nama bulan Y=tahun full y=2 angka saja) ?>
</center> </td><tr>
<tr><td><center>Kas Keluarga Besar</center>
<p align = "center" ><img src ="image/ttd.png" width-"15%"></p>
<center><u>Kefas Zefanya S.Kom</u></center>
</td></tr>
</table>

<?php #untuk mencetak FOOTER, sampai sini ?>

</body>


<?php #Tugas tampilan diedit dengan report CSS?>
<?php #INGAT -> yang terpenting adalah LOGIKA BERFIKIR ?>
<?php #INGAT LOGIKA -> DIsini stok, bisa juga dipaki untuk menghitung perkreditan, misalkan angsuran bulan ini akan memotong jumlah akhirnya ?>
