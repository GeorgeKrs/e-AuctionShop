<?php 
    require 'session_check.php';
    require 'db_connection.php';


if (isset($_POST['search_input'])) {
    $search_input = $_POST['search_input'];
}else{
    $search_input = intval(0);
}


?>