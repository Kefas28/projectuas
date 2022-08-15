<body onload = "javascript:window.print()" style = "margin:0 auto; width: 1000px">
<div style = "margin-left : 20px"></div>

<div style = "margin: auto; top:20%; left: 20%; display:block; position:absolute; 
opacity: 0.05; font-size: 200pt; filter: alpha(opacity=20);">

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

<label><font size ="6"><u><center>Laporan Data Kas Keluar</center></u></font>
</label><p>&nbsp;</p>

<table style ="border: 1px solid gray;" width  ="100%" cellpadding="0"
cellspacing="0">
<tr>
    <th style ="border-right: 1px solid gray">No.</th>
    <th style ="border-right: 1px solid gray">No Ref</th>
    <th style ="border-right: 1px solid gray">Tanggal Keluar</th>
    <th style ="border-right: 1px solid gray">Nama Kas</th>
    <th style ="border-right: 1px solid gray">Keterangan</th>
    <th style ="border-right: 1px solid gray">Jumlah</th>
</tr>

<?php
include 'database.php';
$db = new database();
$laporan_kas_keluar = $db->laporan_kas_keluar();
   $no = 1;
   foreach($laporan_kas_keluar as $row){
    ?>
<tr>
<td align ="center" style="border-right: 1px solid gray; border-top: 1px 
solid gray; padding: 3px 5px; "><?php echo $no++; ?></td>    
<td align ="center" style="border-right: 1px solid gray; border-top: 1px 
solid gray; padding: 3px 5px; "><?php echo $row['no_ref'] ?></td> 
<td align ="center" style="border-right: 1px solid gray; border-top: 1px 
solid gray; padding: 3px 5px; "><?php echo $row['tgl_keluar'] ?></td> 
<td  style="border-right: 1px solid gray; border-top: 1px 
solid gray; padding: 3px 5px; "><?php echo $row['nm_kas'] ?></td>
<td  style="border-right: 1px solid gray; border-top: 1px 
solid gray; padding: 3px 5px; "><?php echo $row['ket_k'] ?></td> 
<td align ="center" style="border-right: 1px solid gray; border-top: 1px
solid gray; padding: 3px 5px; "><?php echo $row['jumlah'] ?> </td> 


</tr>

<?php }
?>

</table>

<p>&nbsp;</p>

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
</body>

 
