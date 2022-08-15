<?php
include'database.php';
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "login"){
    $db->login_user($_POST['username'], $_POST['password']);
}
else if ($aksi == "logout"){
    session_start();
    $_SESSION['namauser'] = '';
    unset($_SESSION['namauser']);
    SESSION_UNSET();
    SESSION_DESTROY();
    echo "<script language = 'JavaScript'>alert('Anda Berhasil Keluar');
    document.location='index.php';
    </script>";
}
else {
    echo "Database Anda Error Silahkan Kembali Lagi <a href ='index.php'>Klik Disini</a>";
}







?>