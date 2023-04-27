<?php
require 'functions.php';
//ambil data lagu
$lagu = query ("SELECT * FROM lagu");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagu</title>
</head>
<body>
    <a href="upload.php">Upload Lagu</a>
<table border="1" class="table">
            <tr>
                <th>no</th>
                <th>id lagu</th>
                <th>judul lagu</th>
                <th>artis</th>
                <th>album</th>
                <th>durasi</th>
                <th>size</th>
                <th>file lagu</th>
                <th>Opsi</th>       
            </tr>
           <?php foreach($lagu as $i => $row): ?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $row["id_lagu"];?></td>
        <td><?= $row["judul_lagu"];?></td>
        <td><?= $row["artis"];?></td>
        <td><?= $row["album"];?></td>
        <td> <?php
            require_once('getid3/getid3.php');
            $getID3 = new getID3;
            $file = "lagu/" . $row["lagu"];
            $fileInfo = $getID3->analyze($file);
            echo $fileInfo["playtime_string"];
            ?></td>
        <td><?= round(filesize($file) / (1024 * 1024), 2) . ' MB'; ?></td>
        <td>
            <?php
            $path = "lagu/";
            $files = scandir($path);
            foreach($files as $file){
                if(strpos($file, $row["lagu"]) !== false){
                    echo $file;
                }
            }
            ?>
        </td>
        <td>
            <a href="edit.php?id_lagu=<?= $row["id_lagu"]; ?>">Edit</a>
            <a href="delete.php?id_lagu=<?= $row["id_lagu"] ?>" onclick="return confirm('Yakin ingin menghapus lagu ini?')">Hapus</a>
        </td>
    </tr>
<?php endforeach; ?>

</body>
</html>