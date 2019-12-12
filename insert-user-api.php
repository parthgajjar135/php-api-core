<?php

require './api-config.php';
$response = array();

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['add']) && isset($_POST['city'])) {
  
     $username = mysqli_real_escape_string($conn,$_POST['name']);
        $usergender = mysqli_real_escape_string($conn,$_POST['add']); 
        $usercity = mysqli_real_escape_string($conn,$_POST['city']);
    $useremail = mysqli_real_escape_string($conn, $_POST['email']);
    $userpassword = mysqli_real_escape_string($conn, $_POST['password']);



     $insert_data =  mysqli_query($conn, "insert into tbl_master_data (`name`,`add`,`city`,`email`,`password`) VALUES ('{$username}','{$usergender}','{$usercity}','{$useremail}','{$userpassword}'')") or die(mysqli_errno($conn));
          
     if ($insert_data) {
            $response['flag'] = 1;
            $response['massage'] = "success fully login";
        } else {
            $response['flag'] = 0;
            $response['massage'] = "data was not match";
        }
    }
 else {
    $response['success'] = 0;
    $response['massage'] = "data has been missing";
}
echo json_encode($response);


