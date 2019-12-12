<?php 

require './api-config.php';
$response =  array();

if(isset($_POST['name'])&& isset($_POST['add'])&& isset($_POST['city']))
{

      $username = mysqli_real_escape_string($conn,$_POST['name']);
        $usergender = mysqli_real_escape_string($conn,$_POST['add']); 
        $useremail = mysqli_real_escape_string($conn,$_POST['city']);
         
          
          $insert_data =  mysqli_query($conn, "insert into tbl_master_data (`name`,`add`,`city`) VALUES ('{$username}','{$usergender}','{$useremail}')") or die(mysqli_errno($conn));
          
          
        if($insert_data)
        {
            $response['success'] = 1;
             $response['massage'] = "data has been inserted";
        }
        else {
     $response['success'] = 0;
             $response['massage'] = "data has been not inserted";
        }
        
}
else
{ 
    $response['success'] = 0;
   $response['massage'] = "data has been missing";
    
}
echo json_encode($response);


