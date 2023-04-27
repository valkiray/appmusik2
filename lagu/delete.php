<?php
require_once("functions.php");

$id = $_GET["id"];

if (deleteLagu($id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus!');
            document.location.href = 'index.php';
          </script>";
}
?>