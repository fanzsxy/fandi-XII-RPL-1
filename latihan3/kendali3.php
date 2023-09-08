<?php
$mahasiswa = [
    [" arif fandi", "0976554", "rpl", "pandipramono01@gmail.com"],
    ["benny bogeng", "0986555", "rpl1", "polueydhuahdjjjdh@gmail.com"],
    ["diooo", "9875588", "rpl2", "dinoeren@gmail.com"]
];

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

<!-- <ul>
    <li>arif fandi</li>
    <li>8765446</li>
    <li>rpl</li>
    <li>pandipramono01@gmail.com</li>
</ul> -->
    
<!-- <ul>
   <?php foreach( $mahasiswa as $mhs) : ?>
    <li><?= $mhs; ?></li>
    <?php endforeach; ?>
</ul> -->
<?php foreach( $mahasiswa as $mhs) : ?>
<ul>
    <li>nama : <?= $mhs[0] ?></li>
    <li>nrp : <?= $mhs[1] ?></li>
    <li>jurusan : <?= $mhs[2] ?></li>
    <li>email : <?= $mhs[3] ?></li>

</ul>
<?php endforeach; ?>






</body>
</html>