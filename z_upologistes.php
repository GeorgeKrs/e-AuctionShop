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
    if(isset($_SESSION['username'])){
        require 'header_loggedin.php';
    } else {
        require 'header.php';
    }
?>


<!-- div for background to be white (white-Div) -->
<div class="container mt-4 classforfooter">
<!-- div for header 2 only -->
<div class="generalContainer">


<!-- BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="index.php">Αρχική σελίδα</a></li>
  <li>Υπολογιστές</li>
</ul>


    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <!-- side nav -->
            <div class="sideNav mt-4">
                <ul class="category-list">
                    <li style="background-color: #dfdfdf;"><h3 style="font-size: 20px;"><b>Υποκατηγορίες:</h3></b></li>
                    <li><hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;"></li>
                    <li><b><a href="#" class="category-links">Επεξεργαστές</a></b></li>
                    <li><b><a href="#" class="category-links">Κάρτες γραφικών</a></b></li>
                    <li><b><a href="#" class="category-links">Οθόνες</a></b></li>
                    <li><b><a href="#" class="category-links">Μητρικές κάρτες</a></b></li>
                    <li><b><a href="#" class="category-links">Περιφερειακά</a></b></li>
                </ul>

            <!-- side nav filters -->
                <?php require 'filters.php'; ?>
            <!-- end of side nav filters -->
            </div>
            <!-- end of side nav -->
        </div>

        <div class="col-lg-9 col-sm-12">
            <div class="row"> 
                <div class="col-11 d-inline-flex flex-column">   
                <!-- resultDiv top of the pag e -->
                    <div class="mainSection mt-4">
                        <div class="resultsDiv">
                            <h3><b>Βρέθηκαν Χ καταχωρήσεις</h3></b>
                            <hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;">
                            <!-- sort based on price or time -->
                            <h5 style="float: left; padding-right:10px;">Ταξινόμηση βάσει:</h5>
                            <div class="form-floating">
                                <select class="form-select" id="sortAuctions">
                                    <option selected>Λήγουν συντομα</option>
                                    <option value="1">Καινούργια προϊόντα</option>
                                    <option value="2">Αύξουσα τιμή</option>
                                    <option value="3">Φθήνουσα τιμή</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- end of resultDiv top of the page -->
            

            <div class="row"> <!--row for objects-->
                <div class="col">
                    <div class="card" style="width:250px">
                        <img class="card-img-top" src="images/favicon.png" alt="Card image">
                        <div class="card-body">
                            <p class="card-text">Σύντομη περιγραφή του προϊόντος που θα το παίρνουμε απο τον χρήστη κάθε φορά που θα ανεβάζει μια Δημοπρασία</p>
                            <p>Προσεγγιστική τιμή: <b>Price $</b></p>
                            <a href="#" class="btn btn-primary">Περισσότερα</a>
                        </div>
                    </div>
                </div>  
                <div class="col">
                    <div class="card" style="width:250px">
                        <img class="card-img-top" src="images/logo.png" alt="Card image">
                        <div class="card-body">
                            <p class="card-text">Σύντομη περιγραφή του προϊόντος που θα το παίρνουμε απο τον χρήστη κάθε φορά που θα ανεβάζει μια Δημοπρασία</p>
                            <p>Προσεγγιστική τιμή: <b>Price $</b></p>
                            <a href="#" class="btn btn-primary">Περισσότερα</a>
                        </div>
                    </div>  
                </div>
                <div class="col">
                    <div class="card" style="width:250px">
                        <img class="card-img-top" src="images/logo.png" alt="Card image">
                        <div class="card-body">
                            <p class="card-text">Σύντομη περιγραφή του προϊόντος που θα το παίρνουμε απο τον χρήστη κάθε φορά που θα ανεβάζει μια Δημοπρασία</p>
                            <p>Προσεγγιστική τιμή: <b>Price $</b></p>
                            <a href="#" class="btn btn-primary">Περισσότερα</a>
                        </div>
                    </div>  
                </div>
                <div class="col">
                    <div class="card" style="width:250px">
                        <img class="card-img-top" src="images/logo.png" alt="Card image">
                        <div class="card-body">
                            <p class="card-text">Σύντομη περιγραφή του προϊόντος που θα το παίρνουμε απο τον χρήστη κάθε φορά που θα ανεβάζει μια Δημοπρασία</p>
                            <p>Προσεγγιστική τιμή: <b>Price $</b></p>
                            <a href="#" class="btn btn-primary">Περισσότερα</a>
                        </div>
                    </div>  
                </div>
               
            
            </div><!-- end of second row(row for objects)-->
        </div><!-- end of first row(big) -->


    <!-- end of row -->
    </div>

<!-- end of white-Div -->
</div>
<!-- end of root div with class container -->
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