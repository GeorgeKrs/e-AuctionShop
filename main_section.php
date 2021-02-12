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
                    require 'pagination.php';

                // $sql_query = "SELECT * FROM products_table ORDER BY id DESC";

                // $result = mysqli_query($connection, $sql_query);

                // if (mysqli_num_rows($result) > 0) {
                //     while($row=mysqli_fetch_assoc($result)) {

                //         $image = "$row[primary_image_url]";
                //         $title = "$row[title]";
                //         $price = "$row[price]";
                //         $id = "$row[id]";
                //         $auction_ended = "$row[auction_ended]";
                //         $auction_type = "$row[auction_type]";

                //         echo '
                //             <div class="card-deck col-sm-12 col-md-4 mt-4 product-zoom-Div" style="padding: 30px;">
                //                 <a class="category-links" href="products_info.php?link='.$id.'">
                //                     <img class="card-img-top" src="auctions_images/'.$image.'" alt="product">
                //                     <div class="card-body">
                //                         <p class="card-text">'.$title.'</p>
                //                         <p class="card-text">Λήξη '.$auction_type.'ς:<br>'.$auction_ended.'</p>
                //                         <p class="card-text">Τιμή: '.$price.' &euro;</p>
                //                     </div>
                //                 </a>
                //             </div>
                //         ';
                        
                //     }
                // }

                // mysqli_close($connection);

                ?>
               

            </div>  


            <div class="row mt-4 text-center" id="pagination">
                
                <div class="col-md-12 col-sm-12">
                    <ul class="pagination">

                        <?php 
                        $pageno=1;
                        for ($pageno==1; $pageno <= $total_pages; $pageno++) {
                            echo '<li class="page-item"><a class="page-link" href="?pageno='.$pageno.'">'.$pageno.'</a></li>';
                        }
                        ?>

                    </ul>
                </div>





<script>
    $(function(){
    var current_page_URL = location.href;
    $( "a" ).each(function() {
    if ($(this).attr("href") !== "#") {
        var target_URL = $(this).prop("href");
       if (target_URL == current_page_URL) {
          $('pagination a').parents('li, ul').removeClass('active');
          $(this).parent('li').addClass('active');
          return false;
       }
     }
  });
});
</script>

            </div>




        </div>  
    </div>



    



    
<!-- end of white-Div -->
</div>
<!-- end of root div with class container -->
</div>
