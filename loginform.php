<?php 
    require_once("headerpage.php");
?>

<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Login Form</li>
</ol>
      <div class="row">
        <div class="col-6">
            <h2>Login Form</h2><br>
        <form action="proseslogin.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form><br>
        <?php
                if(isset($_GET["pesan"]) && $_GET["pesan"]!=""){
                    echo "<span class='alert alert-danger'>".$_GET["pesan"]."</span>";
                }
            ?>
        </div>
      </div>


<?php 
    require_once("footerpage.php");
?>