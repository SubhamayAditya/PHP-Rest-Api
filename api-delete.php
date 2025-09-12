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

$id = $data['sid'];
$sql = "delete from students WHERE id='{$id}'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(["message" => "Student record deleted", "status" => true]);
} else {
    echo json_encode(["message" => "No records deleted", "error" => mysqli_error($conn), "status" => false]);
}
