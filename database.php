<?php 

   //---------------------------------------- KONEKSI ---------------------------------------------
class database {

	var $host 	= "localhost";
	var $user 	= "root"; #Karena default
	var $pass 	= "";
	var $db 	= "kas";
	var $koneksi= "";

	function __construct () {
			$this->koneksi = mysqli_connect ($this->host, $this->user, 
			$this->pass, $this->db);
	}	
	
    //---------------------------------------- DATA BARANG ---------------------------------------------

	function input_kas ($kd_kas, $nm_kas, $saldo, 
	$pj, $ket, $foto_baru) {
		mysqli_query ($this->koneksi, "INSERT INTO tbl_kas values ('$kd_kas','$nm_kas', '$saldo', 
		 '$pj', '$ket', '$foto_baru')");
		
	}
	
	function data_kas() {
		if(isset($_POST['cari'])) {
			$cari= $_POST['cari'];
			$data_kas = mysqli_query($this->koneksi, "SELECT tbl_kas.*,
			tbl_pj.* FROM tbl_kas JOIN tbl_pj ON 
			tbl_kas.pj = tbl_pj.kd_pj WHERE
			tbl_kas.kd_kas LIKE '%".$cari."%' OR tbl_kas.nm_kas LIKE '%".$cari."%'");
		while ($row = mysqli_fetch_array($data_kas)) {
			$hasil_kas[] = $row;
		}
		return $hasil_kas;
		}
		else {
			$data_kas = mysqli_query($this->koneksi, "SELECT tbl_kas.*,
			tbl_pj.* FROM tbl_kas JOIN tbl_pj ON
			tbl_kas.pj = tbl_pj.kd_pj");
		while ($row = mysqli_fetch_array($data_kas)) {
			$hasil_kas[] = $row;
		}
		return $hasil_kas;
		}
	}
	
	

	

    //------------------------------------------------------SEARCH DATA----------------------------------------// 


	function tampil_update_kas($kd_kas) {
		$query = mysqli_query($this -> koneksi, "Select * from tbl_kas where kd_kas = '$kd_kas' ");
		return $query -> fetch_array();
	}

	
	function Update_kas($kd_kas, $nm_kas, $saldo, $pj, $ket) {
		$query = mysqli_query($this -> koneksi, "Update tbl_kas set nm_kas='$nm_kas' 
		, saldo='$saldo', pj='$pj', ket='$ket' where kd_kas= '$kd_kas' ");
	}


	function delete_kas($kd_kas){
		$dok = mysqli_query($this->koneksi, "SELECT * FROM tbl_kas WHERE kd_kas = '$kd_kas' ");
		$data_file = $dok -> fetch_array();
		unlink('Dokumen/'.$data_file['foto']);

		$query = mysqli_query($this->koneksi, "DELETE FROM tbl_kas WHERE kd_kas= '$kd_kas' ");
	}

	//---------------------------------------- DISTRIBUTOR ---------------------------------------------

	function input_pj ($kd_pj, $nm_pj, $alamat, $nohp, 
	$stts) {
		mysqli_query ($this->koneksi, "INSERT INTO tbl_pj VALUES ('$kd_pj','$nm_pj', 
		'$alamat', '$nohp', '$stts')");
		
	}

	
	
	function data_pj() {
		if(isset($_POST['cari'])) {
			$cari= $_POST['cari'];
			$data_pj = mysqli_query($this->koneksi,"SELECT * FROM tbl_pj WHERE
			tbl_pj.kd_pj LIKE '%".$cari."%' OR tbl_pj.nm_pj LIKE '%".$cari."%'");
		while ($row = mysqli_fetch_array($data_pj)) {
			$hasil_pj[] = $row;
		}
		return $hasil_pj;
		}
		else {
		$data_pj = mysqli_query($this->koneksi,"SELECT * FROM tbl_pj");
		while($row = mysqli_fetch_array($data_pj)){
			$hasil_pj[] = $row;
		}
		return $hasil_pj;
	}
	}

	function tampil_update_pj($kd_pj) {
		$query = mysqli_query($this -> koneksi, "SELECT * FROM 
		tbl_pj WHERE kd_pj = '$kd_pj' ");
		return $query -> fetch_array();
	}

	function Update_pj($kd_pj, $nm_pj, $alamat, $nohp, $stts) {
		$query = mysqli_query($this -> koneksi, "UPDATE tbl_pj SET nm_pj='$nm_pj', 
		alamat='$alamat', nohp='$nohp', stts='$stts' WHERE kd_pj= '$kd_pj' ");
	}

	function delete_pj($kd_pj){
		$dok = mysqli_query($this->koneksi, "SELECT * FROM tbl_pj WHERE kd_pj = '$kd_pj' ");
		$data_file = $dok -> fetch_array();
		unlink('Dokumen/'.$data_file['foto']);

		$query = mysqli_query($this->koneksi, "DELETE FROM tbl_pj where kd_pj = '$kd_pj' ");
	}

	//---------------------------------------- BARANG MASUK ---------------------------------------------
	function data_kas_masuk() {
		if(isset($_POST['dari']) && isset($_POST['sampai'])) {
			$dari = $_POST['dari'];
			$sampai = $_POST['sampai'];
		$data_kas_masuk = mysqli_query($this->koneksi, "SELECT kas_masuk.*, tbl_kas.*, tbl_pj.* FROM kas_masuk JOIN 
			tbl_kas ON kas_masuk.kd_kas = tbl_kas.kd_kas JOIN tbl_pj ON kas_masuk.kd_pj = tbl_pj.kd_pj WHERE
			kas_masuk.tgl_masuk between '$dari' AND '$sampai'");
		while ($row = mysqli_fetch_array($data_kas_masuk)) {
			$hasil_kas_masuk[] = $row;
		}
		return $hasil_kas_masuk;
	}
		else if(isset($_POST['cari'])) {
			$cari= $_POST['cari'];
			$data_kas_masuk = mysqli_query($this->koneksi, 
			"SELECT kas_masuk.*, tbl_kas.*, tbl_kas.* 
			FROM kas_masuk JOIN tbl_kas 
			ON kas_masuk.kd_kas = tbl_kas.kd_kas 
			JOIN tbl_pj ON kas_masuk.kd_pj = tbl_pj.kd_pj 
			WHERE kas_masuk.no_ref 
			LIKE '%".$cari."%' OR kas_masuk.no_ref LIKE '%".$cari."%'");
		while ($row = mysqli_fetch_array($data_kas_masuk)) {
			$hasil_kas_masuk[] = $row;
		}
		return $hasil_kas_masuk;
		}
		else {
			$data_kas_masuk = mysqli_query($this->koneksi, "SELECT kas_masuk.*, tbl_kas.*, tbl_pj.* FROM kas_masuk JOIN 
			tbl_kas ON kas_masuk.kd_kas = tbl_kas.kd_kas JOIN tbl_pj ON kas_masuk.kd_pj = tbl_pj.kd_pj");
		while ($row = mysqli_fetch_array($data_kas_masuk)) {
			$hasil_kas_masuk[] = $row;
		}
		return $hasil_kas_masuk;
		}
	}

	function input_kas_masuk($no_ref, $kd_kas, $kd_pj, $jumlah, $tgl_masuk, 
	$ket_m, $sisa_saldo)
    {
		$query = mysqli_query($this->koneksi, " Update tbl_kas set saldo='$sisa_saldo' where kd_kas='$kd_kas'");
        return mysqli_query($this->koneksi, "INSERT INTO kas_masuk values ('$no_ref','$kd_kas', '$kd_pj', 
		'$jumlah', '$tgl_masuk', '$ket_m')");
		
    }
	
	function delete_kas_masuk($no_ref)
    {
        return mysqli_query($this->koneksi, "delete from kas_masuk where no_ref = '$no_ref'");
    }

    public function tampil_update_kas_masuk($no_ref)
    {
		$query = mysqli_query($this->koneksi, " Update tbl_kas set saldo='$sisa_saldo' where kd_kas='$kd_kas'");
        $query = mysqli_query($this->koneksi, "SELECT * FROM kas_masuk JOIN tbl_kas ON kas_masuk.kd_kas = tbl_kas.kd_kas WHERE no_ref = '$no_ref' ");

        return mysqli_fetch_assoc($query);
    }

    public function update_kas_masuk($no_ref, $kd_kas, $kd_pj, $jumlah, $tgl_masuk, 
	$ket_m, $sisa_saldo)
    {
		$query = mysqli_query($this->koneksi, " Update tbl_kas set saldo='$sisa_saldo' where kd_kas='$kd_kas'");
        return mysqli_query($this->koneksi, "UPDATE kas_masuk SET kd_kas='$kd_kas', tgl_masuk='$tgl_masuk', jumlah='$jumlah', ket_m='$ket_m' WHERE no_ref='$no_ref'");
    }


	//---------------------------------------- DATA BARANG KELUAR ---------------------------------------------
    function data_kas_keluar() {
		if(isset($_POST['dari']) && isset($_POST['sampai'])) {
			$dari = $_POST['dari'];
			$sampai = $_POST['sampai'];
		$data_kas_keluar = mysqli_query($this->koneksi, "SELECT * FROM kas_keluar JOIN tbl_kas ON kas_keluar.kd_kas = tbl_kas.kd_kas WHERE kas_keluar.tgl_keluar between '$dari' AND '$sampai'");
		while ($row = mysqli_fetch_array($data_kas_keluar)) {
			$hasil_kas_keluar[] = $row;
		}
		return $hasil_kas_keluar;
		}
		else if(isset($_POST['cari'])) {
			$cari= $_POST['cari'];
			$data_kas_keluar = mysqli_query($this->koneksi, "SELECT * FROM kas_keluar JOIN tbl_kas ON kas_keluar.kd_kas = tbl_kas.kd_kas WHERE kas_keluar.no_ref LIKE '%".$cari."%' OR kas_keluar.no_ref LIKE '%".$cari."%'");
		while ($row = mysqli_fetch_array($data_kas_keluar)) {
			$hasil_kas_keluar[] = $row;
		}
		return $hasil_kas_keluar;
		}
		else {
			$data_kas_keluar = mysqli_query($this->koneksi, "SELECT * FROM kas_keluar JOIN tbl_kas ON kas_keluar.kd_kas = tbl_kas.kd_kas");
		while ($row = mysqli_fetch_array($data_kas_keluar)) {
			$hasil_kas_keluar[] = $row;
		}
		return $hasil_kas_keluar;
		}
	}
	

    function input_kas_keluar($no_ref, $kd_kas, $tgl_keluar, $jumlah, $ket_k, $sisa_saldo)
    {
		$query = mysqli_query($this->koneksi, " Update tbl_kas set saldo='$sisa_saldo' where kd_kas='$kd_kas'");
        return mysqli_query($this->koneksi, "INSERT INTO kas_keluar values ('$no_ref', '$kd_kas', '$tgl_keluar', '$jumlah',  '$ket_k')");
    }

    function delete_kas_keluar($no_ref)
    {
        return mysqli_query($this->koneksi, "delete from kas_keluar where no_ref = '$no_ref'");
    }

    public function tampil_update_kas_keluar($no_ref)
    {
		$query = mysqli_query($this->koneksi, " Update tbl_kas set saldo='$sisa_saldo' where kd_kas='$kd_kas'");
		$query = mysqli_query($this->koneksi, "SELECT * FROM kas_keluar JOIN tbl_kas ON kas_keluar.kd_kas = tbl_kas.kd_kas WHERE no_ref = '$no_ref' ");
		return mysqli_fetch_assoc($query);
    }

    public function update_kas_keluar($no_ref, $kd_kas, $tgl_keluar, $jumlah,  $ket_k, $sisa_saldo)
    {
		$query = mysqli_query($this->koneksi, " Update tbl_kas set saldo='$sisa_saldo' where kd_kas='$kd_kas'");
        return mysqli_query($this->koneksi, "UPDATE kas_keluar SET kd_kas='$kd_kas', tgl_keluar='$tgl_keluar', jumlah='$jumlah', ket_k='$ket_k' WHERE no_ref='$no_ref'");
    }

	//---------------------------------------- LOGIN ---------------------------------------------

	function login_user ($username, $password) {
		$data = mysqli_query ($this->koneksi, "SELECT * FROM tbl_user WHERE username = '$username'
		AND password= '$password'");
		$row = mysqli_num_rows($data);

		if($row > 0) {
			$login = mysqli_fetch_assoc($data);
			if ($login['status']=="Administrator"){
				SESSION_START();
				$_SESSION['namauser'] = $login['username'];
				$_SESSION['passuser'] = $login['password'];
				$_SESSION['nmuser'] = $login['nm_user'];
				$_SESSION['statuser'] = $login['status'];

				echo "<script language ='JavaScript'>
				confirm ('Selamat Datang, " . $login['nm_user'] . "!');
				document.location = 'Administrator/index.php';
				</script>";
			}
			if ($login['status']=="Bendahara"){
				SESSION_START();
				$_SESSION['namabendahara'] = $login['username'];
				$_SESSION['passbendahara'] = $login['password'];
				$_SESSION['nmbendahara'] = $login['nm_user'];
				$_SESSION['statusbendahara'] = $login['status'];

				echo "<script language ='JavaScript'>
				confirm ('Selamat Datang, " . $login['nm_user'] . "!');
				document.location = 'Bendahara/index.php';
				</script>";
			}
		}
		else {
			echo "<script language ='JavaScript'>
				document.location = 'login.php?pesan=gagal';
				</script>";
		}
	}
	//---------------------------------------- LAPORAN ---------------------------------------------
	function laporan_kas_masuk() {
		if(isset($_GET['awal']) && isset($_GET['akhir'])) {
			$awal = $_GET['awal'];
			$akhir = $_GET['akhir'];
		$laporan_kas_masuk = mysqli_query($this->koneksi, "SELECT kas_masuk.*, tbl_kas.*, tbl_pj.* FROM kas_masuk JOIN 
			tbl_kas ON kas_masuk.kd_kas = tbl_kas.kd_kas JOIN tbl_pj ON kas_masuk.kd_pj = tbl_pj.kd_pj WHERE
			kas_masuk.tgl_masuk between '$awal' AND '$akhir'");
		while ($row = mysqli_fetch_array($laporan_kas_masuk)) {
			$hasil_laporan_kas_masuk[] = $row;
		}
		return $hasil_laporan_kas_masuk;
	}
		
		else {
			$laporan_kas_masuk = mysqli_query($this->koneksi, "SELECT kas_masuk.*, tbl_kas.*, tbl_pj.* FROM kas_masuk JOIN 
			tbl_kas ON kas_masuk.kd_kas = tbl_kas.kd_kas JOIN tbl_pj ON kas_masuk.kd_pj = tbl_pj.kd_pj");
		while ($row = mysqli_fetch_array($laporan_kas_masuk)) {
			$hasil_laporan_kas_masuk[] = $row;
		}
		return $hasil_laporan_kas_masuk;
		}
	}

	function laporan_kas_keluar() {
		if(isset($_GET['awal']) && isset($_GET['akhir'])) {
			$awal = $_GET['awal'];
			$akhir = $_GET['akhir'];
			$laporan_kas_keluar = mysqli_query($this->koneksi, "SELECT * FROM kas_keluar JOIN tbl_kas ON kas_keluar.kd_kas = tbl_kas.kd_kas
			WHERE kas_keluar.tgl_keluar between '$awal' AND '$akhir'");
		while ($row = mysqli_fetch_array($laporan_kas_keluar)) {
			$hasil_laporan_kas_keluar[] = $row;
			}
			return $hasil_laporan_kas_keluar;
			}
			else {
				$laporan_kas_keluar = mysqli_query($this->koneksi, "SELECT * FROM kas_keluar JOIN tbl_kas ON kas_keluar.kd_kas = tbl_kas.kd_kas");
			while ($row = mysqli_fetch_array($laporan_kas_keluar)) {
				$hasil_laporan_kas_keluar[] = $row;
			}
			return $hasil_laporan_kas_keluar;
			}
		}
}
	?>