<?php

require 'connection.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$checkuser = "SELECT * from user where email='$email'";
$checkquery = mysqli_query($con,$checkuser);

if(mysqli_num_rows($checkquery)>0 )
{
    $response['message'] = "User already exist"; 
}
else
{
    $insertquery = "INSERT INTO user(username,email,password) VALUES('$username','$email','$password')"; 
$result = mysqli_query($con,$insertquery);

if($result)
{
    $response['message'] = "registered successfully";
}
else
{
    $response['message'] = "registration failed";
}

}

echo json_encode($response);


?>