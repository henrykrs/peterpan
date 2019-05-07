<?php
require_once("koneksi.php");
require_once("headerpage.php");
?>
<style>
    li {
    float: left;
    list-style: outside none none;
    padding-left: 5px; }
</style>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Daftar Pengguna</li>
</ol>
<div class="row">
    <div class="col-md-12">
        <?php 
            $limit = 2;  
            if (isset($_GET["page"])) { 
                $page  = $_GET["page"]; 
            } else { 
                $page=1; 
            };
            
            $start_from = ($page-1) * $limit;  
            $sql = "SELECT username,nama,email,telp,aturan FROM pengguna ORDER BY nama ASC LIMIT ?,?";  
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $start_from, $limit);
            $stmt->execute();
            $stmt->bind_result($username,$nama,$email,$telp,$aturan);
        ?>
        
        <table class="table table-bordered table-striped">
            <tr>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telp</th>
                <th>Aturan</th>
            </tr>
            <?php while($stmt->fetch()) { ?>
                <tr>
                    <td><?php echo $username ?></td>
                    <td><?php echo $nama ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $telp ?></td>
                    <td><?php echo $aturan ?></td>
                </tr>
            <?php } ?>
        </table>

        <?php 
            $stmt->close();
            
            $sqlpaging = "SELECT COUNT(username) FROM pengguna";  
            $result = $conn->query($sqlpaging);
            $row = $result->fetch_row();  
            $total_records = $row[0];  
            $total_pages = ceil($total_records / $limit);  
            $pagLink = "<ul class='pagination pagination-sm'>";  
            for ($i=1; $i<=$total_pages; $i++) {  
                         $pagLink .= "<li><a href='penggunawithpaging.php?page=".$i."'>".$i."</a></li>";  
            };  
            echo $pagLink . "</ul>";  

            $conn->close();
        ?>
    </div>
</div>

<?php 
require_once("footerpage.php");
?>