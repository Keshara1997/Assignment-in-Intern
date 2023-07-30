<?php
//Create connection
$con = mysqli_connect("localhost","root","","assignment1");//Connecting

//Checking connection to the database
if(!$con){
    die('Connection Failed'.mysqli_connect_error());
}


?>