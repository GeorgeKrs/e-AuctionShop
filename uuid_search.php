<?php
    require 'session_check.php';
    require 'db_connection.php';

    // get the user id from the first table

    $search_id = ("SELECT uuid FROM user_info WHERE username = '".$_SESSION['username']."'");

    $result_id = mysqli_query($connection, $search_id);

    $row_id = mysqli_fetch_assoc($result_id);

    $str_id = $row_id['uuid'];
    $uuid = (int)$str_id;
    
?>