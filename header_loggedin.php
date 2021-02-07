<?php 
    require 'session_check.php';  
?>

<div class="container-fluid">
    <div class="container">
        <div class="d-flex">    
            <div class="p-2 mr-auto" id="logoImg"><a  class="nav-link" href="index.php"><img class="rounded-circle centerlogo" src="images/logo_img.jpg" alt="e-AuctionShop logo"></a></div>
            <!-- div for responsive -->
            <div class="p-2 mr-auto" style="display:none;" id="homeLink"><a class="nav-link" href="index.php">Αρχική σελίδα</a></div>
            <!-- end div for responsive -->
            
            <div class="p-2 centerLS">
                <a id="usernamePhone" class="nav-link user" href="user_settings.php" 
                data-content=<?php echo $_SESSION['username'];?>> 
                    <?php echo $_SESSION['username'];?>
                    <i href="user_settings.php" class="fas fa-user-cog"></i>
                </a>

                <a id="userSettingsIcon_onPhone" class="nav-link user" style="display: none;" href="user_settings.php"><i  class="fas fa-user-cog"></i></a>
            </div>  

            <div class="p-2 centerLS"><a class="nav-link" href="logout.php">Έξοδος</a></div>
        </div>

        <hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;">
        
        <div class="d-flex justify-content-end search-container">
            <form action="#" method="post">
                <input class="searchInput" type="text" placeholder="Αναζήτηση.." name="search">
                <button class="btn-primary btnsearch" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>        
    </div>
</div>

