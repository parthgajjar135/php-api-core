
<?php
require './api-config.php';
$response =  array();


if(isset($_POST['id'])&& !empty($_POST['id']))
{
    $id = $_POST['id'];
    $delete_datas =  mysqli_query($conn,"delete from tbl_master_data WHERE id = '{$id}'") or die(mysqli_error($conn));
    if($delete_datas)
    {    
      $response['success'] = 1;
         $response['massage'] = "recored was deleted";
    }
     else {
 $response['success'] = 0;
   $response['massage'] = "data not use ....";
     }
}
else {
 $response['success'] = 0;
   $response['massage'] = "data has been missing";
        
}

json_encode($response);
//print_r($response);