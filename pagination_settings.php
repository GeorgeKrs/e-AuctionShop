<?php 

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
}else{
    $pageno = 1;
}


// variables for pagination
$no_of_records_per_page = 12;
$offset = ($pageno - 1) * $no_of_records_per_page;
$previous_page = $pageno - 1;
$next_page = $pageno + 1;
$adjacents = 2;

$total_pages_sql = "SELECT COUNT(*) FROM products_table WHERE uuid='$uuid'";
$result = mysqli_query($connection, $total_pages_sql);
$total_rows=mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$second_last = $total_pages - 1;
// end of variables for pagination

?>
