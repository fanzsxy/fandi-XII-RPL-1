<?php
//koneksi database
$koneksi = mysqli_connect("localhost","root", "", "phpdasar");

//mengambil data dari tabel mahasiswa
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
if( !$result ){
    echo mysqli_error($koneksi);
}

//ambil data mahasiswa dari objek result
//mysqli_fetch_row() // mengembalikan array numerik
//mysqli_fetch_assoc() // mengembalikan array asosiatif
//mysqli_fetch_array() // mengembalikan keduanya

//while( $mhs = mysqli_fetch_assoc($result)){
 //   var_dump($mhs);
//}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>daftar mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>no</th>
            <th>aksi</th>
            <th>gambar</th>
            <th>nrp</th>
            <th>nama</th>
            <th>email</th>
            <th>jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php while( $row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>
            </td>
            <td><img src="img/<?= $row["gambar"]; ?>" 
            width="50"></li></td>
            <td><?= $row["nrp"]?></td>
            <td><?= $row["nama"]?></td>
            <td><?= $row["email"]?></td>
            <td><?= $row["jurusan"]?></td>
        </tr>
        <?php $i++; ?>
        <?php endwhile;?>

    </table>

    
</body>
</html>