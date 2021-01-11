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
    require 'header.php' 
?>  

<div class="container mt-4">
<div class="generalContainer roundedForms">

<form name="signupform" id="signupform" action="signup.backend.php" method="post" style="padding: 20px;" >
    <div class="form-group">
        <label for="inputName">Ονοματεπώνυμο</label>
        <input type="text" class="form-control"  name="inputName" id="inputName" placeholder="" required>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputUsername">Ψευδώνυμο</label>
            <input type="text" class="form-control" name="inputUsername" id="inputUsername" placeholder="" required>
        </div>
            <div class="form-group col-md-6">
            <label for="inputPassword">Email</label>
        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputPassword">Κωδικός</label>
            <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="" required>
        </div>
            <div class="form-group col-md-6">
            <label for="inputPassword">Επιβεβαίωση Κωδικού</label>
        <input type="password" class="form-control" name="inputPassword2" id="inputPassword2" placeholder="" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Διεύθυνση/Αριθμός</label>
            <input type="text" class="form-control" name="inputAddress" id="inputAddress" placeholder="" required>
        </div>
            <div class="form-group col-md-6">
            <label for="inputPhoneNumber">Κινητό τηλέφωνο</label>
        <input type="text" class="form-control" name="inputPhoneNumber" id="inputPhoneNumber" placeholder="+30" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">Πόλη</label>
            <input type="text" class="form-control" name="inputCity" id="inputCity" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputNomo">Νομός</label>
            <select name="inputNomo" id="inputNomo" class="form-control" required>
                <option selected>Επιλογή...</option>
                <?php
                    require 'nomoi_ellados.php' 
                ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputTK">ΤΚ</label>
            <input type="text" class="form-control" name="inputΤΚ" id="inputΤΚ" required>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
                Συμφωνώ με τους όρους και τις προϋποθέσεις
            </label>
        </div>
    </div>
    <button type="submit"  class="btn btn-primary" >Εγγραφή</button>
</form>

</div>
</div>

<!-- alert box if inputPassword1 != inputPassword2 -->
<div
    id="alertBox_pw"
    class= "container mt-4" 
    style= "background-color: white; 
            text-align: center; 
            width:400px;
            border-radius: 15px 50px;
            border: 2px solid #d8020a;
            display: none;">

    <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle"> Τα δύο πεδία των κωδικών πρέπει να είναι ίδια και όχι κενά.</i></h6>
</div>


<!-- alert box if phoneNumber != 10 -->
<div 
    id="alertBox_phone"
    class= "container mt-4" 
    style= "background-color: white; 
            text-align: center; 
            width:400px;
            border-radius: 15px 50px;   
            border: 2px solid #d8020a;
            display: none;">

    <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle"> Ο αριθμός τηλεφώνου πρέπει να έχει 10 ψηφία.</i></h6>
</div>

<?php 
    require 'footer.php';
?>



<!-- validate form , show error if passwords do not match -->
<script>

    document.getElementById('signupform').onsubmit= function(e){
    e.preventDefault();

    var pw1 = document.forms["signupform"]["inputPassword"].value;
    var pw2 = document.forms["signupform"]["inputPassword2"].value;
    var phoneNumber = document.forms["signupform"]["inputPhoneNumber"].value; 
 

        if ((pw1 != pw2) || (pw1.length === 0)) {
            document.getElementById("alertBox_pw").style.display = "block"; 
            // hide alertBox_pw after clicking outside
            document.addEventListener('mouseup', function(e) {
            var alert_div = document.getElementById('alertBox_pw');
            if (!alert_div.contains(e.target)) {
                alert_div.style.display = 'none';
            }
            });  
        } else {
            if (phoneNumber.length != 10) {
            document.getElementById("alertBox_phone").style.display = "block"; 
            // hide alertBox_pw after clicking outside
            document.addEventListener('mouseup', function(e) {
            var alert_div2 = document.getElementById('alertBox_phone');
            if (!alert_div2.contains(e.target)) {
                alert_div2.style.display = 'none';
            }
            });  
            } else {
            document.getElementById("signupform").submit();
        }
    }
}

</script>








<!-- validate form , show error if passwords do not match with type="button" -->

<!-- <script>

    function validateform() {

        var pw1 = document.forms["signupform"]["inputPassword"].value;
        var pw2 = document.forms["signupform"]["inputPassword2"].value;
        var phoneNumber = document.forms["signupform"]["inputPhoneNumber"].value; 

        if ((pw1 != pw2) || (pw1.length === 0)) {
            document.getElementById("alertBox_pw").style.display = "block";    
        } else {
            if (phoneNumber.length != 10) {
            document.getElementById("alertBox_phone").style.display = "block"; 
            } else {
            document.getElementById("signupform").submit();
        }
    }   
}

</script> -->





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