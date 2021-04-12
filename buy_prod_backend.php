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


    if ($bid_registry){
        echo json_encode(array("statusCode"=>200));
    }else{
        echo json_encode(array("statusCode"=>201));
    }

    mysqli_query($connection, $bid_registry);

    


?>


