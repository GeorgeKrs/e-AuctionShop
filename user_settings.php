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
    require 'session_check.php'; 
    require 'header_loggedin.php';  
?> 


<div class="container mt-4">
<div class="generalContainer roundedForms" style="width: 750px; margin:auto;">

    <div class="form-group" style="text-align: center;">
        <a href="#" class="nav-link">Καινούρια καταχώρηση
            <i class="fas fa-folder-open fasPadding"></i>
        </a>
    </div>

    <div class="form-group" style="text-align: center;">
    
        <a href="personal_info_settings.php" class="nav-link">Προσωπικά στοιχεία
            <i class="fas fa-user-circle fasPadding"></i>
        </a>
    </div>

    <div class="form-group" style="text-align: center;">
        <a href="change_pw.php" class="nav-link">Αλλαγή κωδικού πρόσβασης
            <i class="fas fa-lock fasPadding"></i>
        </a>
    </div>

    <div class="form-group" style="text-align: center;">
    
        <a href="#" class="nav-link">Οι καταχωρήσεις μου
            <i class="fas fa-archive fasPadding"></i>
        </a>
    </div>

    <div class="form-group" style="text-align: center;">
    
        <a href="#" class="nav-link">Το ιστορικό αγορών μου
            <i class="fas fa-shopping-bag fasPadding"></i>
        </a>
    </div>

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