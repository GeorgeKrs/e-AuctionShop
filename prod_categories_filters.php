<?php 
    require 'session_check.php';
    require 'db_connection.php';


if (isset($_POST['link'])) {
    $category = $_POST['link'];
}else{
    $category = null;
}

if (isset($_POST['sortAuctions'])) {
    $sortAuctions = $_POST['sortAuctions'];
}else{
    $sortAuctions = null;
}

if (isset($_POST['condfilter'])) {
    $condfilter = $_POST['condfilter'];
}else{
    $condfilter = null;
}

if (isset($_POST['typeFilter'])) {
    $typeFilter = $_POST['typeFilter'];
}else{
    $typeFilter = null;
}

if (isset($_POST['sub_category_name'])) {
    $sub_category_name = $_POST['sub_category_name'];
}else{
    $sub_category_name = null;
}

if (isset($_POST['min_price'])) {
    $min_price = $_POST['min_price'];
}else{
    $min_price = null;
}

if (isset($_POST['max_price'])) {
    $max_price = $_POST['max_price'];
}else{
    $max_price = null;
}



// $total_pages_sql = "SELECT COUNT(*) FROM products_table WHERE category='$category'";  

// // variables for pagination
// $no_of_records_per_page = 3;
// $pages_result = mysqli_query($connection, $total_pages_sql);
// $total_rows=mysqli_fetch_array($pages_result)[0];
// $total_pages = ceil($total_rows / $no_of_records_per_page);
// // end of variables for pagination

// $limit = 3;

// $sql_query .=" LIMIT $limit";



// $sql_query = "SELECT * FROM products_table WHERE category='$category'";

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
//         <div class="mt-4 mb-4 col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch">
//             <div class="card product-zoom-Div" style="padding: 30px;">
//                 <a class="category-links" href="products_info.php?link='.$id.'">
//                     <img class="card-img-top" src="auctions_images/'.$image.'" alt="product">
//                     <div class="card-body">
//                         <p class="card-text">'.$title.'</p>
//                         <p class="card-text">Λήξη '.$auction_type.'ς:<br>'.$auction_ended.'</p>
//                         <p class="card-text">Αρχική Τιμή: '.$price.' &euro;</p>
//                     </div>
//                 </a>
//             </div>
//         </div>
//         ';
        
//     }
// }

// echo
//     '
//     <div class="container my-4">
//         <div class="row"> 
//             <div class="col-lg-4 col-sm-12"></div>
//             <div class="col-lg-4 col-sm-12"></div>
//             <div class="col-lg-4 col-sm-12" style="padding:2px;">
//                 <nav aria-label="Page navigation example">
//                     <ul class="pagination justify-content-end">';
//                         for ($i = 1; $i<=$total_pages; $i++){
//                             if ($i == 1) {
//                                 echo '
//                                 <li class="page-item">
//                                     <button type="button" id="'.$i.'" onclick="validateFilters(this.id);" style="margin:0.5px;" class="active-btn btn btn-primary">'.$i.'</button>
//                                 </li>   
//                                 ';  
//                             }else{
//                                 echo '
//                                 <li class="page-item">
//                                     <button type="button" id="'.$i.'" onclick="validateFilters(this.id);" style="margin:0.5px;" class="btn btn-primary">'.$i.'</button>
//                                 </li>   
//                                 ';  
//                             }
//                         }
//                     echo '
//                     </ul>
//                 </nav>
//             </div> 
//         </div>
//     </div>  
//     ';

// mysqli_close($connection);

echo $category;
echo $sortAuctions; 
echo $condfilter;
echo $typeFilter;

echo $sub_category_name; 
echo $min_price;
echo $max_price;

?> 