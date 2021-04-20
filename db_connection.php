<?php 

// $servername = "localhost";
// $server_username = "root";
// $dbpassword = "admin12345";

// $servername = "localhost";
// $server_username = "root";
// $dbpassword = "";

$servername = "localhost";
$server_username = "gkoursoumis";
$dbpassword = "gkoursoumis_ele46272";

// setting the connection
$connection = mysqli_connect($servername, $server_username, $dbpassword);

// selecting db 
mysqli_select_db($connection, 'e-auctionshop');

// check the connection
if (!$connection){
    die("Connection failed: ". mysqli_connect_error());
} 

// for greek characters 
mysqli_set_charset($connection, 'utf8');
?>
