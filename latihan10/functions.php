<?php 
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    
// upload gambar
$gambar = upload();
if( !$gambar ) {
    return false;
}

    $query = "INSERT INTO mahasiswa
                    VALUES
             ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
             ";
mysqli_query($koneksi, $query);

return mysqli_affected_rows($koneksi);
}

function upload(){

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ){
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
    echo "<script>
                alert('yang anda upload bukan gambar!');
              </script>";
        return false;
}

// cek jika ukurannya terlalu besar
if( $ukuranFile > 1000000 ) {
    echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
}

// lolos pengecekan gambar siap diupload
// generate nama gambar baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar; 


move_uploaded_file($tmpName, 'img/' . $namaFile);

return $namaFile;

}

function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}





function ubah($data) {
    global $koneksi;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
   
    

    

    $query = "UPDATE mahasiswa SET
               nama = '$nama',
               nrp = '$nrp',
               email = '$email',
               jurusan = '$jurusan',
               gambar = '$gambar'
            WHERE id = $id
          ";

mysqli_query($koneksi, $query);

return mysqli_affected_rows($koneksi);

}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
                ";
    return query($query);
}


?>