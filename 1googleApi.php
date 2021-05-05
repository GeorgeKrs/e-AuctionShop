<?php 
    require 'session_check.php';
    require 'db_connection.php';    

// trim function deletes whitespaces at the start/end of var

if(isset($_POST['username_api'])){
    $username_api = ($_POST['username_api']);
}


// Checking if a username & pw match
$search_city = "SELECT city FROM user_info WHERE username = '$username_api'";
$result_city = mysqli_query($connection, $search_city);
$number_rows = mysqli_num_rows($result_city);

if ($number_rows == 1) {
    while($row=mysqli_fetch_assoc($result_city)) {

        $city_google_api = "$row[city]";       
    }

    echo json_encode(array("statusCode"=>200, "city_google_api"=>$city_google_api)); 

}else{
    echo json_encode(array("statusCode"=>201));
}
?>