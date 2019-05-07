<?php 
    require_once("headerpage.php");
?>

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Registration Page</li>
</ol>
      <div class="row">
        <div class="col-6">
            <h2>Form Registrasi</h2><br>
            <?php
                if(isset($_GET["pesan"]) && $_GET["pesan"]!=""){
                    echo "<span class='alert alert-success'>".$_GET["pesan"]."</span>";
                }
            ?>
            <br><br>
        <form action="prosesregistrasi.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <div class="form-group">
                <label for="repass">Repassword:</label>
                <input type="password" class="form-control" name="repass">
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="telp">Telp:</label>
                <input type="text" class="form-control" name="telp">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <br><br>
        </div>
      </div>
<?php 
    require_once("footerpage.php");
?>