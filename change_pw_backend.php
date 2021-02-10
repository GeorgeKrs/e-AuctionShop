<?php  
    require 'uuid_search.php';

if(isset($_POST['pw1'])){
    $pw1 = $_POST['pw1'];
}

if(isset($_POST['pw_old'])){
    $pw_old = $_POST['pw_old'];
}

$search_pw = "SELECT * FROM user_info WHERE pw = '$pw_old' AND uuid='$uuid'";

$result = mysqli_query($connection, $search_pw);
$number_rows = mysqli_num_rows($result);

if ($number_rows == 1) {
    $update_pw="UPDATE user_info
                SET pw='$pw1'
                WHERE uuid='$uuid'";

    if (mysqli_query($connection, $update_pw)) {
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
