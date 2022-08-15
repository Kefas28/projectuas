<?php
include 'database.php';
$db = new Database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {

    //ambil data barang berdasarkan kode barang
    $data_kas = $db->tampil_update_kas($_POST['kd_kas']);

    //mencari sisa stok
    $sisa_saldo = $_POST['saldo'] + $_POST['jumlah'];

    $add = $db->input_kas_masuk(
        $_POST['no_ref'],
        $_POST['kd_kas'],
        $_POST['kd_pj'],
        $_POST['jumlah'],
        $_POST['tgl_masuk'],
        $_POST['ket_m'],
        $sisa_saldo
    );

    if ($add) {
        echo "
        <script language = 'JavaScript'>
        alert('Data Berhasil Disimpan');
        document.location='data_kas_masuk.php';
        </script>
        ";
    } else {
        echo "
        <script language = 'JavaScript'>
        alert('Data Gagal Disimpan');
        document.location='data_kas_masuk.php';
        </script>
        ";
    }
} else if ($aksi == "update") {
    //ambil data barang berdasarkan kode barang
    $data_kas = $db->tampil_update_kas($_POST['kd_kas']);

    //mencari sisa stok
    $sisa_saldo = $data_kas['stok'] + $_POST['jumlah'];

    $upd = $db->update_kas_masuk(
        $_POST['no_ref'],
        $_POST['kd_kas'],
        $_POST['kd_pj'],
        $_POST['jumlah'],
        $_POST['tgl_masuk'],
        $_POST['ket_m'],
        $sisa_saldo
    );

    if ($upd) {
        echo "
        <script language = 'JavaScript'>
        alert('Data Berhasil Diperbarui');
        document.location='data_kas_masuk.php';
        </script>
        ";
    } else {
        echo "
        <script language = 'JavaScript'>
        alert('Data Gagal Diperbarui');
        document.location='data_kas_masuk.php';
        </script>
        ";
    }
} else if ($aksi == "delete") {
    $no_ref =  $_GET['id'];
    $del = $db->delete_kas_masuk($no_ref);

    if ($del) {
        echo "
        <script language = 'JavaScript'>
        alert('Data Berhasil Dihapus');
        document.location='data_kas_masuk.php';
        </script>
        ";
    } else {
        echo "
        <script language = 'JavaScript'>
        alert('Data Gagal Dihapus');
        document.location='data_kas_masuk.php';
        </script>
        ";
    }
} else {
    echo "Database anda error silahkan kembali lagi <a href = 'data_kas_masuk.php?'>Klik Disini</a>";
}