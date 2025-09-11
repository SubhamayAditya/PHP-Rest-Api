<?php

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

/* this header is use to allow the used headers in the project.
Authorization= To access any authorized person or app to use this api,
X-Requested-With= is used to identify if an incoming HTTP request was made by an XMLHttpRequest (AJAX request)
*/

include('connection.php');

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$age  = $data['sage'];
$city = $data['scity'];

$sql = "INSERT INTO students (student_name, age, city) VALUES ('{$name}', '{$age}', '{$city}')";
$result = mysqli_query($conn, $sql);

if ($result) {     
    echo json_encode(["message" => "Student record inserted", "status" => true]);
} else {
    echo json_encode(["message" => "No records inserted", "error" => mysqli_error($conn), "status" => false]);
}
