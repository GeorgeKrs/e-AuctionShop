<?php 
    require 'session_check.php'; 
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <!-- favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='images/favicon.png'>
    <title>e-AuctionShop</title>

    <!-- bootstrap and css -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>

    <link href='style.css' type='text/css' rel='stylesheet'>
   
    <link rel='stylesheet' href='//use.fontawesome.com/releases/v5.0.7/css/all.css'>



</head>
<body>



<?php 
    echo '
    <div class="text-center" id="siteName" style="background-color: #000; color: #0275d8; padding:12px; display: none;">
        <h3 style="font-family:Big Shoulders Display, cursive;">e-AuctionShop.gr</h3>
    </div>
    ';
    require 'header_loggedin.php';  
    require 'uuid_search.php';
?>

<div class="container mt-4">
<div class="generalContainer roundedForms">

<ul class='breadcrumb'>
    <li><a href='index.php' class='category-links'>Αρχική Σελίδα</a></li>
    <li><a href='user_settings.php' class='category-links'>Ρυθμίσεις Χρήστη</a></li>
    <li style='font-size:17px;'><b>Αλλαγή Κωδικού</b></li>
</ul>

    <form name="changePwform" id="changePwform" action="change_pw_backend.php" method="post" style="padding: 20px;" >

    <div class="form-group">
        <!-- <h3 style="font-size: 16px;">Παρακαλώ Πληκτρολογήστε τον τωρινό κωδικό σας</h3> -->
        <label for="inputPasswordold">Παρακαλώ πληκτρολογήστε τον τωρινό κωδικό σας</label>
        <input type="password" class="form-control"  name="inputPasswordOld" id="inputPasswordOld" placeholder="" required>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputPassword1">Νέος κωδικός</label>
            <input type="password" class="form-control" name="inputPassword1" id="inputPassword1" placeholder="" >
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword2">Επιβεβαίωση νέου κωδικού</label>
        <input type="password" class="form-control" name="inputPassword2" id="inputPassword2" placeholder="" >
        </div>
    </div>

    <button type="submit"  class="btn btn-primary">Αποθήκευση αλλαγών</button>

    <button id="forgotPwButton" type="button" onclick="forgotPw()"  class="btn btn-primary" style="float: right;">Ξέχασες τον κωδικό σου;</button>
    </form>

    
<!-- hidden form -->
    <form class="form-group col-md-6" name="alertBox_forgotPw" id="alertBox_forgotPw" action="forgot_pw_backend.php" style="display: none;" method="post"> 

        <label for="inputEmail">Παρακαλώ πληκτρολογήστε το email σας</label>
        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="" required>
        <button type="submit"  class="btn btn-primary mt-4">Αποστολή νέου κωδικού</button>

    </form>

</div>
</div>


<!-- alert box if email do not match with id-->
<div 
    id="alertBox_wrongEmail"
    class= "container mt-4" 
    style= "background-color: white; 
            text-align: center; 
            width:350px;
            border-radius: 15px 50px;   
            border: 2px solid #d8020a;
            display: none;">

        <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle"> To email που πληκτρολογήσατε είναι λάθος.</i></h6>
</div>


<!-- pw change  -->

<!-- alert box if inputPassword1 != inputPassword2 -->
<div
    id="alertBox_pw"
    class= "container mt-4" 
    style= "background-color: white; 
            text-align: center; 
            width:350px;
            border-radius: 15px 50px;
            border: 2px solid #d8020a;
            display: none;">

    <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle"> Τα δύο πεδία των κωδικών πρέπει να είναι ίδια και όχι κενά.</i></h6>
</div>



<!-- alert box if success (200) -->
<div
    id='alertBox_S'
    class= 'container mt-4' 
    style= 'background-color: white; 
            text-align: center; 
            width:350px;
            border-radius: 15px 50px;
            border: 2px solid #0AD802;
            display: none;'>

    <h6 style='font-size: 25px; padding-top: 8px; color: #000;'><i class='far fa-check-circle'  style='color: #0AD802';> Οι αλλαγές αποθηκεύτηκαν με επιτυχία.</i></h6>
</div>


<!-- alert box if fail to change pw on backend (201)-->
<div
    id="alertBox_F"
    class= "container mt-4" 
    style= "background-color: white; 
            text-align: center; 
            width:350px;
            border-radius: 15px 50px;
            border: 2px solid #d8020a;
            display: none;">

    <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle"> Δεν έγινε η αλλαγή του κωδικού σας. Δοκιμάστε αργότερα.</i></h6>
</div>


<!-- alert box if old pw is wrong (202)-->
<div 
    id="alertBox_oldpw"
    class= "container mt-4" 
    style= "background-color: white; 
            text-align: center; 
            width:350px;
            border-radius: 15px 50px;   
            border: 2px solid #d8020a;
            display: none;">

    <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle"> Ο κωδικός σας είναι λάθος. Πληκτρολογήστε τον σωστά για να αλλάξετε κωδικό προσβασης.</i></h6>
</div>



<!-- email pw recovery -->


<!-- alert box if success on changing pw via email (200) -->
<div
    id='alertBox_Smail'
    class= 'container mt-4' 
    style= 'background-color: white; 
            text-align: center; 
            width:350px;
            border-radius: 15px 50px;
            border: 2px solid #0AD802;
            display: none;'>

    <h6 style='font-size: 25px; padding-top: 8px; color: #000;'><i class='far fa-check-circle'  style='color: #0AD802';> Ο καινούριος σας κωδικός έχει σταλεί στο email σας.</i></h6>
</div>


<!-- alert box if old email is wrong (202)-->
<div 
    id="alertBox_oldemailwrong"
    class= "container mt-4" 
    style= "background-color: white; 
            text-align: center; 
            width:350px;
            border-radius: 15px 50px;   
            border: 2px solid #d8020a;
            display: none;">

    <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle"> To email που πληκτρολογήσατε είναι λάθος.</i></h6>
</div>


<?php 
    require 'footer.php';
?>




<!-- pass the values to the back end and make the changes to the database -->
<script>

    document.getElementById('changePwform').onsubmit= function(e){
    e.preventDefault();

    var pw1 = $("#inputPassword1").val();
    var pw2 = $("#inputPassword2").val();
    var pw_old = $("#inputPasswordOld").val();  

    formData = new FormData();
    formData.append('pw1',pw1);
    formData.append('pw_old',pw_old);


    if ((pw1 != pw2) || (pw1.length === 0)) {
        document.getElementById("alertBox_pw").style.display = "block"; 
        // hide alertBox_pw after clicking outside
        document.addEventListener('mouseup', function(e) {
        var alert_div = document.getElementById('alertBox_pw');
        if (!alert_div.contains(e.target)) {
            alert_div.style.display = 'none';
        }
        }); 
    }else{  $.ajax({
            url: "change_pw_backend.php",
            type: "POST",
            cache: false, 
            processData: false,
            contentType: false,
            data: formData,
            success: function(data) {
                data = JSON.parse(data);
                
                if (data.statusCode==200){
                        document.getElementById('alertBox_S').style.display="block";
                        document.addEventListener('mouseup', function(e) {
                        var alert_div = document.getElementById('alertBox_S');
                        if (!alert_div.contains(e.target)) {
                            alert_div.style.display = 'none';
                        }
                    });
                } else if (data.statusCode==201) {
                        document.getElementById('alertBox_F').style.display="block";
                        document.addEventListener('mouseup', function(e) {
                        var alert_div = document.getElementById('alertBox_F');
                        if (!alert_div.contains(e.target)) {
                            alert_div.style.display = 'none';
                        }
                    });
                } else if (data.statusCode==202) {
                        document.getElementById('alertBox_oldpw').style.display="block";
                        document.addEventListener('mouseup', function(e) {
                        var alert_div = document.getElementById('alertBox_oldpw');
                        if (!alert_div.contains(e.target)) {
                            alert_div.style.display = 'none';
                        }
                    });
                }
            }
        }); 
    }
}
</script>


<!-- script for making email visible -->
<script>
    function forgotPw() {
        document.getElementById("alertBox_forgotPw").style.display="block";
    }
</script>


<!-- checking email and make changes if it is correct -->
<script>
    document.getElementById('alertBox_forgotPw').onsubmit= function(e){
    e.preventDefault();

    var email = $("#inputEmail").val();
    
    $.ajax({
        url: "forgot_pw_backend.php",
        type: "POST",
        data: { 
            // left-> name of post tag variable, right -> value
            email: email,
        },
        cache: false,
        success: function(data) {
            data = JSON.parse(data);
            if (data.statusCode==200){
                document.getElementById('alertBox_Smail').style.display="block";
                document.addEventListener('mouseup', function(e) {
                var alert_div = document.getElementById('alertBox_Smail');
                if (!alert_div.contains(e.target)) {
                    alert_div.style.display = 'none';
                }
                });
            } else if (data.statusCode==201) {
                document.getElementById('alertBox_F').style.display="block";
                document.addEventListener('mouseup', function(e) {
                var alert_div = document.getElementById('alertBox_F');
                if (!alert_div.contains(e.target)) {
                    alert_div.style.display = 'none';
                }
                });
            } else if (data.statusCode==202) {
                document.getElementById('alertBox_oldemailwrong').style.display="block";
                document.addEventListener('mouseup', function(e) {
                var alert_div = document.getElementById('alertBox_oldemailwrong');
                if (!alert_div.contains(e.target)) {
                    alert_div.style.display = 'none';
                }
                });
            }
        }
    }); 
}
</script>

<!-- jQuery library -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

<!-- Popper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>

<!-- Latest compiled JavaScript -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script> 

<!--icons-->
<script src='https://kit.fontawesome.com/eb305cdc11.js'></script>

</body>
</html>
