<?php  
    require 'uuid_search.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <title>e-AuctionShop</title>

    <!-- bootstrap and css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="style.css" type="text/css" rel="stylesheet">
   
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">



</head>
<body>

<?php 
    echo '
    <div class="text-center" id="siteName" style="background-color: #000; color: #0275d8; padding:12px; display: none;">
        <h3 style="font-family:Big Shoulders Display, cursive;">e-AuctionShop.gr</h3>
    </div>
    ';
    require 'header_loggedin.php';
?>

<div class="container generalContainer roundedForms mt-4">  

    <ul class="breadcrumb">
        <li><a href="index.php" class="category-links">Αρχική Σελίδα</a></li>
        <li><a href="user_settings.php" class="category-links">Ρυθμίσεις Χρήστη</a></li>
        <li style="font-size: 18px;"><b>Ιστορικό αγορών μου</b></li>
    </ul>
</div>



<div class="container generalContainer roundedForms mt-4">  
    <div class="row">
        <?php

        $sql_query_auctions = "SELECT * FROM products_table WHERE winner_bid_id='$uuid' AND auction_status='expired'";
        $result_auctions = mysqli_query($connection, $sql_query_auctions);

        if (mysqli_num_rows($result_auctions) > 0) {
            while($row=mysqli_fetch_assoc($result_auctions)) {

                $image = "$row[primary_image_url]";
                $title = "$row[title]";
                $price = "$row[price]";
                $id = "$row[id]";
                $auction_ended = "$row[auction_ended]";
                $auction_type = "$row[auction_type]";

                echo '
                <div class="mt-4 mb-4 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
                    <div class="card product-zoom-Div" style="padding: 30px;">
                        <a class="category-links" href="products_info.php?link='.$id.'">
                            <img class="card-img-top" src="auctions_images/'.$image.'" alt="product">
                            <div class="card-body">
                                <p class="card-text">'.$title.'</p>
                                <p class="card-text">Λήξη '.$auction_type.'ς:<br>'.$auction_ended.'</p>
                                <p class="card-text">Αρχική Τιμή: '.$price.' &euro;</p>
                            </div>
                        </a>
                    </div>
                </div>
                ';   
            }
        }else{
            echo 
            '<div class="text-center" style="margin: auto;">
                <h2>Το ιστορικό αγορών σας είναι άδειο.</h2>
            </div>';
        }
        ?>

    </div>
</div>


<?php     
    require 'footer.php';  
?>






    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!--icons-->
    <script src="https://kit.fontawesome.com/eb305cdc11.js"></script>
    
</body>
</html>