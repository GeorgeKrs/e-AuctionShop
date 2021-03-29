<?php  
    require "session_check.php";
    require "db_connection.php";
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
        require "uuid_search.php";
    } else {
        require 'header.php';
        $uuid = intval(0);
    }



    if (isset($_GET['link'])) {
        $id = $_GET['link'];
    } 

    

    // product info sql query
    $sql_query = "SELECT * FROM products_table WHERE id='$id'";

    $result = mysqli_query($connection, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        while($row=mysqli_fetch_assoc($result)) {

            $user_id = "$row[uuid]";
            $id = "$row[id]";
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
        }
    }


    // owner info sql query
    $sql_query = "SELECT * FROM user_info WHERE uuid='$user_id'";

    $result = mysqli_query($connection, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        while($row=mysqli_fetch_assoc($result)) {

            $username = "$row[username]";
            $city = "$row[city]";
            $district = "$row[district]";
        }
    }
    // owner info sql query


    // bid_price sql query
    $total_rows_query = "SELECT COUNT(*) FROM bids_table WHERE product_id='$id'";  
    $result_count = mysqli_query($connection, $total_rows_query);

    $total_rows_product = mysqli_num_rows($result_count);

    if ($total_rows_product > 0) {

        $sql_query_bids = "SELECT bid_price,uuid FROM bids_table WHERE product_id='$prod_number' ORDER BY bid_price DESC LIMIT 1";

        $result_bids = mysqli_query($connection, $sql_query_bids);

        if (mysqli_num_rows($result_bids) > 0) {
            while($row=mysqli_fetch_assoc($result_bids)) {
                
                $max_bid = "$row[bid_price]";
                $winner_bid_id = "$row[uuid]";
            }
        }else{
            $max_bid = floatval(0); 
            $winner_bid_id = intval(0);;  
        }   
    }else{
        $max_bid = floatval(0);
        $winner_bid_id = intval(0);;
    }
    // bid_price sql query

    // check for min price bid
    if ($auction_type == "Δημοπρασία"){
        if ($price < $max_bid){
            $min_bid = ($max_bid + $price_raise);
        }else{
            $min_bid = ($price + $price_raise);
        }
    }
    // check for min price bid


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
            echo '<li><b>'.$title.'</b></li>';
        ?>
    </ul>
     <!-- breadcrumbs -->

    <!-- img and bid functionality -->
    <div class="mt-4 row">



        <div class="mt-4 col-lg-6 col-sm-12">
            <?php 
                echo "<h4><b><u>$title</u></b></h4>";
                echo '<img style="width: 100%; padding: 40px;" src="auctions_images/'.$image.'" alt="product">';
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
                <h4><b><u>Αρχική τιμή:</u></b></h4>

                <div class="mt-4 card-columns">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <p class="card-text">';
                                echo "$price&euro;";
                                    
                echo '           
                            </p>
                        </div>
                    </div>
                </div>


                <h4><b><u>Τρέχουσα τιμή:</u></b></h4>

                <div class="mt-4 card-columns">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <p class="card-text">';

                                if ($price > $max_bid){
                                    echo "$price&euro;";
                                }else if ($price <= $max_bid){
                                    echo "$max_bid&euro;";
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
                            
                            <input type="number" id="bid_price" name="bid_price" step="0.5" min='.$min_bid.'>
                            <button id="bid_Button_submit" class="btn btn-dark" type="button" onclick="bidPrice_function()">Υποβολή</button>

                        </div>
                    </div>
                </div>
                <div class="card-columns">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <p class="card-text">
                                Ελάχιστη προσφορά: '.$min_bid.'&euro;

                            </p>
                        </div>
                    </div>
                </div>

                <div class="card-columns" id="alertBox_min_price" style="display: none">
                    <div class="card bg-danger">
                        <div 
                        class="card-body text-center">
                            <i class="fas fa-exclamation-triangle" 
                                <h6 style="font-size: 20px; padding-top: 8px;"> Η τιμή της προσφοράς σας δεν
                                ικανοποιεί το κριτήριο της ελάχιστης προσφοράς του προϊόντος</h6>
                             </i>

                        </div>
                    </div>
                </div>

                <div class="card-columns" id="alertBox_under_max_price" style="display: none">
                    <div class="card bg-danger">
                        <div 
                        class="card-body text-center">
                            <i class="fas fa-exclamation-triangle" 
                                <h6 style="font-size: 20px; padding-top: 8px;"> Η τιμή της προσφοράς σας είναι
                                μικρότερη από τη τρέχουσα τιμή του προϊόντος</h6>
                             </i>

                        </div>
                    </div>
                </div>

                <div class="card-columns" id="alertBox_success" style="display: none">
                    <div class="card bg-success">
                        <div 
                        class="card-body text-center">
                            <i class="fas fa-clipboard-check">
                                <h6 style="font-size: 20px; padding-top: 8px;"> Η προσφορά σας έγινε δεκτή, θα γίνει αυτόματη ανανέωση της τιμής σε λίγα δευτερόλεπτα</h6>
                            </i>

                        </div>
                    </div>
                </div>

                <div class="card-columns" id="alertBox_fail_server" style="display: none">
                    <div class="card bg-danger">
                        <div 
                        class="card-body text-center">
                            <i class="fas fa-exclamation-triangle">
                                <h6 style="font-size: 20px; padding-top: 8px;"> Η προσφορά σας δεν έγινε δεκτή, ξαναδοκιμάστε αργότερα.</h6>
                            </i>

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
                                echo "$price&euro;";
                                
                                    
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

        <!-- username -->
        <div style="padding: 20px;">
            
            <h5><b></b><i class="fas fa-user-circle"> Όνομα Χρήστη Δημοπρασίας-Πώλησης:</i></b></h5>
            <?php 
                echo "$username";
            ?>
        </div>
        <!-- username  -->

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

    var bid_id = <?php echo $uuid; ?> ;
    
    if(bid_id != 0) {
        var bid_price = parseFloat(document.getElementById("bid_price").value);
        var price =  parseFloat(<?php echo $price; ?>);
        var min_price_raise = parseFloat(<?php echo $price_raise; ?>);
        var product_id = <?php echo $prod_number; ?>;
        var max_bid = <?php echo $max_bid; ?>; 


        if(isNaN(bid_price)) {
            bid_price = parseFloat(0);
        }

        // console.log("Bid price:", bid_price);
        // console.log("price:", price);
        // console.log("min Bid price:", min_price_raise);
        // console.log("Product ID:", product_id);
        // console.log("Max bid:", max_bid);

        if (price > max_bid) {
            max_bid = price;
        }

        if (bid_price <= max_bid){
            document.getElementById('alertBox_under_max_price').style.display="block";
            document.getElementById('alertBox_min_price').style.display="none";
        }else if (bid_price > max_bid && bid_price < (max_bid + min_price_raise)) {
            document.getElementById('alertBox_min_price').style.display="block";
            document.getElementById('alertBox_under_max_price').style.display="none";
        }else{
            document.getElementById('alertBox_min_price').style.display="none";
            document.getElementById('alertBox_under_max_price').style.display="none";

            formData = new FormData();
            
            formData.append("bid_price", bid_price);
            formData.append("bid_id", bid_id);
            formData.append("product_id", product_id);
            
            $.ajax({
                url: 'bid_backend.php',
                enctype: 'multipart/form-data',
                type: "POST",
                cache: false, 
                processData: false,
                contentType: false,
                data: formData, 
                beforeSend: function() {
                        document.getElementById("bid_Button_submit").style.color= '#6502d8';
                        document.getElementById("bid_Button_submit").innerHTML="Παρακαλώ περιμένετε";
                        document.getElementById("bid_Button_submit").disabled=true;
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.statusCode==200) {
                        document.getElementById('alertBox_success').style.display="block";
                        setTimeout(function(){
                            location.reload(); ;
                        },2000);
            
                    }else if (data.statusCode==201) {
                        document.getElementById('alertBox_fail_server').style.display="block";
                    }
                },
                complete: function() {
                    document.getElementById("bid_Button_submit").disabled=false;
                    document.getElementById("bid_Button_submit").style.color= '#ffffff';
                    document.getElementById("bid_Button_submit").innerHTML= "Υποβολή";
                }
            });  
        } 
    }else{
        window.location.href = "login.php";
    }  
}

</script>

<script>
    function buyProduct_function() {
        alert("Buy function not build yet");
    }
</script>



<script>

    var date_day = parseFloat(<?php echo $date[0]; ?>) ; 
    var date_month = parseFloat(<?php echo $date[1]; ?>) - 1 ; 
    var date_year = parseFloat(<?php echo $date[2]; ?>) ; 

    var time_hour = parseFloat(<?php echo $time[0]; ?>) ; 
    var time_min = parseFloat(<?php echo $time[1]; ?>) ; 
    var time_sec = parseFloat(<?php echo $time[2]; ?>) ; 

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

        // Display the result in the element
        document.getElementById("countDown").innerHTML = days + " Ημέρες " + hours + " Ώρες "
        + minutes + " Λεπτά " + seconds + " Δευτερόλεπτα ";
        // If the count down is finished
        if (distance < 0) {
            clearInterval(updateTimer);
            document.getElementById("countDown").innerHTML = "Η <?php echo $auction_type; ?> έχει λήξει.";
            document.getElementById("timerCard").style.color = "red"; 

            var id = <?php echo $id;?>;
           
            var price =  <?php echo $price;?>;
            var max_bid = <?php echo $max_bid;?>; 

            formData = new FormData();
            formData.append("id",id);

            if (price < max_bid){
                var winner_bid_id = <?php echo $winner_bid_id;?>;
                formData.append("winner_bid_id",winner_bid_id); 
            }
          
            
            $.ajax({
                url: 'auction_status_change.php',
                enctype: 'multipart/form-data',
                type: "POST",
                cache: false, 
                processData: false,
                contentType: false,
                data: formData, 
                success: function(data) {
                }
            });   

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