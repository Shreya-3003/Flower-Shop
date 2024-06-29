<?php 
session_start();

$username=$_POST["username"];
$password=$_POST["password"];


$con=mysqli_connect("localhost","root","","flower_shop");

$sql="SELECT * FROM users where username='$username' and password='$password'";

$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
    header("Location:index.html");
    $_SESSION["username"]=$username;
    $_SESSION["password"]=$password;
}
else{
    header("Location:error.html");
}

?>