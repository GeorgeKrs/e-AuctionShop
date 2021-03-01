<?php 
    require 'uuid_search.php'
?> 


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
    echo '
    <div class="text-center" id="siteName" style="background-color: #000; color: #0275d8; padding:12px; display: none;">
        <h3 style="font-family:Big Shoulders Display, cursive;">e-AuctionShop.gr</h3>
    </div>
    ';
    if(isset($_SESSION['username'])){
        require 'header_loggedin.php';
    } else {
        require 'header.php';
    }

    if (isset($_GET['link'])) {
        $breadcrumb = $_GET['link'];
    }
?>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<!-- div for background to be white (white-Div) -->
<div class="container mt-4 classforfooter">
<!-- div for header 2 only -->
<div class="generalContainer roundedForms">


<!-- BREADCRUMB -->
<ul class="breadcrumb">
  <li><a href="index.php" class="category-links">Αρχική σελίδα</a></li>
    <?php 
        if ($breadcrumb=="Υπολογιστές"){
            echo '
            <li><a href="#" class="category-links">Υπολογιστές</a></li>
            ';
        }elseif ($breadcrumb=="Κοσμήματα"){
            echo '
            <li><a href="#" class="category-links">Κοσμήματα</a></li>
            ';
        }elseif ($breadcrumb=="Μουσικά Όργανα"){
            echo '
            <li><a href="#" class="category-links">Μουσικά Όργανα</a></li>';
        }elseif ($breadcrumb=="Ηλεκτρονικά Παιχνίδια"){
            echo '
            <li><a href="#" class="category-links">Ηλεκτρονικά Παιχνίδια</a></li>';
        }
        ?>
</ul>


    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <!-- side nav -->
            <div class="sideNav mt-4">
                <ul class="category-list roundedForms">
                    <li style="background-color: #dfdfdf;"><h3 style="font-size: 20px;"><b>Υποκατηγορίες:</h3></b></li>
                    <li><hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;"></li>

                    <?php 
                    if ($breadcrumb=="Υπολογιστές"){
                        echo '
                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="pcAll" value="pcAll" checked>
                            <label class="form-check-label" for="pcAll"><b>Όλα</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="cpu" value="cpu">
                            <label class="form-check-label" for="cpu"><b>Επεξεργαστές</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="gpu" value="gpu">
                            <label class="form-check-label" for="gpu"><b>Κάρτες γραφικών</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="monitor" value="monitor">
                            <label class="form-check-label" for="monitor"><b>Οθόνες</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="mobo" value="mobo">
                            <label class="form-check-label" for="mobo"><b>Μητρικές κάρτες</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="pcGeneral" value="pcGeneral">
                            <label class="form-check-label" for="pcGeneral"><b>Περιφερειακά</b></label>
                        </li>
                        ';

                    }elseif ($breadcrumb=="Κοσμήματα"){
                        echo '

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="jewelleryAll" value="jewelleryAll" checked>
                            <label class="form-check-label" for="jewelleryAll"><b>Όλα</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="neckless" value="neckless">
                            <label class="form-check-label" for="neckless"><b>Κολιέ</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="bracelets" value="bracelets">
                            <label class="form-check-label" for="bracelets"><b>Βραχιόλια</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="rings" value="rings">
                            <label class="form-check-label" for="rings"><b>Δαχτυλίδια</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="moearingsbo" value="earings">
                            <label class="form-check-label" for="earings"><b>Σκουλαρίκια</b></label>
                        </li>
                        ';


                    }elseif ($breadcrumb=="Μουσικά Όργανα"){
                        echo '

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="musicInstrumentsfiltersAll" value="musicInstrumentsAll" checked>
                            <label class="form-check-label" for="musicInstrumentsfiltersAll"><b>Όλα</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="e_guitars" value="e_guitars">
                            <label class="form-check-label" for="e_guitars"><b>Ηλεκτρικές κιθάρες</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="c_guitars" value="c_guitars">
                            <label class="form-check-label" for="c_guitars"><b>Κλασσικές κιθάρες</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="bass" value="bass">
                            <label class="form-check-label" for="bass"><b>Μπάσο</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="keys" value="keys">
                            <label class="form-check-label" for="keys"><b>Πλήκτρα</b></label>
                        </li>
                        ';

                    }elseif ($breadcrumb=="Ηλεκτρονικά Παιχνίδια"){
                        echo '

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="gamesfiltersAll" value="gamesAll" checked>
                            <label class="form-check-label" for="gamesAll"><b>Όλα</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="PS4" value="PS4">
                            <label class="form-check-label" for="PS4"><b>PS4</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="PS5" value="PS5">
                            <label class="form-check-label" for="PS5"><b>PS5</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="PC_games" value="PC_games">
                            <label class="form-check-label" for="PC_games"><b>PC</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="XBOX" value="XBOX">
                            <label class="form-check-label" for="XBOX"><b>XBOX</b></label>
                        </li>
                    ';
                    }
                    ?>
                    
                </ul>

            <!-- side nav filters -->
                <?php require 'filters.php'; ?>
            <!-- end of side nav filters -->
            
            </div>
            <!-- end of side nav -->
        </div>

        <div class="col-lg-9 col-sm-12">
            <div class="row"> 
                <div class="col-11">   
                <!-- resultDiv top of the pag e -->
                    <div class="mainSection mt-4" id="main_section_id">
                        <div class="resultsDiv roundedForms">
                            <h3><b>Βρέθηκαν Χ καταχωρήσεις</h3></b>
                            <hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;">
                            <!-- sort based on price or time -->
                            <h5 style="float: left; padding-right:10px;" id="h5_tag">Ταξινόμηση βάσει:</h5>
                            <div class="form-floating" style="margin-right: 10px;">
                                <select class="form-select" id="sortAuctions">
                                    <option value="soonExpired"selected>Λήγουν συντομα</option>
                                    <option value="newProducts">Καινούργια προϊόντα</option>
                                    <option value="Ascending">Αύξουσα τιμή</option>
                                    <option value="Descending">Φθήνουσα τιμή</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of resultDiv top of the page -->


        <div class="container mt-4">
        <div class="row" id="products_Div">
            <?php 
                $category = $breadcrumb;
                $sql_query = "SELECT * FROM products_table WHERE category='$category'";
            
                $result = mysqli_query($connection, $sql_query);
            
                if (mysqli_num_rows($result) > 0) {
                    while($row=mysqli_fetch_assoc($result)) {

                        $image = "$row[primary_image_url]";
                        $title = "$row[title]";
                        $price = "$row[price]";
                        $id = "$row[id]";
                        $auction_ended = "$row[auction_ended]";
                        $auction_type = "$row[auction_type]";

                        echo '
                        <div class="mt-4 mb-4 col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch">
                            <div class="card product-zoom-Div" style="padding: 30px;">
                                <a class="category-links" href="products_info.php?link='.$id.'">
                                    <img class="card-img-top" src="auctions_images/'.$image.'" alt="product">
                                    <div class="card-body">
                                        <p class="card-text">'.$title.'</p>
                                        <p class="card-text">Λήξη '.$auction_type.'ς:<br>'.$auction_ended.'</p>
                                        <p class="card-text">Αρχική Τιμή: '.$price.' &euro;</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        ';
                        
                    }
                }

                mysqli_close($connection);
            ?>
        </div>
        </div>

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




<script>

    formData = new FormData();

    $('#sortAuctions').on('change', function() {
        sortAuctions = this.value;
        formData.append("sortAuctions", sortAuctions);
    });

    $('input[name=typefilter]').change(function(){
        var typeFilter = $( 'input[name=typefilter]:checked' ).val();
        formData.append("typeFilter", typeFilter);
    });

    $('input[name=condfilter]').change(function(){
        var condfilter = $( 'input[name=condfilter]:checked' ).val();
        formData.append("condfilter", condfilter);
    });

    $('input[name=sub_category_name]').change(function(){
        var sub_category_name = $( 'input[name=sub_category_name]:checked' ).val();
        formData.append("sub_category_name", sub_category_name);
    });


    document.getElementById('filters_form').addEventListener('submit', function(e) {
    e.preventDefault();
        var min_price = parseInt(document.getElementById('startPrice').value);
        var max_price = parseInt(document.getElementById('endPrice').value);
        formData.append("min_price", min_price);
        formData.append("max_price", max_price);
    });


    $.ajax({
        url: 'prod_categories_filters.php',
        enctype: 'multipart/form-data',
        type: "POST",
        cache: false, 
        processData: false,
        contentType: false,
        data: formData, 
        success: function(data) {
            $('#products_Div').html(data);
        }
    });

</script>

























   
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!--icons-->
    <script src="https://kit.fontawesome.com/eb305cdc11.js"></script>
    


</body>
</html>