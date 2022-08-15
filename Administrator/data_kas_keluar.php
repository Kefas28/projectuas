<?php
class dashboard
{

    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;

include "database.php";
$db = new Database();
$data_kas_keluar = $db->data_kas_keluar();

// var_dump($data_kas_keluar);

$data_kas = $db->data_kas();

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- name CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="aset/fontawesome-free/css/all.min.css">

    <title>Kas Keluarga Besar</title>
</head>


<body>

    <div class="row" style="margin: 20px;">
        <?php
        include("form_kas_keluar.php");
        ?>
        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">
                Data Kas Keluar</h3>

<form action ="data_kas_keluar.php" method="POST">
  <div class ="mb-3">
    <input type ="date" name="dari" class="col-lg-3" style="border: 1px solid
      lightblue;  border-radius:5px; height: 38px; padding: 10px;"> s/d 
    <input type ="date" name="sampai" class="col-lg-3" style="border: 1px solid
      lightblue;  border-radius:5px; height: 38px; padding: 10px;" >
    <button type="submit" name="cari" class="btn btn-primary mb-2 mt-1">Cari Data</button>
  </div></form>				
<?php 
  if(isset($_POST['cari'])) {
    $dari = $_POST['dari'];
    $sampai = $_POST ['sampai'];
    echo "<label>Data Barang Keluar Periode Tanggal Dari : 
    <b>$dari</b> Sampai Dengan Tanggal <b>$sampai</b></label> <hr>
    
    <a href = 'laporan_kas_keluar.php?awal=$dari&&akhir=$sampai' 
    target='_blank' class='btn btn-success
    mb-2 mt-1'>Cetak Data</a>" ;
  }  
  else {
    echo "<a href = 'laporan_kas_keluar.php' 
    target='_blank' class='btn btn-success
    mb-2 mt-1'>Cetak Data</a>";
  }
  ?>


    <form action = "data_kas_keluar.php" method = "POST">
    <div class = "Form-group">
      <input type ="text" name = "cari" class="col-lg-5" style="border: 1px solid
      lightblue;  border-radius:5px; height: 38px; padding: 10px;">
      <button type="submit" value="cari" class ="btn btn-success mb-2 mt-1"> Search Data
</button>
</div>
</form>  
            <div class="table-responsive mt-2">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>No Ref</th>
                            <th width="150px">Tanggal Keluar</th>
                            <th>Nama Barang</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_kas_keluar as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row['no_ref'] ?></td>
                                <td><?php echo $row['tgl_keluar'] ?></td>
                                <td><?php echo $row['nm_kas'] ?></td>
                                <td><?php echo $row['ket_k'] ?></td>
                                <td><?php echo $row['jumlah'] ?> </td>
                                <td align="center" width="150px">
                                    <a class="btn btn-sm btn-warning" href="data_kas_keluar.php?edit=update&&id=<?= $row['no_ref'] ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="proses_kas_keluar.php?aksi=delete&&id=<?= $row['no_ref'] ?>" onclick="return confirm('Apakah yakin data dihapus')">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>