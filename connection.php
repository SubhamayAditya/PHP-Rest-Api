<?php
$host='localhost';
$user='root';
$password='';
$db_name='php_rest_api';

$conn=mysqli_connect($host,$user,$password,$db_name);

if(!$conn){
    die(mysqli_connect_error().'connection failed');
}