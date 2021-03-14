<?php 
require 'uuid_search.php';

if (isset($_POST['id'])){
    $id=$_POST['id'];
}

$sql_query_update = "UPDATE products_table SET auction_status='expired' WHERE id='$id'";
$response = mysqli_query($connection, $sql_query_update);

?>