<div class="row" style="margin: 20px;">
<?php 
function Update_data()
{
    $db = new Database();
    $no_ref = $_GET["id"];
    $kas_masuk = $db->tampil_update_kas_masuk($no_ref);
    $data_kas = $db->data_kas();
?>
    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
            Update Kas Masuk</h3>
        <form method="post" action="<?php echo "proses_kas_masuk.php?aksi=update"; ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">No Referensi</label>
                <input type="text" name="no_ref" class="form-control" placeholder="Masukkan Kode Referensi" value="<?= $kas_masuk['no_ref']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Kas Masuk</label>
                <input type="date" name="tgl_masuk" class="form-control" value="<?= $kas_masuk['tgl_masuk']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Kas</label>
                <select name="kd_kas" class="form-control" required>
                    <?php
                    foreach ($data_kas as $row) {
                    ?>
                        <option value="<?php echo $row['kd_kas'] ?>"><?php echo $row['nm_kas'] ?> - Rp<?php echo $row['saldo'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Jumlah masuk</label>
                <input type="number" name="jumlah" min="1" class="form-control" placeholder="Masukkan Jumlah Masuk" value="<?= $kas_masuk['jumlah']; ?>" required>
            </div>

             
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" name="ket_m" class="form-control" placeholder="Masukkan Keterangan" value="<?= $kas_masuk['ket_m']; ?>" required>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="proses" value="Simpan Data">
                <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
            </div>

        </form>

    </div>

<?php 
}
function Tambah_data(){  
$db = new database();
$data_pj= $db->data_pj();
$data_kas= $db->data_kas();
?>
  
  <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
  <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input Kas Masuk</h3>
  <div class="mb-3">
  
  <form method = "POST" action ="<?php echo "proses_kas_masuk.php?aksi=tambah"; ?>">
  <label class="form-label">No referensi</label>
  <input type="text" name="no_ref" class="form-control" placeholder="Masukkan Nomer Referensi">
  </div>

  <div class="mb-3">
  <label class="form-label">Tanggal Masuk Kas</label>
  <input type="date" name ="tgl_masuk" class="form-control">
  </div>

  <div class="mb-3">
                <label for="kd_kas">Nama Kas</label>
                <!-- <select class="form-control" name="kd_kas" id="kd_kas" onchange="changeValue(this)"> -->
                <select class="form-control" name="kd_kas" id="kd_kas" onchange="changeValue(this.value)">
                    <?php

                    $jsArray = "var prdName = new Array();\n";
                    ?>

                    <option selected disabled>-- Pilih Kas -- </option>
                    <?php foreach ($data_kas as $row) : ?>
                        <option value="<?= $row['kd_kas']; ?>"><?= $row['kd_kas'] . " - " . $row['nm_kas'] ?></option>

                        <?php $jsArray .= "prdName['" . $row['kd_kas'] . "'] = {
                            nm_kas: '" . addslashes($row['nm_kas']) . "',
                            saldo: '" . addslashes($row['saldo']) . "'
                        };\n"; ?>

                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nama Kas</label>
                <input type="text" name="nm_kas" id="nm_kas" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Saldo</label>
                <input type="text" name="saldo" id="saldo" class="form-control" readonly>
            </div>
  <div class="mb-3">
  <label class="form-label">Penanggung Jawab</label>
  <select name ="kd_pj" class="form-control">
  <?php 
    foreach($data_pj as $row) {
      ?>
      <option value="<?php echo "$row[kd_pj]"; ?>"><?php echo "$row[nm_pj]"; ?></option>
      <?php } ?>
  </select>
  </div>

  <div class="mb-3">
  <label class="form-label">Jumlah Masuk</label>
  <input type="text" name ="jumlah"class="form-control" placeholder="Masukkan Jumlah Masuk">
  </div>

  <div class="mb-3">
  <label class="form-label">Keterangan</label>
  <textarea class="form-control" name ="ket_m" rows="3" placeholder="Masukkan Keterangan"></textarea>
  </div>

  <div class="mb-3">
  <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
  <input type="reset" class="btn btn-secondary" value="Reset">
  </div>

	</form>
	
  <script>
            <?php echo $jsArray; ?>

            function changeValue(id) {
                document.getElementById('nm_kas').value = prdName[id].nm_kas;
                document.getElementById('saldo').value = prdName[id].saldo;
            }
        </script>
  </div>
  <?php } ?>

  <?php 
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  $edit = $_GET ['edit'];
  if ($edit == "update") {
    Update_Data();
  }else{
    Tambah_data();
  }
  ?>
  
