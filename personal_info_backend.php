<?php    
    require 'uuid_search.php';



if(isset($_POST['email'])){
    $email = $_POST['email'];
}

if(isset($_POST['full_name'])){
    $full_name = $_POST['full_name'];
}

if(isset($_POST['address_numb'])){
    $address_numb = $_POST['address_numb'];
}


if(isset($_POST['city'])){
    $city = $_POST['city'];
}

if(isset($_POST['district'])){
    $district = $_POST['district'];
}

if(isset($_POST['tk'])){
    $TK = $_POST['tk'];
}


$update_info =  "UPDATE user_info
                 SET email='$email', full_name='$full_name', address_numb='$address_numb', city= '$city', district='$district', TK='$TK' 
                 WHERE uuid='$uuid'";


if (mysqli_query($connection, $update_info)) {
    // success
    echo json_encode(array("statusCode"=>200));    
}else{
    // failed
    echo json_encode(array("statusCode"=>201));    
}
?>

