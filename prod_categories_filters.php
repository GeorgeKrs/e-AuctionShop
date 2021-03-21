<?php 
    require 'session_check.php';
    require 'db_connection.php';


if (isset($_POST['category'])) {
    $category = $_POST['category'];
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

if (isset($_POST['clicked_id'])) {
    $button_page  = $_POST['clicked_id'];
}else{
    $button_page  = null;
}

$min_price = intval($min_price);
$max_price = intval($max_price);


// check sub_category
$sql_sub_category_filter=[];

if ($sub_category_name!="All"){
    $sql_sub_category_filter[]=" AND sub_category='$sub_category_name'";
}


// check type and cond filters
$sql_type_cond_filter=[];

if ($typeFilter!="All"){
    $sql_type_cond_filter[]=" AND auction_type='$typeFilter'";
}

if ($condfilter!="All"){
    $sql_type_cond_filter[]=" AND prod_status='$condfilter'";
}

// empty array for ordering products
$sql_order_filter=[];


if ($sortAuctions=="Αύξουσα τιμή"){
    $sql_order_filter[]=" ORDER BY price ASC ";
}elseif ($sortAuctions=="Φθίνουσα τιμή"){
    $sql_order_filter[]=" ORDER BY price DESC ";
}elseif ($sortAuctions=="Καινούργια προϊόντα"){
    $sql_order_filter[]=" ORDER BY id DESC ";
}


// empty array for price filters
$price_filter=[];

// $price_filter[]=" AND price>='$min_price' AND price<='$max_price'";
$price_filter[]=" AND price BETWEEN '$min_price' AND '$max_price'";



// initialize count and db call
$total_pages_sql = "SELECT COUNT(*) FROM products_table WHERE category='$category'";
$sql_query_filtered = "SELECT * FROM products_table WHERE category='$category'";


$status_filter=[];
$status_filter[]=" AND auction_status='active'";

// implode all filters to count pages
$total_pages_sql.= '' .implode('AND', $sql_sub_category_filter);
$total_pages_sql.= '' .implode('', $sql_type_cond_filter);
$total_pages_sql.= '' .implode('AND', $price_filter);
$total_pages_sql.= '' .implode('AND', $status_filter);
$total_pages_sql.= '' .implode('ORDER BY', $sql_order_filter);

// implode all filters to make the call to the database
$sql_query_filtered.= '' .implode('AND', $sql_sub_category_filter);
$sql_query_filtered.= '' .implode('', $sql_type_cond_filter);
$sql_query_filtered.= '' .implode('AND', $price_filter);
$sql_query_filtered.= '' .implode('AND', $status_filter);
$sql_query_filtered.= '' .implode('ORDER BY', $sql_order_filter);



// variables for pagination
$limit = 1;
$pages_result = mysqli_query($connection, $total_pages_sql);
$total_rows=mysqli_fetch_array($pages_result)[0];
$total_pages = ceil($total_rows / $limit);


if ($button_page == 1){
    $offset = 0;
}else{
    $offset = ($button_page - 1) * $limit;
}
// end of variables for pagination

$sql_query_filtered.= " LIMIT $limit OFFSET $offset";

// echo $sql_query_filtered;


$result_filters = mysqli_query($connection, $sql_query_filtered);

if (mysqli_num_rows($result_filters) > 0) {
    while($row=mysqli_fetch_assoc($result_filters)) {

        $image = "$row[primary_image_url]";
        $title = "$row[title]";
        $price = "$row[price]";
        $id = "$row[id]";
        $auction_ended = "$row[auction_ended]";
        $auction_type = "$row[auction_type]";

        echo '
        <div class="mt-4 col-lg-4 col-md-4 col-sm-6 d-flex align-items-stretch">
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
}else{
    echo 
        '<div class="text-center">
            <h2>Δε βρέθηκαν καταχωρήσεις</h2>
        </div>';
}

echo
    '
    <div class="container my-4">
        <div class="row"> 
            <div class="col-lg-4 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12" style="padding:2px;">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">';
                        for ($i = 1; $i<=$total_pages; $i++){
                            if ($i == $button_page){
                                echo '
                                <li class="page-item">
                                    <button type="button" id="'.$i.'" onclick="validateFilters(this.id);" style="margin:0.5px;" class="active-btn btn btn-primary">'.$i.'</button>
                                </li>   
                                ';  
                            }else{
                                echo '
                                <li class="page-item">
                                    <button type="button" id="'.$i.'" onclick="validateFilters(this.id);" style="margin:0.5px;" class="btn btn-primary">'.$i.'</button>
                                </li>   
                                ';  
                            }
                        }
                    echo '
                    </ul>
                </nav>
            </div> 
        </div>
    </div>
    ';

mysqli_close($connection);


?> 