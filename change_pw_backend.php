<?php  
    require 'uuid_search.php';


if(isset($_POST['password'])){
    $pw = $_POST['password'];
}

if(isset($_POST['inputPasswordOld'])){
    $pw_old = $_POST['inputPasswordOld'];
}


$search_pw = "SELECT * FROM user_info WHERE pw = '$pw_old'";

$result = mysqli_query($connection, $search_pw);
$number_rows = mysqli_num_rows($result);

if ($number_rows == 1) {
    $update_pw="UPDATE user_info
                SET pw='$pw'
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
