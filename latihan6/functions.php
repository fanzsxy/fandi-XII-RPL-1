<?php
//koneksi database
$koneksi = mysqli_connect("localhost","root", "", "phpdasar");

//mengambil data dari tabel mahasiswa
//$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
//if( !$result ){
 //   echo mysqli_error($koneksi);
//}

//ambil data mahasiswa dari objek result
//mysqli_fetch_row() // mengembalikan array numerik
//mysqli_fetch_assoc() // mengembalikan array asosiatif
//mysqli_fetch_array() // mengembalikan keduanya

//while( $mhs = mysqli_fetch_assoc($result)){
 //   var_dump($mhs);
//}

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
        $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

?>