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


<div class="container mt-4">    
<div class="generalContainer  roundedForms" style="display:flex; justify-content: center;">

    <div>
    <form name="loginform" id="loginform" action="login_backend.php" method="post" style="padding: 20px;" >
        <div class="form-group">
            <label for="inputUserName">Ψευδώνυμο</label>
            <input type="text" class="form-control loginInput" id="inputUserName"
            name="inputUserName" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="inputPassword_login">Κωδικός</label>
            <input type="password" class="form-control loginInput" id="inputPassword_login" name="inputPassword_login" placeholder="" required>
        </div>
        <button type="submit" name="loginbtn" id="loginbtn" class="btn btn-primary">Είσοδος</button>
    </form>
    </div>

</div>
</div>


<!-- alert box if inputPassword1 != inputUserName -->
<div
    id="alertBox"
    class="container mt-4" 
    style="background-color: white; 
           text-align: center; 
           width:400px;
           border-radius: 15px 50px;
           border: 2px solid #d8020a;
           display: none;">

    <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle"> Ο κωδικός ή το όνομα χρήστη είναι λάθος.</i></h6>
</div>



<?php 
    require 'footer.php';
?>


<script>
    document.getElementById('loginform').onsubmit=function(e) {
    e.preventDefault();
    var username = $("#inputUserName").val();
    var password = $("#inputPassword_login").val();
        $.ajax({
            url: "login_backend.php",
            type: "POST",
            data: { 
                // left->name of var, right -> value
                username: username,
                password: password						
            },
            cache: false,
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                if (data.statusCode==200){
                    location.href = "index.php";    
                }
                else if (data.statusCode==201) {
                    document.getElementById('alertBox').style.display="block";
                    document.addEventListener('mouseup', function(e) {
                    var alert_div = document.getElementById('alertBox');
                    if (!alert_div.contains(e.target)) {
                        alert_div.style.display = 'none';
                    }
                    });
                }
            }
        }); 
    };
</script>



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