<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "db_ulangan"; 

  $link = new mysqli($servername, $username, $password, $database);

  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }
?>