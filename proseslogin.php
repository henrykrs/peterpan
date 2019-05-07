<?php
session_start();

$username = $_POST["username"];
$password = $_POST["pass"];
$hashpass = md5($password);

include_once("koneksi.php");

try{
    $stmt = $conn->prepare('select username,kunci,aturan from pengguna where username=? and kunci=?');
    $stmt->bind_param("ss", $username, $hashpass);
    $stmt->execute();
    $stmt->bind_result($user, $kunci,$aturan);

    //cek jika ada data pengguna
    while($stmt->fetch()) {
        $isloginsuccess = true;
        $_SESSION["username"] = $user;
        $_SESSION["aturan"] = $aturan;
    }

    if($isloginsuccess==true){
        header("Location: /peterpan/index.php");
    }
    else {
        $pesan = "Username/Password yang anda masukan tidak sesuai...";
        header("Location: /peterpan/loginform.php?pesan=$pesan");
    }
}
catch(Exception $e){
    $error = $e->getMessage();
}
finally{
    $stmt->close();
    $conn->close();
}


?>