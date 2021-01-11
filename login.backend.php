<?php 
    require 'session_check.php';
    require 'db_connection.php';    



// trim function deletes whitespaces at the start/end of var

if(isset($_POST['inputUserName'])){
    $username = ($_POST['inputUserName']);
}

if(isset($_POST['inputPassword_login'])){
    $pw = ($_POST['inputPassword_login']);
}



echo $username;  
echo $pw;

// Checking if a username & pw match
$search_username = "SELECT * FROM user_info WHERE username = '$username' && pw = '$pw'";
$result = mysqli_query($connection, $search_username);
$number_rows = mysqli_num_rows($result);
if ($number_rows == 1) {
    // store user's name on the session
    $_SESSION['username'] = $username;   
    echo json_encode(array("statusCode"=>200)); 
    // header("location: index.php");
}else{
    echo json_encode(array("statusCode"=>201));
    // header("location: index.php");
}


?>













 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

