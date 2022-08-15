<?php
function update_data()
{
    $db = new Database();
    $no_ref = $_GET["id"];
    $kas_keluar = $db->tampil_update_kas_keluar($no_ref);
    $data_kas = $db->data_kas();
?>
    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
            Update Kas Keluar</h3>
        <form method="post" action="<?php echo "proses_kas_keluar.php?aksi=update"; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">No Referensi</label>
                <input type="text" name="no_ref" class="form-control" placeholder="Masukkan Kode Barang" value="<?= $kas_keluar['no_ref']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Kas Keluar</label>
                <input type="date" name="tgl_keluar" class="form-control"  value="<?= $kas_keluar['tgl_keluar']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Kas</label>
                <select name="kd_kas" class="form-control" required>
                    <?php
                    foreach ($data_kas as $row) {
                    ?>
                        <option value="<?php echo $row['kd_kas'] ?>"><?php echo $row['nm_kas'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Jumlah Keluar</label>
                <input type="number" name="jumlah" min="1" class="form-control" placeholder="Masukkan Jumlah Keluar" value="<?= $kas_keluar['jumlah']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" name="ket_k" class="form-control" placeholder="Masukkan keterangan" value="<?= $kas_keluar['ket_k']; ?>" required>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="proses" value="Simpan Data">
                <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
            </div>

        </form>

    </div>

<?php } ?>
<?php
function tambah_data()
{
    $db = new Database();
    $data_kas = $db->data_kas();
?>

    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input
            Kas Keluar</h3>
        <form method="post" action="<?php echo "proses_kas_keluar.php?aksi=tambah"; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">No Referensi</label>
                <input type="text" name="no_ref" class="form-control" placeholder="Masukkan No referensi">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Kas Keluar</label>
                <input type="date" name="tgl_keluar" class="form-control"  required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Kas</label>
                <select name="kd_kas" class="form-control" required>
                    <?php
                    foreach ($data_kas as $row) {
                    ?>
                        <option value="<?php echo $row['kd_kas'] ?>"><?php echo $row['nm_kas'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Jumlah Keluar</label>
                <input type="number" name="jumlah" min="1" class="form-control" placeholder="Masukkan Jumlah Keluar" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" name="ket_k" class="form-control" placeholder="Masukkan keterangan" required>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="proses" value="Simpan Data">
                <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
            </div>

        </form>

    </div>

<?php } ?>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$edit = $_GET['edit'];
if ($edit == "update") {
    update_data();
} else {
    tambah_data();
}
?>