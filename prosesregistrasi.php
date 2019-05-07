<?php 
$username = $_POST["username"];
$pass = $_POST["pass"];
$repass = $_POST["repass"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$telp = $_POST["telp"];
$aturan = "member";

include_once("koneksi.php");

if($pass==$repass)
    $passenkrip = md5($pass);

try{
    $stmt = $conn->prepare("INSERT INTO pengguna (username,kunci,nama,email,telp,aturan) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $username,$passenkrip,$nama,$email,$telp,$aturan);
    $stmt->execute();
    $pesan = "Proses registrasi berhasil, silahkan login untuk masuk ke sistem";
    header("Location:/peterpan/registrasi.php?pesan=$pesan");
}catch(Exception $e){
    echo "Error :".$e->getMessage();
}
finally{
    $stmt->close();
    $conn->close();
}

?>