<?php 
    require 'session_check.php';
    require 'db_connection.php';
    
?> 

<div class="container mt-4" id="overflowID">  
<div class="generalContainer roundedForms">
    

    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <?php
                require 'category_nav_general.php';
            ?>
        </div>  

        

        <div class="col-lg-9 col-sm-12 mt-4">   
            <div id="sortById">
                <h3><b>Πρόσφατες Δημοπρασίες:</h3></b>
                <!-- sort based on price or time -->
                <div class="mt-4">
                    <h5 id="sortByIdH5tag" style="float: left; padding-right:10px;">Ταξινόμηση βάσει:</h5>
                    <div class="form-floating">
                        <select class="form-select" id="sortAuctions" name="sortAuctions">
                            <option value="allProducts" selected>Όλα τα προϊόντα</option>
                            <option value="increasingPrice">Αύξουσα τιμή</option>
                            <option value="decreasingPrice">Φθήνουσα τιμή</option>
                        </select>
                    </div>
                </div>
            </div>
            

            <!-- start of product Div -->
            <div class="row mt-4" id="productsDiv">

            <?php 
                require 'products_filters_backend.php';    
            ?>

            </div>
            <!-- end of product Div -->
            

            <!-- start of pagination -->
            <div class="row mt-4 text-center" style="margin:auto;" id="pagination">
                <div class="col-md-4 col-sm-12">
                </div>
                <div class="col-md-8 col-sm-12">
                    <ul class="pagination">

                        <?php 
                            require 'pagination.php';
                        ?>
    
                    </ul>
                </div>
            </div>
            <!-- end of pagination -->




        </div>  
    </div>


<!-- end of white-Div -->
</div>
<!-- end of root div with class container -->
</div>


<!-- 

<script> 

    var sortBy_Auctions = document.getElementById("sortAuctions").value;

    var pageno = "<?php 
                    if (isset($_GET['pageno'])) {
                    echo $_GET['pageno'];
                        } ?>"

    var formData = new FormData();
    formData.append("sortBy_Auctions", sortBy_Auctions);
    formData.append("pageno", pageno);


    for (var key of formData.entries()) {
        console.log(key[0] + ': ' + key[1]);
    }


    $.ajax({
        url: "products_filters_backend.php",
        enctype: 'multipart/form-data',
        type: "GET",
        cache: false, 
        processData: false,
        contentType: false,
        data: formData, 
        success: function(data) {
            $("#productsDiv").html(data);
        } 
    });

</script> -->
