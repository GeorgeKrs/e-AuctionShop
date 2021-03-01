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


echo $category;
echo $sortAuctions; 
echo $condfilter;
echo $typeFilter;

echo $sub_category_name; 
echo $min_price;
echo $max_price;

?> 