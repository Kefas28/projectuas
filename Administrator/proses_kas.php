<?php
include'database.php';
$db = new database();

$aksi = $_GET['aksi'];
		if($aksi == "tambah"){
			$foto       = $_FILES['foto']['name'];
			$file_tmp   = $_FILES['foto']['tmp_name'];
			$angka_acak = rand(1,9999);
			$foto_baru  = $angka_acak.'-'.$foto;
			$folder     = "Dokumen/";
			move_uploaded_file($file_tmp, $folder .$foto_baru);

			$db -> input_kas($_POST['kd_kas'],
			$_POST['nm_kas'],
			$_POST['saldo'],
			$_POST['pj'],
			$_POST['ket'],
		    $foto_baru);
echo "
	<script language = 'JavaScript'>
	alert('Data Berhasil Disimpan');
	document.location='data_kas.php';
	</script>
	";
		} else if ($aksi == "update"){
			$db -> Update_kas($_POST['kd_kas'],
			$_POST['nm_kas'],
			$_POST['saldo'],
			$_POST['pj'],
			$_POST['ket']);
echo "
	<script language = 'JavaScript'>
	alert('Data Berhasil Diupdate');
	document.location='data_kas.php';
	</script>
	";
		}  else if ($aksi=="delete") {
			$kd_kas = $_GET['id'];
			$db->delete_kas($kd_kas);
			header('location:data_kas.php');
		}
		
		else {
			echo "Database anda error silahkan kembali lagi <a href = 'data_kas.php?'>Klik Disini</a>";
		}

?>
