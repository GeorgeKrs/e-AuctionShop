<?php 
    require 'session_check.php';
    require 'db_connection.php';    



if(isset($_POST['username'])){
    $username = $_POST['username'];
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
}

if(isset($_POST['pw'])){
    $pw = $_POST['pw'];
}

if(isset($_POST['full_name'])){
    $full_name = $_POST['full_name'];
}

if(isset($_POST['address_numb'])){
    $address_numb = $_POST['address_numb'];
}

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
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


$registration_date = date("d/m/Y");



// // make all personal info strings UpperCase (fullname,address_numb,city,district) 
// // ***PROBLEM WHEN USE UPPERCASE***
// $full_name = strtoupper($full_name);
// $address_numb = strtoupper($address_numb);
// $city = strtoupper($city);
// $district = strtoupper($district);


// echo "$username\n" ;
// echo "$email\n" ;
// echo "$pw\n" ;
// echo "$full_name\n" ;
// echo "$address_numb\n" ;
// echo "$phone\n" ;
// echo "$city\n" ;
// echo "$district\n" ;
// echo "$TK\n" ;
// echo "$registration_date\n" ;


// find if username/email are already on table
$search_username = "SELECT * FROM user_info WHERE username = '$username' 
OR email = '$email'";
$result = mysqli_query($connection, $search_username);
$number_rows = mysqli_num_rows($result);
if ($number_rows == 1) {
    // already exists
    echo json_encode(array("statusCode"=>201));
}else{
    // succesful registration

    // store user's name on the session
    $_SESSION['username'] = $username;   
    
    // else make the registration
    $registration = "INSERT INTO 
    user_info (username, email, pw, full_name, address_numb, phone, city, district, TK, registration_date) 
    VALUES
        ('$username', '$email', '$pw', '$full_name', '$address_numb', '$phone', '$city', '$district', '$TK', '$registration_date')";
    mysqli_query($connection, $registration);
    echo json_encode(array("statusCode"=>200));
}
?>




