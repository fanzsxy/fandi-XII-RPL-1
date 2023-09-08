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

function tambah($data) {

global $koneksi;

$nrp = htmlspecialchars($data["nrp"]);
$nama = htmlspecialchars($data["nama"]);
$email = htmlspecialchars($data["email"]);
$jurusan = htmlspecialchars($data["jurusan"]);
$gambar = htmlspecialchars($data["gambar"]);

$query = "INSERT INTO mahasiswa VALUES
                ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar') ";
        
mysqli_query($koneksi, $query);

return mysqli_affected_rows($koneksi);
}

function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}



?>