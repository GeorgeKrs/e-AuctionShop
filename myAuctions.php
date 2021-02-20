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

    $myCurrentAuctions = "Τωρινές Δημοπρασίες";
    $myEndedAuctions = "Ληγμένες Δημοπρασίες";
?>

<div class="container generalContainer roundedForms mt-4">  

    <ul class="breadcrumb">
        <li><a href="index.php" class="category-links">Αρχική Σελίδα</a></li>
        <li><a href="user_settings.php" class="category-links">Ρυθμίσεις Χρήστη</a></li>
        <li style="font-size: 18px;"><b>Οι καταχωρήσεις μου</b></li>
    </ul>

<div style="width: 70%; margin:auto;">
    <div class="card-columns mt-4">
        <div class="card bg-light">
            <div class="card-body text-center">
                <p class="card-text">
                    <?php
                        echo '<a href="myAuctions_SpecifiedCategory.php?auctionStatus='.$myCurrentAuctions.'" class="category-links">Ενεργές Δημοπρασίες/Πωλήσεις</a>';
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="card-columns mt-4 mb-4">
        <div class="card bg-light">
            <div class="card-body text-center">
                <p class="card-text">
                    <?php
                        echo '<a href="myAuctions_SpecifiedCategory.php?auctionStatus='.$myEndedAuctions.'" class="category-links">Δημοπρασίες/Πωλήσεις που έχουν λήξει</a>';
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>



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