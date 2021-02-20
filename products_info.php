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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php 
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



    if (isset($_GET['link'])) {
        $id = $_GET['link'];
    } 


    // product info sql query
    $sql_query = "SELECT * FROM products_table WHERE id='$id'";

    $result = mysqli_query($connection, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        while($row=mysqli_fetch_assoc($result)) {

            $uuid = "$row[uuid]";
            $title = "$row[title]";
            $price = "$row[price]";
            $category = "$row[category]";
            $sub_category = "$row[sub_category]";
            $auction_type = "$row[auction_type]";
            $sent_terms = "$row[sent_terms]";
            $payment_methods = "$row[payment_methods]";
            $sent_expenses = "$row[sent_expenses]";
            $prod_status = "$row[prod_status]";
            $price_raise = "$row[price_raise]";
            $prod_description = "$row[prod_description]";
            $sent_comments = "$row[sent_comments]";
            $image = "$row[primary_image_url]";
            $prod_number = "$row[prod_number]";
            $auction_started = "$row[auction_started]";
            $auction_ended = "$row[auction_ended]";
    
            $bid_price = $price;
        }
    }
    // product info sql query



    // owner info sql query
    $sql_query = "SELECT * FROM user_info WHERE uuid='$uuid'";

    $result = mysqli_query($connection, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        while($row=mysqli_fetch_assoc($result)) {

            $username = "$row[username]";
            $city = "$row[city]";
            $district = "$row[district]";
        }
    }
    // owner info sql query


    // date and time data
    $date_and_time = explode("|" , $auction_ended);
    $date = explode("-", $date_and_time[0]);
    $time = explode(":", $date_and_time[1]);
    // date and time data
?>




<div class="container generalContainer roundedForms mt-4">  
    <!-- breadcrumbs -->
    <ul class="breadcrumb">
        <li><a href="index.php" class="category-links">Αρχική Σελίδα</a></li>
        <?php 
            echo '<li><a href="prod_categories.php?link='.$category.'" class="category-links">'.$category.'</a></li>';
            echo '<li><b>'.$sub_category.'</b></li>';
        ?>
    </ul>
     <!-- breadcrumbs -->

    <!-- img and bid functionality -->
    <div class="mt-4 row">



        <div class="mt-4 col-lg-6 col-sm-12">
            <?php 
                echo "<h4><b><u>$title</u></b></h4>";
                echo '<img style="width: 100%; height:400px; padding: 40px;" src="auctions_images/'.$image.'" alt="product">';
            ?>
        </div>


        
        <div class="mt-4 col-lg-6 col-sm-12">

            <h4><b><u>Λήγει σε:</u></b></h4>

            <div class="mt-4 mb-4 card-columns" id="timerCard">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <p class="card-text" id="countDown">
                            
                        </p>
                    </div>
                </div>
            </div>

            
            <!-- check the type -->

            <?php 

            if ($auction_type=="Δημοπρασία"){

                echo '

                <h4><b><u>Τρέχουσα τιμή:</u></b></h4>

                <div class="mt-4 card-columns">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <p class="card-text">';

                                if ($price == $bid_price){
                                    echo "$price&euro;";
                                }else if ($price < $bid_price){
                                    echo "$bid_price&euro;";
                                }
                                    
                echo '           
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="card-columns">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <p class="card-text">
                            Προσφορά:
                            </p>
                            
                            <input type="number" id="bid_price" name="bid_price" step="0.5" min='.$price_raise.'>
                            <button id="bid_button" class="btn btn-dark" type="button" onclick="bidPrice_function()">Υποβολή</button>

                        </div>
                    </div>
                </div>
                <div class="card-columns">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <p class="card-text">
                                Ελάχιστη προσφορά: '.$price_raise.'&euro;

                            </p>
                        </div>
                    </div>
                </div>
                ';

            }else{
            
                echo '

                <h4><b><u>Τιμή:</u></b></h4>

                <div class="mt-4 card-columns">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <p class="card-text">';

                                if ($price == $bid_price){
                                    echo "$price&euro;";
                                }else if ($price < $bid_price){
                                    echo "$bid_price&euro;";
                                }
                                    
                echo '    
                            </p>
                            </div>
                        </div>
                    </div>       

                
                <div class="card-columns">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <p class="card-text">

                            <button id="buy_button" class="btn btn-dark" type="button" onclick="buyProduct_function()">Αγορά Προϊόντος</button>

                        </div>
                    </div>
                </div>
                ';
            }


            ?>

   
        </div>
    </div>
    <!-- img and bid functionality -->


    
    <!-- more info for product -->
    <div class="container">

        <div class="mt-4">
            <h4><b>Περισσότερες πληροφορίες για το προϊόν:</b></h4>
            <hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;">
        </div>

        <!-- description -->
        <div style="padding: 20px;">
            <h5><i class="fas fa-clipboard"><b> Περιγραφή Προϊόντος:</b></i></h5>
            <?php 
                echo $prod_description;
            ?>
        </div>
        <!-- description -->


        <!-- status -->
        <div style="padding: 20px;">
            <h5><b><i class="fas fa-info-circle"> Κατάσταση Προϊόντος:</i></b></h5>
            <?php 
                echo "$prod_status.";
            ?>
        </div>
        <!-- status -->

        <!-- owner location -->
        <div style="padding: 20px;">
            
            <h5><b><i class="fas fa-map-marked-alt"> Τοποθεσία Πωλητή:</i></b></h5>
          
            <?php 
                echo "$city - $district.";
            ?>
        </div>
        <!-- owner location -->


         <!-- payment methods -->
         <div style="padding: 20px;">
            
            <h5><b><i class="fas fa-cash-register"> Τρόποι Πληρωμής:</i></b></h5>
          
            <?php 
                echo "$payment_methods.";
            ?>
        </div>
        <!-- payment methods -->


        <!-- sent terms -->
        <div style="padding: 20px;">
            
            <h5><b></b><i class="fas fa-file-signature"> Όροι Αποστολής:</i></b></h5>
            <?php 
                echo "$sent_terms.";
            ?>
        </div>
        <!-- sent terms -->


        <!-- sent expenses -->
        <div style="padding: 20px;">
            
            <h5><b></b><i class="fas fa-euro-sign"> Έξοδα Αποστολής:</i></b></h5>
            <?php 
                echo "$sent_expenses&euro;.";
            ?>
        </div>
        <!-- sent expenses -->


        <!-- auction started -->
        <div style="padding: 20px;">
            
            <h5><b></b><i class="fas fa-hourglass-start"> Έναρξη <?php echo $auction_type;?>ς:</i></b></h5>
            <?php 
                echo "$auction_started";
            ?>
        </div>
        <!-- auction started  -->



        <!-- auction ended -->
        <div style="padding: 20px;">
            
            <h5><b></b><i class="fas fa-hourglass-end"> Λήξη <?php echo $auction_type;?>ς:</i></b></h5>
            <?php 
                echo "$auction_ended";
            ?>
        </div>
        <!-- auction ended  -->
        


        <!-- sent comments -->
        <div style="padding: 20px;">
            
            <h5><b></b><i class="fas fa-comment-alt"> Σχόλια Αποστολής:</i></b></h5>
            <?php 
                echo "$sent_comments";
            ?>
        </div>
        <!-- sent comments  -->

        <!-- product id -->
        <div style="padding: 20px;">
            
            <h5><b></b><i class="fas fa-fingerprint"> Κωδικός Προϊόντος:</i></b></h5>
            <?php 
                echo "$prod_number";
            ?>
        </div>
        <!-- product id  -->

        
 

    </div>
    <!-- more info for product -->

<!-- end of white-Div -->
</div>



<?php     
    require 'footer.php';  
?>


<script>
    function bidPrice_function() {
        var bid_price = parseFloat(document.getElementById("bid_price").value);
        var price = parseFloat(<?php echo $price; ?>);
        var min_price_raise = parseFloat(<?php echo $price_raise; ?>);

        if (bid_price < min_price_raise){
            alert("Η προσφορά σας είναι μικρότερη από την ελάχιστη προσφορά")
        }else{
            bid_price = bid_price + price; 
            alert(bid_price);
        }
    }
</script>




<script>

    var date_day = parseInt(<?php echo $date[0]; ?>) ; 
    var date_month = parseInt(<?php echo $date[1]; ?>) - 1 ; 
    var date_year = parseInt(<?php echo $date[2]; ?>) ; 

    var time_hour = parseInt(<?php echo $time[0]; ?>) ; 
    var time_min = parseInt(<?php echo $time[1]; ?>) ; 
    var time_sec = parseInt(<?php echo $time[2]; ?>) ; 

    var countDownDate = new Date(date_year, date_month, date_day, time_hour, time_min, time_sec).getTime();



    // Update the count down every 1 second
    var updateTimer = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("countDown").innerHTML = days + " Ημέρες " + hours + " Ώρες "
    + minutes + " Λεπτά " + seconds + " Δευτερόλεπτα ";

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(updateTimer);
        document.getElementById("countDown").innerHTML = "Η <?php echo $auction_type; ?> έχει λήξει.";
        document.getElementById("timerCard").style.color = "red";

        <?php 
            if ($auction_type=="Δημοπρασία"){
                echo "document.getElementById('bid_price').disabled = true;\n"; 
                echo "document.getElementById('bid_button').disabled = true;";   
            }else{
                echo "document.getElementById('buy_button').disabled = true;\n"; 
            }
        ?>
    }
    }, 1000);

</script>


    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!--icons-->
    <script src="https://kit.fontawesome.com/eb305cdc11.js"></script>
    
</body>
</html>