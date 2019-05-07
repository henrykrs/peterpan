<?php 
    require_once("headerpage.php");
?>

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Home Page</li>
</ol>
      <div class="row">
        <div class="col-12">
          <h1>Welcome to Smart Finance</h1>

          <?php 
          
          if(isset($_SESSION["username"])) { 
            echo "Selamat datang user ".$_SESSION["username"];
          }else {
            echo "Selamat datang anonymous, silahkan mendaftar untuk menjadi anggota";
          }

          ?>
        </div>
      </div>

<?php 
    require_once("footerpage.php");
?>