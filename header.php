<div class="container-fluid" id="overflowID">
    <div class="container">
        <div class="d-flex">    
            <div class="p-2 mr-auto" id="logoImg"><a class="nav-link" href="index.php"><img class="rounded-circle centerlogo" src="images/logo_img.jpg" alt="e-AuctionShop logo"></a></div>
            <!-- div for responsive -->
            <div class="p-2 mr-auto" style="display:none;" id="homeLink"><a class="nav-link" href="index.php">Αρχική σελίδα</a></div>
            <!-- end div for responsive -->
            <div class="p-2 centerLS"><a class="nav-link" href="signup.php">Εγγραφή</a></div>
            <div class="p-2 centerLS"><a class="nav-link" href="login.php">Είσοδος</a></div>
        </div>

        <hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;">
        
        <?php 
            require 'searchbar.php';
        ?>    
    </div>
</div>

