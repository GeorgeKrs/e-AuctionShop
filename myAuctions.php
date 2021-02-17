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
        <li><b>Οι καταχωρήσεις μου</b></li>
    </ul>

    <div class="row">
        
            <?php 
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                }else{
                    $pageno = 1;
                }
                // variables for pagination
                $no_of_records_per_page = 3;
                $offset = ($pageno - 1) * $no_of_records_per_page;
                $previous_page = $pageno - 1;
                $next_page = $pageno + 1;
                $adjacents = 2;

                $total_pages_sql = "SELECT COUNT(*) FROM products_table WHERE uuid='$uuid'";
                $result = mysqli_query($connection, $total_pages_sql);
                $total_rows=mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $second_last = $total_pages - 1;
                // end of variables for pagination



                $sql_query = "SELECT * FROM products_table WHERE uuid='$uuid' LIMIT $offset, $no_of_records_per_page";

                $result = mysqli_query($connection, $sql_query);

                if (mysqli_num_rows($result) > 0) {
                    while($row=mysqli_fetch_assoc($result)) {

                        $image = "$row[primary_image_url]";
                        $title = "$row[title]";
                        $price = "$row[price]";
                        $id = "$row[id]";
                        $auction_ended = "$row[auction_ended]";
                        $auction_type = "$row[auction_type]";

                        echo '
                        <div class="col-lg-3 col-sm-12">
                            <div class="card product-zoom-Div" style="padding: 30px;">
                                <a class="category-links" href="products_info.php?link='.$id.'">
                                    <img class="card-img-top" src="auctions_images/'.$image.'" alt="product">
                                    <div class="card-body">
                                        <p class="card-text">'.$title.'</p>
                                        <p class="card-text">Λήξη '.$auction_type.'ς:<br>'.$auction_ended.'</p>
                                        <p class="card-text">Τιμή: '.$price.' &euro;</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        ';
                        
                    }
                }

                mysqli_close($connection);
            ?>
                    
    </div>

    <!-- start of pagination -->
    <div class="row mt-4 text-center" style="margin:auto;" id="pagination">
        <div class="col-md-4 col-sm-12">
        </div>
        <div class="col-md-8 col-sm-12">
            <ul class="pagination">

                <?php 
                    require 'pagination.php';
                ?>

            </ul>
        </div>
    </div>
    <!-- end of pagination -->


<!-- end of white-Div -->
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