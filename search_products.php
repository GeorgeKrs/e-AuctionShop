<?php    
    require 'session_check.php';
    require 'db_connection.php';
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
    
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php 
    if (isset($_POST['searchID'])) {
        $search_input = $_POST['searchID'];
    }else{
        $search_input = intval(0);
    }


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
                <h3 id="AuctionsGeneral_Titles"><b>Αποτελέσματα αναζήτησης για <?php echo $search_input;?>:</h3></b>
                <hr id="AuctionsGeneral_Ruler" style="float:left; background-color: #0275d8; width: 75%; height: 100%; border-width:3px;">
            </div>

            <div class="row mt-4"></div>
            
            <div class="row mt-4" id=result_search>

                <?php 
                $prod_counter = intval(0);
                    if (!empty($search_input)){

                    // $prod_counter = intval(0);

                    $search_array = ["prod_number", "category", "sub_category", "title", "prod_description"];
                    $products_results = [];
                    

                    foreach ($search_array as $search_filter){
                        $sql_result_search = "SELECT * FROM products_table WHERE $search_filter LIKE '%$search_input%' AND auction_status='active'";
                        $result_data = mysqli_query($connection,$sql_result_search);

                        if (!empty($result_data)){
                            while($row = mysqli_fetch_array($result_data)){

                                $product_id_search_result = "$row[prod_number]";

                                if(!in_array($product_id_search_result, $products_results, true)){
                                    array_push($products_results, $product_id_search_result);
                                }
                            }
                        }
                    }

                        // fetch the data in the index page
                    foreach ($products_results as $products_from_search){
                        $sql_query_to_show = "SELECT * FROM products_table WHERE prod_number='$products_from_search' AND auction_status='active'";
                        $result_search_final = mysqli_query($connection,$sql_query_to_show);


                        while($row = mysqli_fetch_array($result_search_final)){

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
                        $prod_counter += 1;

                        }
                    }
                }
                
                if ($prod_counter==0){
                    echo '<h3>Δε βρέθηκαν αποτελέσματα για την αναζήτηση '.$search_input.'.</h3>'; 
                }


                mysqli_close($connection);
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