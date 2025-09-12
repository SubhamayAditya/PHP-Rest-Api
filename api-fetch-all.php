<?php

header('Content-Type: application/json');
/* application/json , because i want to allow browser that any third party application 
 who can access this api will identify that data will return as json format */

header('Access-Content-Allow-Origin: *');
/* "*" means that any kind of application and browser can access this api. 
Or if i want to add any restriction & add perticular a website then instead of * add that website name  */

include('connection.php');

$sql = "select * from students";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output[] = $row; // push each row into the array
    }
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No records found"]);
}
