<?php 
    require 'session_check.php';
    require 'db_connection.php';
    
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
                <h3 id="AuctionsGeneral_Titles"><b>Πρόσφατες Δημοπρασίες:</h3></b>
                <hr id="AuctionsGeneral_Ruler" style="float:left; background-color: #0275d8; width: 50%; height: 100%; border-width:3px;">
            </div>

            <div class="row mt-4"></div>
            
            <div class="row mt-4">

                <?php 
                $sql_query = "SELECT * FROM products_table WHERE auction_status='active' ORDER BY id DESC LIMIT 12 ";
                $result_data = mysqli_query($connection,$sql_query);


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

                mysqli_close($connection);
                ?>

            </div>
        </div>  

    </div>




<!-- 
    <div class="row">
        <div class="col-lg-3 col-sm-12"></div>

        <div class="col-lg-9 col-sm-12 mt-4">   
            <div class="container">
                <h3 id="AuctionsGeneral_Titles"><b>Λήγουν Σύντομα:</h3></b>
                <hr id="AuctionsGeneral_Ruler" style="float:left; background-color: #0275d8; width: 50%; height: 100%; border-width:3px;">
            </div>

                
            <div class="row mt-4">

                <?php 
                
                ?>

            </div> 
        </div>
    </div> -->


    <div class="row">
        <div class="col-lg-3 col-sm-12"></div>

        <div class="col-lg-9 col-sm-12 mt-4">   
            <div class="container">
                <h3 id="AuctionsGeneral_Titles"><b>Με τα περισσότερα χτυπήματα:</h3></b>
                <hr id="AuctionsGeneral_Ruler" style="float:left; background-color: #0275d8; width: 50%; height: 100%; border-width:3px;">
            </div>

                
            <div class="row mt-4">

                <?php 
                
                ?>

            </div> 
        </div>
    </div>















<!-- end of white-Div -->
</div>
<!-- end of root div with class container -->
</div>



