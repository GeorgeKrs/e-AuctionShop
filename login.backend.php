<?php 
    require 'session_check.php';
    require 'db_connection.php';    



// trim function deletes whitespaces at the start/end of var

if(isset($_POST['inputUserName'])){
    $username = trim($_POST['inputUserName']);
}

if(isset($_POST['inputPassword_login'])){
    $password = trim($_POST['inputPassword_login']);
}


// Checking if a username & pw match
$search_username = "SELECT * FROM user_info WHERE username = '$username' && pw = '$pw'";
$result = mysqli_query($connection, $search_username);
$number_rows = mysqli_num_rows($result);
if ($number_rows == 1) {
    
    // store user's name on the session
    $_SESSION['username'] = $username; 

    $alert_message = "Success.";
    echo "<script type='text/javascript'>alert('$alert_message');</script>";
}else{
    $alert_message2 = "Username and/or password incorrect.";
    echo "<script type='text/javascript'>alert('$alert_message2');</script>";  
}






?>