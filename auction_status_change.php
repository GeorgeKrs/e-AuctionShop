<?php 
require 'uuid_search.php';

if (isset($_POST['id'])){
    $id=$_POST['id'];
}

if (isset($_POST['auction_Type'])){
    $auction_Type=$_POST['auction_Type'];
}

if ($auction_Type==true){
    if (isset($_POST['winner_bid_id'])){
        $winner_bid_id=$_POST['winner_bid_id'];
    }else{
        $winner_bid_id = intval(0);
    }
    $sql_query_update = "UPDATE products_table SET winner_bid_id = '$winner_bid_id', auction_status='expired' WHERE id='$id'";
    $response = mysqli_query($connection, $sql_query_update);
}


?>