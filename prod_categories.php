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
        $category = $breadcrumb; 
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
                            <label class="form-check-label" for="e_guitars"><b>Ηλεκτρικές Kιθάρες</b></label>
                        </li>

                        <li style="padding-left: 10px;">
                            <input class="form-check-input" type="radio" name="sub_category_name" id="c_guitars" value="c_guitars">
                            <label class="form-check-label" for="c_guitars"><b>Κλασσικές Kιθάρες</b></label>
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
                                <select class="form-select" id="sortAuctions" onchange="validateFilters();">
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
    var category = "<?php 
                    if (isset($_GET['link'])) {
                    echo $_GET['link'];
                    } ?>"

    formData = new FormData();
    formData.append("category", category);


    $.ajax({
        url: 'prod_category_backend.php',
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



<script>
    function validateFilters(clicked_id) {

        var orderProducts = document.getElementById("sortAuctions");
        var sortAuctions = orderProducts.options[orderProducts.selectedIndex].text;

        var min_price = parseInt(document.getElementById('startPrice').value);
        var max_price = parseInt(document.getElementById('endPrice').value);

        formData = new FormData();

        // check sub-categories
        if(document.getElementById('pcAll').checked) {
            sub_category_name = ""; 
        }else if(document.getElementById('cpu').checked) {
            sub_category_name = "Επεξεργαστές" 
        }else if(document.getElementById('gpu').checked) {
            sub_category_name = "Κάρτες Γραφικών"
        }else if(document.getElementById('monitor').checked) {
            sub_category_name = "Οθόνες"
        }else if(document.getElementById('mobo').checked) {
            sub_category_name = "Μητρικές Κάρτες"
        }else if(document.getElementById('pcGeneral').checked) {
            sub_category_name = "Περιφερειακά"
        }else if(document.getElementById('jewelleryAll').checked) {
            sub_category_name = "";
        }else if(document.getElementById('neckless').checked) {
            sub_category_name = "Κολιέ";
        }else if(document.getElementById('bracelets').checked) {
            sub_category_name = "Βραχιόλια";
        }else if(document.getElementById('rings').checked) {
            sub_category_name = "Δαχτυλίδια";
        }else if(document.getElementById('earings').checked) {
            sub_category_name = "Σκουλαρίκια";
        }else if(document.getElementById('musicInstrumentsfiltersAll').checked) {
            sub_category_name = "";
        }else if(document.getElementById('e_guitars').checked) {
            sub_category_name = "Ηλεκτρικές Kιθάρες";
        }else if(document.getElementById('c_guitars').checked) {
            sub_category_name = "Κλασσικές Kιθάρες";
        }else if(document.getElementById('bass').checked) {
            sub_category_name = "Μπάσο";
        }else if(document.getElementById('keys').checked) {
            sub_category_name = "Πλήκτρα";
        }else if(document.getElementById('gamesfiltersAll').checked) {
            sub_category_name = "";
        }else if(document.getElementById('PS4').checked) {
            sub_category_name = "PS4";
        }else if(document.getElementById('PS5').checked) {
            sub_category_name = "PS5";
        }else if(document.getElementById('PC_games').checked) {
            sub_category_name = "PC";
        }else if(document.getElementById('XBOX').checked) {
            sub_category_name = "XBOX";
        }

        // check condition
        if(document.getElementById('condfilter_all').checked) {
            condfilter = ""; 
        }else if(document.getElementById('condfilter_new').checked) {
            condfilter = "Καινούργιο" 
        }else if(document.getElementById('condfilter_old').checked) {
            condfilter = "Μεταχειρισμένο"
        }

        // check type
        if(document.getElementById('typefilter_all').checked) {
            typeFilter = ""
        }else if(document.getElementById('typeAuction').checked) {
            typeFilter = "Δημοπρασία"
        }else if(document.getElementById('typefilter_sale').checked) {
            typeFilter = "Πώληση"
        }


        formData.append("sortAuctions", sortAuctions);
        formData.append("min_price", min_price);
        formData.append("max_price", max_price);

        formData.append("typeFilter", typeFilter);
        formData.append("condfilter", condfilter);
        formData.append("sub_category_name", sub_category_name);

        formData.append("clicked_id",clicked_id);


        // $('#sortAuctions').on('change', function() {
        //     sortAuctions = this.value;
        //     formData.append("sortAuctions", sortAuctions);
        // });

        // $('input[name=typefilter]').change(function(){
        //     var typeFilter = $( 'input[name=typefilter]:checked' ).val();
        //     formData.append("typeFilter", typeFilter);
        // });

        // $('input[name=condfilter]').change(function(){
        //     var condfilter = $( 'input[name=condfilter]:checked' ).val();
        //     formData.append("condfilter", condfilter);
        // });

        // $('input[name=sub_category_name]').change(function(){
        //     var sub_category_name = $( 'input[name=sub_category_name]:checked' ).val();
        //     formData.append("sub_category_name", sub_category_name);
        // });

        for (var key of formData.entries()) {
        console.log(key[0] + ': ' + key[1]);
        }


        // $.ajax({
        //     url: 'prod_categories_filters.php',
        //     enctype: 'multipart/form-data',
        //     type: "POST",
        //     cache: false, 
        //     processData: false,
        //     contentType: false,
        //     data: formData, 
        //     success: function(data) {
        //         $('#products_Div').html(data);
        //     }
        // });
    }
</script>

























   
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!--icons-->
    <script src="https://kit.fontawesome.com/eb305cdc11.js"></script>
    


</body>
</html>