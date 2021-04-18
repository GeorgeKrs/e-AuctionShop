<?php  
    require 'uuid_search.php';


    if (isset($_POST['bid_price'])){
        $bid_price=$_POST['bid_price'];
    }

    if (isset($_POST['bid_id'])){
        $bid_id=$_POST['bid_id'];
    }

    if (isset($_POST['product_id'])){
        $product_id=$_POST['product_id'];
    }

    date_default_timezone_set("Europe/Athens");
    $bid_timestamp = date("d-m-Y");
    $bid_timestamp .= " | ";
    $bid_timestamp .= date("H:i:s");



    $bid_registry ="INSERT INTO bids_table 
                    (product_id, uuid, bid_price, bid_timestamp)     
                    VALUES 
                    ('$product_id', '$bid_id', '$bid_price', '$bid_timestamp')";


    mysqli_query($connection, $bid_registry);
    


        
    $sql_query_buy_update = "UPDATE products_table SET winner_bid_id = '$bid_id', auction_status='expired', auction_ended='$bid_timestamp' WHERE prod_number='$product_id'";

    $response = mysqli_query($connection, $sql_query_buy_update);

    if ($response){
        echo json_encode(array("statusCode"=>300));
    }else{
        echo json_encode(array("statusCode"=>301));
    }


?>


