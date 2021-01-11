<?php 
    require 'session_check.php';
    require 'db_connection.php';    

// trim function deletes whitespaces at the start/end of var

if(isset($_POST['username'])){
    $username = ($_POST['username']);
}

if(isset($_POST['password'])){
    $pw = ($_POST['password']);
}


// Checking if a username & pw match
$search_username = "SELECT * FROM user_info WHERE username = '$username' && pw = '$pw'";
$result = mysqli_query($connection, $search_username);
$number_rows = mysqli_num_rows($result);
if ($number_rows == 1) {
    // store user's name on the session
    $_SESSION['username'] = $username;   
    echo json_encode(array("statusCode"=>200)); 
}else{
    echo json_encode(array("statusCode"=>201));
}
?>