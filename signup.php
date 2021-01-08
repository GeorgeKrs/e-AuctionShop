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
    require 'header.php' 
?>  

<div class="container mt-4">
<div class="generalContainer roundedForms">

<form name="signupform" id="signupform" action="" method="post" style="padding: 20px;" >
    <div class="form-group">
        <label for="inputName">Ονοματεπώνυμο</label>
        <input type="text" class="form-control" id="inputName" placeholder="" required>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputUsername">Όνομα χρήστη</label>
            <input type="text" class="form-control" id="inputUsername" placeholder="" required>
        </div>
            <div class="form-group col-md-6">
            <label for="inputPassword">Email</label>
        <input type="email" class="form-control" id="inputEmail" placeholder="" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputPassword">Κωδικός</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="" required>
        </div>
            <div class="form-group col-md-6">
            <label for="inputPassword">Επιβεβαίωση Κωδικού</label>
        <input type="password" class="form-control" id="inputPassword2" placeholder="" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Διεύθυνση/Αριθμός</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="" required>
        </div>
            <div class="form-group col-md-6">
            <label for="inputPassword">Κινητό τηλέφωνο</label>
        <input type="password" class="form-control" id="inputPassword2" placeholder="" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Πόλη</label>
            <input type="text" class="form-control" id="inputCity" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputNomo">Νομός</label>
            <select id="inputNomo" class="form-control" required>
                <option selected>Επιλογή...</option>
                <?php
                    require 'nomoi_ellados.php' 
                ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputTK">ΤΚ</label>
            <input type="text" class="form-control" id="inputΤΚ" required>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" required>
            <label class="form-check-label" for="gridCheck">
                Συμφωνώ με τους όρους και τις προϋποθέσεις
            </label>
        </div>
    </div>
    <button type="submit" onclick="validateform()" class="btn btn-primary">Εγγραφή</button>
</form>

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