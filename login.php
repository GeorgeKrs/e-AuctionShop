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
    <div class="generalContainer  roundedForms" style="display:flex; justify-content: center;">

        <div>
        <form name="loginform" id="loginform" action="" method="post" style="padding: 20px;" >
            <div class="form-group">
                <label for="inputFirstName">Όνομα χρήστη</label>
                <input type="text" class="form-control loginInput" id="inputFirstName" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="inputUsername">Email</label>
                <input type="email" class="form-control loginInput" id="inputUsername" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="inputPassword">Κωδικός</label>
                <input type="password" class="form-control loginInput" id="inputPassword" placeholder="" required>
            </div>
            <button type="submit" onclick="validateform()" class="btn btn-primary">Είσοδος</button>
        </form>
        </div>

    </div>
    </div>





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