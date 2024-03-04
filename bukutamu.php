<?php
    $conn= mysqli_connect("localhost", "root", "", "ulangan");
    if(isset($_POST['submit'])){
        $nama=mysqli_real_escape_string($conn, $_POST['nama']);
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $subjek=mysqli_real_escape_string($conn, $_POST['subjek']);
        $pesan=mysqli_real_escape_string($conn, $_POST['pesan']);
        $telepon=mysqli_real_escape_string($conn, $_POST['telepon']);
         $submit=mysqli_query($conn, "INSERT INTO `tabel_tamu` (`nama`, `email`, `subjek`, `pesan`, `telepon`) VALUES ('$nama', '$email'
        , '$subjek','$pesan','$telepon')");
        if($submit){
            echo "<script>
            alert('data berhasil ditambahkan!');
            document.location.href='tampilBuku.php';
    </script>";
}
else{
    echo "<script>
    alert('data gagal ditambahkan!');
    document.location.href='tampilBuku.php';
</script>";
}
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body{
           min-height: 100vh;
        }
        p{
            color:aliceblue;
        }
     
        </style>
</head>
<body>
    <?php require "tampil.php"?>

    <div class="container mt-5">
    <h1>ISI BUKU TAMU</h1>
    <p>Isi Buku tamu untuk mengetahui keterangan lebih lanjut</p>

    <form action="" method="post" class="mt-3 mb-4 col-6">
    <input type="text" placeholder="Nama" class="form-control mt-2" name="nama" required>
    <input type="text" placeholder="E-mail" class="form-control mt-2" name="email" required>
    <input type="text" placeholder="subjek" class="form-control mt-2" name="subjek"required>
    <input type="text" placeholder="Pesan" class="form-control mt-2" name="pesan"required>
    <input type="text" placeholder="Telepon" class="form-control mt-2" name="telepon"required>
    <button class="btn btn-primary mt-3" name="submit">Submit</button>
</form>
</div>



</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>