<?php
//variabel scope / lingkup variabel
$mahasiswa = [
    [
    "nama" => "fandi",
    "nrp" => "90765545",
    "email" => "fandipramono@gmail",
    "jurusan" => "teknik infomatika",
    "gambar" => "foto1.png"
    ],
    [
        "nama" => "burhan",
        "nrp" => "90654445",
        "email" => "burhanudin@gmail",
        "jurusan" => "teknik toko",
        "gambar" => "foto2.png"
        ]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1>Daftar mahasiswa</h1>
    <ul> 
        <?php foreach( $mahasiswa as $mhs ) : ?>
        <li>
            <a href="kendali2.php?nama=<?= $mhs["nama"]; ?>&nrp=<?= $mhs["nrp"]; ?>&email=<?= $mhs["email"] ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>    
</body>
</html>