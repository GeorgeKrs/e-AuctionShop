<?php 
require 'uuid_search.php';

if (isset($_POST['id'])){
    $id=$_POST['id'];
}

if (isset($_POST['winner_bid_id'])){
    $winner_bid_id=$_POST['winner_bid_id'];
}else{
    echo "No winner bid";
}


$sql_query_update = "UPDATE products_table SET winner_bid_id = '$winner_bid_id', auction_status='expired' WHERE id='$id'";
$response = mysqli_query($connection, $sql_query_update);

?>