<?php
    require 'session_check.php';
    require 'dbcon.php';

    // get the user id from the first table

    $search_id = ("SELECT userID FROM user_info WHERE username = '".$_SESSION['username']."'");

    $result_id = mysqli_query($connection, $search_id);

    $row_id = mysqli_fetch_assoc($result_id);

    $str_id = $row_id['userID'];
    $uuid = (int)$str_id;
    
?>