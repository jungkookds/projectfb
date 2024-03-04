<?php
require_once "config.php";
$link = mysqli_connect($servername, $username, $password, $database);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include "tampil.php" ?>
   <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
</head>
<body>
      
  <div class="container-fluid">
    <form action="" method="post" class="float-start mt-3 mb-4">
      <label for="cari">Cari Judul:</label>
      <input type="text" id="cari" name="cari">
      <button type="submit" name="cari_submit" class="btn btn-primary">Cari</button>
      <button type="submit" name="reset" class="btn btn-danger">Reset</button>
    </form>
 
  <?php
    $cari = isset($_POST['cari']) ? $_POST['cari'] : '';
    $sql = "SELECT * FROM tabel_notes";
    if (!empty($cari)) {
      $sql .= " WHERE judul LIKE '%$cari%'";
    }
    if ($result = mysqli_query($link, $sql)) {
      if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
        echo "<tr>"; 
        echo "<th>No</th>";
        echo "<th>Judul</th>";
        echo "<th>Catatan</th>";
        echo "<th>Kategori</th>";
        echo "<th>Pengaturan</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['judul'] . "</td>";
          echo "<td>" . $row['catatan'] . "</td>";
          echo "<td>" . $row['kategori'] . "</td>";
          echo "<td>";
          echo "<a href='index.php?q=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><i class='bi bi-pencil-square'></i></a>";
          echo "<a href='?hapus={$row['id']}' title='Delete Record'><i class='bi bi-trash3-fill'></i></a>";
          echo "</td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        
        mysqli_free_result($result);
      }
      else {
        echo "<p class='lead mt-5 p-5'><em>No records were found.</em></p>";
      }
      if(isset($_GET['hapus'])){
        mysqli_query($link, "DELETE FROM tabel_notes where id='$_GET[hapus]'") or die (mysqli_error($link));

        echo "<p><b> Data berhasil dihapus</b></p>";
        echo "<meta http-equiv=refresh content=2;URL='view.php'>";
      }
      if(isset($_POST['cari_submit'])){
        $cari = $_POST['cari'];
        $sql = "SELECT * FROM tabel_notes WHERE judul LIKE '%$cari%'";
      }
      else{
        $sql = "SELECT * FROM tabel_notes";
      }
      if(isset($_POST['reset'])) {
        $_POST['cari'] = '';
      }
    }
    else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    mysqli_close($link);
  ?>
   
  </div>
  <footer class="footer container-fluid">&copy;dscrt</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>