<?php

header('Content-Type: application/json'); 
header('Access-Content-Allow-Origin: *');

 include('connection.php');

 $data= json_decode(file_get_contents("php://input"),true);


$student_id=$data['sid'];

 $sql= "select * from students where id= $student_id ";
 $result= mysqli_query($conn,$sql);


if (mysqli_num_rows($result) > 0) {
   
        $output = mysqli_fetch_assoc($result);
    
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No records found"]);
}

