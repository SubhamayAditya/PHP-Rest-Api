<?php

header('Content-Type: application/json'); 
header('Access-Content-Allow-Origin: *');

 include('connection.php');

//  $id=$_GET['id'];  /* in php we use $_GET global variable to read the data  */

 $data= json_decode(file_get_contents("php://input"),true);
/*
Generally in php for read/fetch the data we use $_POST , $_GET . But here in api we dont know from where the request is coming 
it may coming from php, Android, IOS or Desktop Apps. So in that case we use "php://input" , so any raw data either it is json , xml format
it can read.
And json_decode convert the data into an array & in json format.
*/

$studet_id=$data['sid'];

 $sql= "select * from students where id= $studet_id ";
 $result= mysqli_query($conn,$sql);


if (mysqli_num_rows($result) > 0) {
   
        $output = mysqli_fetch_assoc($result);
    
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No records found"]);
}

/* Run in url":

http://localhost/php_work_files/php_rest_api/api-fetch-single.php?id=3

*/
