<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
      
</head>
<body>
<?php require "tampil.php"?>
    <div class="container mt-3">
    <h1>welcome</h1>
   <table class= "table class='table table-bordered table-striped mt-3">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>E-mail</td>
            <td>Subjek</td>
            <td>Pesan</td>
            <td>Telepon</td>
        </tr>
       
    <?php
        $conn= mysqli_connect("localhost", "root", "", "ulangan");
        global $conn;
        $tabel_tamu=mysqli_query($conn,"SELECT * FROM tabel_tamu ORDER BY nama ASC");
        $no=1;
        while($tampil_tamu= mysqli_fetch_assoc($tabel_tamu)) {
    ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $tampil_tamu['nama']?></td>
            <td><?php echo $tampil_tamu['email']?></td>
            <td><?php echo $tampil_tamu['subjek']?></td>
            <td><?php echo $tampil_tamu['pesan']?></td>
            <td><?php echo $tampil_tamu['telepon']?></td>
    <?php } ?>
        </tr>
    </table>

        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</body>
</html>