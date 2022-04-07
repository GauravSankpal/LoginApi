<?php

require 'connection.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$checkuser = "SELECT * from user where email='$email' and password='$password'";
$result = mysqli_query($con,$checkuser);

if(mysqli_num_rows($result)>0)
{
    $response['message'] = "login successful";
}
else
{
    $response['message'] = "login failed";
}

echo json_encode($response);


?>