<!DOCTYPE html>

<?php 
include 'functions.php';

if (isset($_GET['editLagu'])) {
    $id_lagu = $_GET['editLagu'];
    $query = "SELECT * FROM lagu WHERE id_lagu = '$id_lagu';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $judul_lagu = $result['judul_lagu'];
    $artis = $result['artis'];
    $album = $result['album'];
    $nama_file = $result['nama_file'];
}
 ?>

<html>
<head>
    <title>Edit Data Lagu</title>
</head>
<body>
    <h1>Edit Data Lagu</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_lagu" value="<?= $id_lagu; ?>">
        <input type="hidden" name="nama_file_lama" value="<?= $nama_file; ?>">

        <label for="judul_lagu">Judul Lagu:</label><br>
        <input type="text" name="judul_lagu" id="judul_lagu" value="<?= $judul_lagu; ?>"><br>

        <label for="artis">Artis:</label><br>
        <input type="text" name="artis" id="artis" value="<?= $artis; ?>"><br>

        <label for="album">Album:</label><br>
        <input type="text" name="album" id="album" value="<?= $album; ?>"><br>

        <label for="lagu">File Lagu:</label><br>
        <audio controls>
            <source src="lagu/<?= $nama_file; ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <br>
        <input type="file" name="lagu" id="lagu"><br>

        <button type="submit" name="submit">Simpan</button>
    </form>

</body>
</html>
