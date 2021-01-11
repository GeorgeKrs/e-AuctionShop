<?php 
    require 'session_check.php';
    require 'db_connection.php';    



if(isset($_POST['inputUsername'])){
    $username = $_POST['inputUsername'];
}

if(isset($_POST['inputEmail'])){
    $email = $_POST['inputEmail'];
}

if(isset($_POST['inputPassword'])){
    $pw = $_POST['inputPassword'];
}

if(isset($_POST['inputName'])){
    $full_name = $_POST['inputName'];
}

if(isset($_POST['inputAddress'])){
    $address_numb = $_POST['inputAddress'];
}

if(isset($_POST['inputPhoneNumber'])){
    $phone = $_POST['inputPhoneNumber'];
}

if(isset($_POST['inputCity'])){
    $city = $_POST['inputCity'];
}

if(isset($_POST['inputNomo'])){
    $district = $_POST['inputNomo'];
}

if(isset($_POST['inputΤΚ'])){
    $TK = $_POST['inputΤΚ'];
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
    header('location: email_name_taken.php');;
}else{
    // store user's name on the session
    $_SESSION['username'] = $username;
    // else make the registration
    $registration = "INSERT INTO 
    user_info (username, email, pw, full_name, address_numb, phone, city, district, TK, registration_date) 
    VALUES
        ('$username', '$email', '$pw', '$full_name', '$address_numb', '$phone', '$city', '$district', '$TK', '$registration_date')";
    mysqli_query($connection, $registration);

    // head to the mainmenu of the App but logged in
    header('location: index.php');
}

?>




