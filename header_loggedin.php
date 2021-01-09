<?php 
    require 'session_check.php';  
?>

<div class="container-fluid">
    <div class="container">
        <div class="d-flex">    
            <div class="p-2 mr-auto"><a class="nav-link" href="index.php"><img class="rounded-circle centerlogo" src="images/logo_img.jpg" alt="e-AuctionShop logo"></a></div>
            <div class="p-2 centerLS"><a class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a></div>
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

