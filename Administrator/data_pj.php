<?php 
class dashboard{

  function __construct(){
    include"menu.php";
  }

}
$halaman_utama = new dashboard;

include 'database.php';
$db = new database();
$data_pj = $db->data_pj();
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="aset/fontawesome-free/css/all.min.css">

    <title>Kas Keluarga Besar</title>
  </head>
  <body>
  <?php include "form_pj.php"; ?>

  <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
  <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Data Penanggung Jawab</h3>
   
   <a href = "laporan_pj.php" target="_blank" class="btn btn-success
            mb-2 mt-1">Cetak Data</a>
   
   <Form action = "data_pj.php" method = "POST">
    <div class = "Form-group">
      <input type ="text" name = "cari" class="col-lg-5" style="border: 1px solid
      lightblue;  border-radius:5px; height: 38px; padding: 10px;">
      <button type="submit" value="cari" class ="btn btn-success mb-2 mt-1"> Search Data
</button>
</div>
</form>  
   <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Penanggung Jawab</th>
      <th scope="col">Nama Penanggung Jawab</th>
      <th scope="col">Alamat</th>
      <th scope="col">No HP</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    foreach($data_pj as $row) {
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['kd_pj'] ?></td>
        <td><?php echo $row['nm_pj'] ?></td>
        <td><?php echo $row['alamat'] ?></td>
        <td><?php echo $row['nohp'] ?></td>
        <td><?php echo $row['stts'] ?></td>
        <td align="center" width="150px">
                                    <a class="btn btn-sm btn-warning" href="data_pj.php?&edit=update&&id=<?= $row['kd_pj'] ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="proses_pj.php?aksi=delete&&id=<?= $row['kd_pj'] ?>" onclick="javascript: return confirm('Apakah yakin data dihapus')">Delete</a>
                                </td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
  </div>

  </div>

  </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous">
</script>