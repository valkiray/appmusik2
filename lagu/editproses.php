<?php  
$conn = mysqli_connect("localhost", "root", "", "appmusik");

function editLagu($id_lagu, $judul_lagu, $artis, $album, $lagu, $nama_file_lama){
  global $conn;

  // jika file baru diupload
  if($lagu["name"] !== ""){
      // cek apakah file yang diupload adalah lagu
      $file_type = $lagu["type"];
      if($file_type != "audio/mpeg" && $file_type != "audio/mp3"){
          echo "<script>
                  alert('File yang diupload bukan file lagu!');
                  window.location.href='index.php';
              </script>";
          return false;
      }
  
      // cek ukuran file, maksimal 50 MB
      $file_size = $lagu["size"];
      if($file_size > 50000000){
          echo "<script>
                  alert('Ukuran file terlalu besar, maksimal 50 MB!');
                  window.location.href='index.php';
              </script>";
          return false;
      }

      // generate nama file baru
      $nama_file_baru = uniqid();
      $nama_file_baru = pathinfo($lagu["name"], PATHINFO_FILENAME);
      $ekstensi_file = pathinfo($lagu["name"],PATHINFO_EXTENSION);
      
        $nama_file_baru = $nama_file_baru . '.' . $ekstensi_file;

  // hapus file lama
  unlink("lagu/" . $nama_file_lama);
  

  // upload file baru
  move_uploaded_file($lagu["tmp_name"], "lagu/" . $nama_file_baru);

  // update data lagu di database
  $query = "UPDATE lagu SET judul_lagu = '$judul_lagu', artis = '$artis', album = '$album', nama_file = '$nama_file_baru' WHERE id_lagu = $id_lagu";
  } else {
// update data lagu di database tanpa mengubah file lagu
$query = "UPDATE lagu SET judul_lagu = '$judul_lagu', artis = '$artis', album = '$album' WHERE id_lagu = $id_lagu";
}

mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}
?>