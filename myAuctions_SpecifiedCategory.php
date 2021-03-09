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

    if (isset($_GET['auctionStatus'])) {
        $auctionsHistory = $_GET['auctionStatus'];
    }

    if ($auctionsHistory=="Ενεργές Δημοπρασίες") {
        $auction_status="in progress";
    }else{
        $auction_status="expired";
    }
?>

<div class="container generalContainer roundedForms mt-4">  

    <ul class="breadcrumb">
        <li><a href="index.php" class="category-links">Αρχική Σελίδα</a></li>
        <li><a href="user_settings.php" class="category-links">Ρυθμίσεις Χρήστη</a></li>
        <li><a href="myAuctions.php" class="category-links">Οι καταχωρήσεις μου</a></li>
        <li style="font-size: 18px;"><b><?php echo $auctionsHistory; ?></b></li>
    </ul>




<div class="row">

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
    