<?php 

require './api-config.php';
$response =  array();

 $show_data =  mysqli_query($conn,"select * from tbl_master_data") or die(mysqli_errno($conn));

$counter = mysqli_fetch_row($show_data);


if($counter > 0)
{
    while ($row = mysqli_fetch_array($show_data))
    {
        $data['name'] = $row['name'];
        $data['add'] = $row['add'];
        $data['city'] = $row['city'];
        $fetch_data[] = $data; 
    }
    $response['student'] = $fetch_data;
    $response['success'] = 1;
}
 else {
 $response['success'] = 0;
   $response['massage'] = "data has been missing";
        
}
echo "<pre>";
print_r($response);