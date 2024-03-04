<?php 
    require "config.php";

    $id = isset($_GET['q']) ? $_GET['q'] : null;

    $query = mysqli_query($link, "SELECT * FROM tabel_notes WHERE id='$id'");
    $data = mysqli_fetch_array($query);
?> 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            height: 100vh;
          
        }
        .container-fluid{
          display: flex; 
          justify-content: center;
          align-items: center;
        }
        form {
           
            background: rgba(0,0,0,0.5);
            padding: 20px; 
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: left;
            margin-bottom: 90px;
            margin-top: 90px;

        }
        p{
            text-align: center;
            font-weight: bold;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 14px;
        }
        .cc{
          margin-top:15px;
     
        }
        button{
            background-color: #D8D9DA;
            color: #000;
            padding: 10px;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            
        }
        .save{
          border-radius: 10px;
        }
        .add{
          border-radius: 10px;
        }
        .clear{
          border-radius: 10px;
        }
        .view{
            font-size: 14px;
            color: #000;
            background-color:  #D8D9DA;;
            padding:9px;
            padding-top: 13.5px;
            padding-bottom: 12px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 10px;
        }
      
        button:hover,
        .view:hover{
            transform: scale(1.2);
            background-color: #6420AA;
            color:antiquewhite;
        }



    </style>
</head>
<body> 
    
    <?php include "tampil.php";?>
    <div class="container-fluid">
    <form action="" method="post">
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" required>
        <br>
        <label for="catatan">Catatan:</label>
        <textarea id="catatan" name="catatan" rows="4" required></textarea>
        <br>
        <label for="kategori">Kategori:</label> 
        <select id="kategori" name="kategori" required>
            <option value="horor">Horor</option>
            <option value="romance">Romance</option>
            <option value="komedi">Komedi</option>
        </select>
        <br>
        <div class="cc">
          <button type="submit" name="tambah" class="add">Add</button>
          <button type="submit" name="simpan" class="save">Save</button>
          <a href="tampilan.php" class="view">View</a>
          <button type="submit" name="hapus" class="clear">Clear</button>
        </div>
    </form>

    <?php
        if(isset($_POST['tambah'])){
            $judul = htmlspecialchars($_POST['judul']);
            $catatan = htmlspecialchars($_POST['catatan']);
            $kategori = htmlspecialchars($_POST['kategori']);
    
            $queryExist = mysqli_query($link, "SELECT judul FROM tabel_notes WHERE judul='$judul'");
            $jumlahDatakategoriBaru = mysqli_num_rows($queryExist);
              
            if($jumlahDatakategoriBaru > 0){
        ?>
            <p>
              Judul sudah ada
            </p>
        <?php
            }
            else{
              $querySimpan = mysqli_query($link, "INSERT INTO `tabel_notes` (`judul`, `catatan`, `kategori`) VALUES ('$judul', '$catatan', '$kategori')");
              if($querySimpan){
        ?>
              <p>
                Data Berhasil Ter simpan
              </p>
    
              <meta http-equiv="refresh" content="2 url=view.php" />
        <?php
              }
              else{
                echo mysqli_error($link);
              }
            }
          }
    ?>
    <?php 
      if(isset($_POST['simpan'])){
        $judul = htmlspecialchars($_POST['judul']);
        $catatan = htmlspecialchars($_POST['catatan']);
        $kategori = htmlspecialchars($_POST['kategori']);

        if($data['judul']==$judul){
    ?>
        <meta http-equiv="refresh" content="2; url=view.php" />
    <?php
        }
        else{
          $query = mysqli_query($link, "SELECT * FROM tabel_notes WHERE judul='$judul'");
          $jumlahData = mysqli_num_rows($query);

          if($jumlahData > 0){
    ?>
          <p>
            Data sudah ada
          </p>
    <?php
          }
          else{
            $querySimpan = mysqli_query($link, "UPDATE tabel_notes SET judul='$judul', catatan='$catatan', kategori='$kategori' WHERE id='$id'");

            if($querySimpan){
    ?>
            <p>
              Data Berhasil Diupdate
            </p>

            <meta http-equiv="refresh" content="2; url=view.php" />
    <?php
            }
            else{
              echo mysqli_error($link);
            }
          }
        }
      } 
      if(isset($_POST['hapus'])){
        $_POST['judul'] = '';
        $_POST['catatan'] = '';
        $_POST['kategori'] = '';
      }
    ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</body>
</html>