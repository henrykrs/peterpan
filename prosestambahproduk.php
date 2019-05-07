<?php

require_once("koneksi.php");

$NamaProduk = $_POST["NamaProduk"];
$Deskripsi = $_POST["Deskripsi"];
$Jumlah = $_POST["Jumlah"];
$HargaBeli = $_POST["HargaBeli"];
$HargaJual = $_POST["HargaJual"];

$target_dir = "images/";
$namafile = uniqid().basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $namafile;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $stmt = $conn->prepare("INSERT INTO Produk(namaProduk,deskripsi,jumlah,hargaBeli,hargaJual,gambar) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssiiis", $NamaProduk,$Deskripsi,$Jumlah,$HargaBeli,$HargaJual,$namafile);
    try{
        $stmt->execute();
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $pesan = "Produk $NamaProduk berhasil ditambahkan.";
        header("Location: /peterpan/tampilproduk.php?pesan=$pesan");
    }catch(Exception $e){
        $pesan = "Proses tambah Produk gagal, kesalahan:".$e->getMessage();
        header("Location: /peterpan/tambahproduk.php?pesan=$pesan");
    }finally {
        $stmt->close();
        $conn->close();
    }
}

?>