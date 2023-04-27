<?php
require 'functions.php';

if(isset($_POST["submit"])){
  $judul_lagu = $_POST["judul_lagu"];
  $artis = $_POST["artis"];
  $album = $_POST["album"];
  $lagu = $_FILES["lagu"];

  if(uploadLagu($judul_lagu, $artis, $album, $lagu) > 0){
    echo "<script>
          alert('Lagu berhasil diupload!');
          document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
          alert('Lagu gagal diupload!');
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Upload Lagu</title>
</head>
<body>
  <h1>Upload Lagu</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="judul_lagu">Judul Lagu:</label><br>
    <input type="text" name="judul_lagu" id="judul_lagu" required><br><br>
    <label for="artis">Artis:</label><br>
    <input type="text" name="artis" id="artis" required><br><br>
    <label for="album">Album:</label><br>
    <input type="text" name="album" id="album" required><br><br>
    <label for="lagu">File Lagu:</label><br>
    <input type="file" name="lagu" id="lagu" required><br><br>
    <button type="submit" name="submit">Upload</button>
  </form>
</body>
</html>
