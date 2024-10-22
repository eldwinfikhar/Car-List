<?php
// koneksi ke database
$conn = mysqli_connect("localhost","root", "", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $name = htmlspecialchars($data["NAME"]);
    $brand = htmlspecialchars($data["brand"]);
    $engine = htmlspecialchars($data["ENGINE"]);
    $price = htmlspecialchars($data["price"]);

    // upload gambar
    $pic = upload();
    if (!$pic) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO mobil
                VALUES
                (NULL, '$name', '$brand', '$engine', '$price', '$pic')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    
    $fileName = $_FILES['pic']['name'];
    $fileSize = $_FILES['pic']['size'];
    $error = $_FILES['pic']['error'];
    $tempName = $_FILES['pic']['tmp_name'];

    // cek apakah tidak ada gambar yang di-upload
    if($error === 4) {
        echo "<script>
                alert('choose a picture first!');
              </script>";
        return false;
    }

    // cek apakah yang di-upload adalah gambar
    $validPicExtension = ['jpg', 'jpeg', 'png'];
    $picExtension = explode('.', $fileName);
    $picExtension = strtolower(end($picExtension));
    if(!in_array($picExtension, $validPicExtension)) {
        echo "<script>
                alert('what you uploaded is not a picture!');
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if($fileSize > 1000000) {
        echo "<script>
                alert('picture size is too big!');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap di-upload
    // generate nama gambar baru
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $picExtension;

    move_uploaded_file($tempName, 'gambar/' . $newFileName);

    return $newFileName;

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mobil WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $name = htmlspecialchars($data["NAME"]);
    $brand = htmlspecialchars($data["brand"]);
    $engine = htmlspecialchars($data["ENGINE"]);
    $price = htmlspecialchars($data["price"]);
    $oldPic = htmlspecialchars($data["oldPic"]);

    // cek apakah user pilih gambar baru atau tidak
    if($_FILES['pic']['error'] === 4) {
        $pic = $oldPic;
    } else {
        $pic = upload();
    }
    // $pic = htmlspecialchars($data["pic"]);

    // query update data
    $query = "UPDATE mobil SET
                NAME = '$name',
                brand = '$brand',
                ENGINE = '$engine',
                price = '$price',
                pic = '$pic'
              WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM mobil
                WHERE
                NAME LIKE '%$keyword%' OR
                brand LIKE '%$keyword%' OR
                price LIKE '%$keyword%' OR
                ENGINE LIKE '%$keyword%'
            ";
    return query($query);
}

?>