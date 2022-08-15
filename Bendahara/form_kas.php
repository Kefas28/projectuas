<div class="row" style="margin: 20px;">
<?php 
function Update_kas(){
  
  $db = new database();
  $kd_kas = $_GET['id'];
  $kas = $db -> tampil_update_kas($kd_kas);
  $data_pj= $db->data_pj();
?>

<div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
  <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Update Kas</h3>
  <div class="mb-3">
  
  <form method = "POST" action ="<?php echo "proses_kas.php?aksi=update"; ?>" enctype="multipart/form-data">
  <label class="form-label">Kode Kas</label>
  <input type="text" name="kd_kas" class="form-control" value="<?php echo $kas['kd_kas'] ?>" readonly>
  </div>

  <div class="mb-3">
  <label class="form-label">Nama Kas</label>
  <input type="text" name ="nm_kas" class="form-control" value="<?php echo $kas['nm_kas'] ?>">
  </div>

  <div class="mb-3">
  <label class="form-label">Saldo</label>
  <input type="text" name ="saldo" class="form-control" value="<?php echo $kas['saldo'] ?>">
  </div>

  <div class="mb-3">
  <label class="form-label">Penanggung Jawab</label>
  <select name ="pj" class="form-control">
    <option value="<?php echo $kas['pj'] ?>"><?php echo $kas['pj'] ?></option>
  <?php 
    foreach($data_pj as $row) {
      ?>
      <option value="<?php echo "$row[nm_pj]"; ?>"><?php echo "$row[nm_pj]"; ?></option>
      <?php } ?>
  </select>
  </div>

  <div class="mb-3">
  <label class="form-label">Keterangan</label>
  <textarea class="form-control" name ="ket" rows="3" placeholder="Masukkan Keterangan Kas"><?php echo $kas['ket'] ?></textarea>
  </div>

  <div class="mb-3">
  <input type="submit" name="simpan" class="btn btn-primary" value="Update Data">
  <a href="data_kas.php" class="btn btn-secondary">Cancel</a>
  </div>

	</form>
  </div>

<?php 
}
function Tambah_data(){  
$db = new database();
$data_pj= $db->data_pj();
?>
  
  <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
  <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input Kas</h3>
  <div class="mb-3">
  
  <form method = "POST" action ="<?php echo "proses_kas.php?aksi=tambah"; ?>" enctype="multipart/form-data">
  <label class="form-label">Kode Kas</label>
  <input type="text" name="kd_kas" class="form-control" placeholder="Masukkan Kode Kas">
  </div>

  <div class="mb-3">
  <label class="form-label">Nama Kas</label>
  <input type="text" name ="nm_kas" class="form-control" placeholder="Masukkan Nama Kas">
  </div>

  <div class="mb-3">
  <label class="form-label">Saldo</label>
  <input type="text" name ="saldo" class="form-control" placeholder="Masukkan Saldo">
  </div>

  <div class="mb-3">
  <label class="form-label">Penanggung Jawab</label>
  <select class="form-control" name="pj" id="pj">
                    <option selected disabled>-- Pilih -- </option>
                    <?php foreach ($data_pj as $row) :; ?>
                        <option value="<?= $row['kd_pj']; ?>" <?= $row['kd_pj'] == $kas['pj'] ? "selected" : ""; ?>><?= $row['nm_pj']; ?></option>
                    <?php endforeach;; ?>
  </select>
  </div>

  <div class="mb-3">
  <label class="form-label">Keterangan Kas</label>
  <textarea class="form-control" name ="ket" rows="3" placeholder="Masukkan Keterangan Kas"></textarea>
  </div>

  <div class="mb-3">
  <label class="form-label">Upload Bukti</label>
  <input type="file" name ="foto" class="form-control">
  </div>

  <div class="mb-3">
  <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
  <input type="reset" class="btn btn-secondary" value="Reset">
  </div>

	</form>
  </div>
  <?php } ?>

  <?php 
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  $edit = $_GET ['edit'];
  if ($edit == "update") {
    Update_kas();
  }else{
    Tambah_data();
  }
  ?>