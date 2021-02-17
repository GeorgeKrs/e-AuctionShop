<?php
require 'session_check.php';
require 'db_connection.php';


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
}else{
    $pageno = 1;
}

if (isset($_GET['sortBy_Auctions'])) {
    $sortBy_Auctions = $_GET['sortBy_Auctions'];
}else{
    $sortBy_Auctions = "allProducts";
}


// variables for pagination
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;
$previous_page = $pageno - 1;
$next_page = $pageno + 1;
$adjacents = 2;

$total_pages_sql = "SELECT COUNT(*) FROM products_table";
$result = mysqli_query($connection, $total_pages_sql);
$total_rows=mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$second_last = $total_pages - 1;
// end of variables for pagination


if ($sortBy_Auctions=="allProducts"){
   
    $sql_query = "SELECT * FROM products_table LIMIT $offset, $no_of_records_per_page";

}else if ($sortBy_Auctions=="increasingPrice"){
   
    $sql_query = "SELECT * FROM products_table ORDER BY price ASC LIMIT $offset, $no_of_records_per_page"; 

}else if ($sortBy_Auctions=="decreasingPrice"){
   
    $sql_query = "SELECT * FROM products_table ORDER BY price DESC LIMIT $offset, $no_of_records_per_page";

}

// $sql_query = "SELECT * FROM products_table LIMIT $offset, $no_of_records_per_page";
$result_data = mysqli_query($connection,$sql_query);


while($row = mysqli_fetch_array($result_data)){

    $image = "$row[primary_image_url]";
    $title = "$row[title]";
    $price = "$row[price]";
    $id = "$row[id]";
    $auction_ended = "$row[auction_ended]";
    $auction_type = "$row[auction_type]";

    echo '
        <div class="card-deck col-sm-12 col-md-4 mt-4 product-zoom-Div" style="padding: 30px;">
            <a class="category-links" href="products_info.php?link='.$id.'">
                <img class="card-img-top" src="auctions_images/'.$image.'" alt="product">
                <div class="card-body">
                    <p class="card-text">'.$title.'</p>
                    <p class="card-text">Λήξη '.$auction_type.'ς:<br>'.$auction_ended.'</p>
                    <p class="card-text">Τιμή: '.$price.' &euro;</p>
                </div>
            </a>
        </div>
    ';

}

mysqli_close($connection);


echo $sql_query;
echo '<br>';
echo $pageno;
echo '<br>';
echo $sortBy_Auctions;


?>

