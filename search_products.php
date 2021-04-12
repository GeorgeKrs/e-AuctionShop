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
    
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php 
    require 'session_check.php';
    require 'db_connection.php';
    echo '
        <div class="text-center" id="siteName" style="background-color: #000; color: #0275d8; padding:12px; display: none;">
            <h3 style="font-family:Big Shoulders Display, cursive;">e-AuctionShop.gr</h3>
        </div>
        ';
    if(isset($_SESSION['username'])){
        require 'header_loggedin.php';
    } else {
        require 'header.php';
    }
    require 'beforeSearchHeader.php';
?>


<div class="container mt-4" id="overflowID">  
<div class="generalContainer roundedForms">
    

    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <?php
                require 'category_nav_general.php';
            ?>
        </div>  

        

        <div class="col-lg-9 col-sm-12 mt-4">   
            <div class="container">
                <h3 id="AuctionsGeneral_Titles"><b>Αποτελέσματα Αναζήτησης:</h3></b>
                <hr id="AuctionsGeneral_Ruler" style="float:left; background-color: #0275d8; width: 50%; height: 100%; border-width:3px;">
            </div>

            <div class="row mt-4"></div>
            
            <div class="row mt-4" id=result_search>

                <?php 
                $sql_query = "SELECT * FROM products_table WHERE auction_status='active'";
                $result_data = mysqli_query($connection,$sql_query);

                if (!empty($result_data)){
                    while($row = mysqli_fetch_array($result_data)){

                        $image = "$row[primary_image_url]";
                        $title = "$row[title]";
                        $price = "$row[price]";
                        $id = "$row[id]";
                        $auction_ended = "$row[auction_ended]";
                        $auction_type = "$row[auction_type]";

                        echo '
                        <div class="mt-4 mb-4 col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch">
                            <div class="card product-zoom-Div" style="padding: 30px;">
                                <a class="category-links" href="products_info.php?link='.$id.'">
                                    <img class="card-img-top" src="auctions_images/'.$image.'" alt="product">
                                    <div class="card-body">
                                        <p class="card-text">'.$title.'</p>
                                        <p class="card-text">Λήξη '.$auction_type.'ς:<br>'.$auction_ended.'</p>
                                        <p class="card-text">Αρχική Τιμή: '.$price.'&euro;</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        ';

                    }
                }else{
                    echo '<h3><b>Δε βρέθηκαν αποτελέσματα στην αναζήτησή σας.</b></h3>'; 
                }

                ?>

            </div>
        </div>  

    </div>

</div>  

</div>


<?php
    require 'footer.php';  
?>


   
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!--icons-->
    <script src="https://kit.fontawesome.com/eb305cdc11.js"></script>
    
</body>
</html>