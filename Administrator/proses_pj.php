<?php
include'database.php';
$db = new database();

$aksi = $_GET['aksi'];
		if($aksi == "tambah"){
			$db -> input_pj($_POST['kd_pj'],
			$_POST['nm_pj'],
			$_POST['alamat'],
			$_POST['nohp'],
			$_POST['stts']);
echo "
	<script language = 'JavaScript'>
	alert('Data Berhasil Disimpan');
	document.location='data_pj.php';
	</script>
	";
		} else if ($aksi == "update"){
			$db -> update_pj($_POST['kd_pj'],
			$_POST['nm_pj'],
			$_POST['alamat'],
			$_POST['nohp'],
			$_POST['stts']);
echo "
	<script language = 'JavaScript'>
	alert('Data Distributor Berhasil Diupdate');
	document.location='data_pj.php';
	</script>
	";
		} else if ($aksi=="delete") {
			$kd_pj = $_GET['id'];
			$db->delete_pj($kd_pj);
			header('location:data_pj.php');
		}
		
		
		else {
			echo "Database anda error silahkan kembali lagi <a href = 'data_pj.php?'>Klik Disini</a>";
		}

?>