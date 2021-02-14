<?php 
    require 'db_connection.php';
?> 

<div class="container mt-4" id="overflowID">  
<div class="generalContainer">
    

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
                        <select class="form-select" id="sortAuctions">
                            <option selected>Λήγουν συντομα</option>
                            <option value="1">Καινούργια προϊόντα</option>
                            <option value="2">Αύξουσα τιμή</option>
                            <option value="3">Φθήνουσα τιμή</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-4" id="productsDiv">
                <?php
                    require 'products_filters_backend.php';
                ?>
            </div>
            
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
