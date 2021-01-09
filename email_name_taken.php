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
   
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

    <link href="style.css" type="text/css" rel="stylesheet">

</head>
<body>





<?php
    require 'session_check.php';
    require 'header.php';
?>


<div
    id="alertBox_pw"
    class= "container mt-4" 
    style= "background-color: white; 
            text-align: center; 
            width:400px;
            border-radius: 15px 50px;
            border: 2px solid #d8020a;
            display: block;
            padding-bottom: 50px;
            padding-top: 50px;
            margin-bottom: 150px;">

            

    <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle"> To email ή το ψευδώνυμο χρησιμοποιείται ήδη.</i></h6>
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