<?php

require './api-config.php';
$response = array();

if (isset($_POST['username']) && isset($_POST['password'])) {
  
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userpassword = mysqli_real_escape_string($conn, $_POST['password']);



    $insert_data = mysqli_query($conn, "select * from tbl_master_data WHERE email='{username}' && password ='{$userpassword}' " ) or die(mysqli_errno($conn));
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


