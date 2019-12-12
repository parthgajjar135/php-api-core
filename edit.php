<?php

require './api-config.php';

$eid= $_GET['eid'];
$show_link = mysqli_query($conn,"select * from tbl_master_data WHERE  id ={$eid}")or die(mysqli_errno($conn));

$row = mysqli_fetch_array($show_link);

if(isset($_post['submit']))
{   $id= $row['id'];
      $username = mysqli_real_escape_string($conn,$_post['name']);
        $useraddress = mysqli_real_escape_string($conn,$_post['add']); 
        $userecity = mysqli_real_escape_string($conn,$_post['city']);
  $update=  mysqli_query($conn, "update tbl_master_data set name='{$username}',add ='{$useraddress}',city='{$userecity}' WHERE id='{$id}'") or die(mysqli_errno($conn));
          
          if($update){
        echo "<script>alert('record update');window.location='index.php';</script>";
    }
}
?>


<html>
    <body>
        <form method="post">
            
            <h2>update of recored of <?php echo $row['name']?></h2><br>
            name: <input type="text" name="name" value="<?php echo $row['name']?>"/><br>
            add : <input type="text" name="name" value="<?php echo $row['add']?>"/><br>
              city: <input type="text" name="name" value="<?php echo $row['city']?>"/><br>
              <input type="submit" name="submit" value="update the data " />
        </form>
    </body>
</html>