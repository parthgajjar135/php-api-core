<?php

require './api-config.php';
$response = array();

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['add']) && isset($_POST['city'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $usergender = mysqli_real_escape_string($conn, $_POST['add']);
    $useremail = mysqli_real_escape_string($conn, $_POST['city']);


    $insert_data = mysqli_query($conn, "select * from tbl_master_data WHERE id={$id}") or die(mysqli_errno($conn));
    $stud_data = mysqli_fetch_array($insert_data);


    if ($stud_data > 0) {
        $update_data = mysqli_query($conn, "update tbl_master_data SET `name`='{$username}',`add`='{$usergender}',"
                . "  `city`='{$useremail}' WHERE id='{$id}'") or die(mysqli_errno($conn));

        if ($update_data) {
            $response['flag'] = 1;
            $response['massage'] = "data has been update";
        } else {
            $response['flag'] = 0;
            $response['massage'] = "data has been not update";
        }
    }
} else {
    $response['success'] = 0;
    $response['massage'] = "data has been missing";
}
echo json_encode($response);


