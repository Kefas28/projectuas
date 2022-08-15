<div class="row" style="margin: 20px;">
<?php 
function Update_pj(){
  
  $db = new database();
  $kd_pj = $_GET['id'];
  $pj = $db -> tampil_update_pj($kd_pj);
  
?>

<div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
  <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Update Penanggung Jawab</h3>
  <div class="mb-3">
  
  <form method = "POST" action ="<?php echo "proses_pj.php?aksi=update"; ?>" enctype="multipart/form-data">
  <label class="form-label">Kode Penanggung Jawab</label>
  <input type="text" name="kd_pj" class="form-control" value="<?php echo $pj['kd_pj'] ?>" readonly>
  </div>

  <div class="mb-3">
  <label class="form-label">Nama Penanggung Jawab</label>
  <input type="text" name ="nm_pj" class="form-control" value="<?php echo $pj['nm_pj'] ?>">
  </div>

  <div class="mb-3">
  <label class="form-label">Alamat</label>
  <input type="text" name ="alamat"class="form-control" value="<?php echo $pj['alamat'] ?>">
  </div>

  <div class="mb-3">
  <label class="form-label">No HP</label>
  <input type="text" name ="nohp" class="form-control" value="<?php echo $pj['nohp'] ?>">
  </div>

  <div class="mb-3">
  <label class="form-label">Status</label>
  <input type="text" name ="stts" class="form-control" value="<?php echo $pj['stts'] ?>">
  </div>

  <div class="mb-3">
  <input type="submit" name="simpan" class="btn btn-primary" value="Update Distributor">
  <a href="data_pj.php" class="btn btn-secondary">Cancel</a>
  </div>

	</form>
  </div>

<?php 
}
function Tambah_data(){

?>
  
  <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
  <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input Penanggung Jawab</h3>
  <div class="mb-3">
  
  <form method = "POST" action ="<?php echo "proses_pj.php?aksi=tambah"; ?>" enctype="multipart/form-data">
  <label class="form-label">Kode Penanggung Jawab</label>
  <input type="text" name="kd_pj" class="form-control" placeholder="Masukkan Kode Penanggung Jawab">
  </div>

  <div class="mb-3">
  <label class="form-label">Nama Penanggung Jawab</label>
  <input type="text" name ="nm_pj" class="form-control" placeholder="Masukkan Nama Penanggung Jawab">
  </div>

  <div class="mb-3">
  <label class="form-label">Alamat</label>
  <input type="text" name ="alamat"class="form-control" placeholder="Masukkan Alamat">
  </div>

  <div class="mb-3">
  <label class="form-label">No HP</label>
  <input type="text" name ="nohp" class="form-control" placeholder="Masukkan No HP">
  </div>

  <div class="mb-3">
  <label class="form-label">Status</label>
  <input type="text" name ="stts" class="form-control" placeholder="Masukkan Status">
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
    Update_pj();
  }else{
    Tambah_data();
  }
  ?>