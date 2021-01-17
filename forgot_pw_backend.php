<?php 
    require 'session_check.php';
    require 'db_connection.php';    
    require 'uuid_search.php';


if(isset($_POST['email'])){
    $email = $_POST['email'];
}


$search_email = "SELECT * FROM user_info WHERE email = '$email'";
$result = mysqli_query($connection, $search_email);
$number_rows = mysqli_num_rows($result);

if ($number_rows == 1) {
    // generate a new a password (16charslong) and send it to their email
    $newPassword = bin2hex(openssl_random_pseudo_bytes(8));

    $update_pw="UPDATE user_info
                SET pw='$newPassword'
                WHERE uuid='$uuid'";

    if (mysqli_query($connection, $update_pw)) {

        $to        =$email;
        $subject   ='Password reset for e-AuctionShop:';
        $message   ="Your new password is: $newPassword";
        $headers   ='From: e-AuctionShop@gmail.com' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=utf-8';

        mail($to, $subject, $message, $headers);
        // success
        echo json_encode(array("statusCode"=>200));
    }else{
        // failed to change although old pw correct
        echo json_encode(array("statusCode"=>201));          
    }
    
}else{
    // failed old_pw = false
    echo json_encode(array("statusCode"=>202));   
} 
?>

