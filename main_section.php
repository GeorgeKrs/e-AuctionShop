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


            


            <?php 
                require 'pagination.php';
            ?>
            
            <!-- start of pagination -->
            <div class="row mt-4 text-center" style="margin:auto;" id="pagination">
                <div class="col-md-6 col-sm-12">
                </div>
                <div class="col-md-6 col-sm-12">
                    <ul class="pagination">

                    <?php 
                    
                    if ($total_pages <=7){
                        for ($counter = 1; $counter <= $total_pages; $counter++){
                            if ($counter==$pageno){
                                echo "<li class='page-item'><a class='page-link'>$counter</a></li>"; 
                            }else{
                                echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>"; 
                            }
                        }

                    }elseif ($total_pages > 7){
                        if ($pageno <= 4) {
                            for($counter = 1; $counter < 8; $counter++){
                                if ($counter == $pageno){
                                    echo "<li class='page-item active'><a class='page-link active'>$counter</a></li>"; 
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                                }
                            }

                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='?pageno=$second_last'>$second_last</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='?pageno=$total_pages'>$total_pages</a></li>";

                        }elseif ($total_pages  > 4 && $pageno < $total_pages - 4){
                            echo "<li class='page-item'><a class='page-link' href='?pageno=1'>1</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='?pageno=2'>2</a></li>";
                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                            for (
                                $counter = $pageno - $adjacents;
                                $counter <= $pageno + $adjacents;
                                $counter++ 
                                ) {  
                                if ($counter == $pageno) {
                                    echo "<li class='page-item active'><a class='page-link active'>$counter</a></li>"; 
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                                    }                  
                                }
                            echo "<li class='page-item'><a class='page-link'>...</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='?pageno=$second_last'>$second_last</a></li>";
                            echo "<li class='page-item'><a class='page-link' href='?pageno=$total_pages'>$total_pages</a></li>";
        
    
                        }else {
                                echo "<li class='page-item'><a class='page-link' href='?pageno=1'>1</a></li>";
                                echo "<li class='page-item'><a class='page-link' href='?pageno=2'>2</a></li>";
                                echo "<li class='page-item'><a class='page-link'>...</a></li>";
                                for (
                                    $counter = $total_pages - 4;
                                    $counter <= $total_pages;
                                    $counter++
                                    ) 
                                    {
                                    if ($counter == $pageno) {
                                        echo "<li class='page-item active'><a class='page-link active'>$counter</a></li>"; 
                                    }else{
                                        echo "<li class='page-item'><a class='page-link' href='?pageno=$counter'>$counter</a></li>";
                                }                   
                            }
    
                        } 
                    }

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
