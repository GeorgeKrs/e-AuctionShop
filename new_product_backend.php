<?php 
    require 'uuid_search.php';

    
    // image 
    $img_name = $_FILES['inputImage']['name'];
    $img_size = $_FILES['inputImage']['size'];
    $tmp_name = $_FILES['inputImage']['tmp_name'];


    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);


    $inputImage = uniqid("IMG-", true).'.'.$img_ex_lc;
    $image_upload_path = 'auctions_images/'.$inputImage;
    move_uploaded_file($tmp_name, $image_upload_path);



    if (isset($_POST['inputDescription'])){
        $inputDescription=$_POST['inputDescription'];
    }

    if (isset($_POST['inputSentComments'])){
        $inputSentComments=$_POST['inputSentComments'];
    }

    if (isset($_POST['inputΤitle'])){
        $inputΤitle=$_POST['inputΤitle'];
    }

    if (isset($_POST['inputPrice'])){
        $inputPrice=$_POST['inputPrice'];
    }

    if (isset($_POST['inputRaisePrice'])){
        $inputRaisePrice=$_POST['inputRaisePrice'];
    }

    if (isset($_POST['inputSentExpenses'])){
        $inputSentExpenses=$_POST['inputSentExpenses'];
    }



    if (isset($_POST['inputCategory'])){
        $inputCategory=$_POST['inputCategory'];
    }

    if (isset($_POST['inputSubCategory'])){
        $inputSubCategory=$_POST['inputSubCategory'];
    }

    if (isset($_POST['inputAuctionLast'])){
        $inputAuctionLast=$_POST['inputAuctionLast'];
    }

    if (isset($_POST['inputState'])){
        $inputState=$_POST['inputState'];
    }

    if (isset($_POST['inputType'])){
        $inputType=$_POST['inputType'];
    }

    if (isset($_POST['inputTermsCondition'])){
        $inputTermsCondition=$_POST['inputTermsCondition'];
    }


    // checkboxes

    if(isset($_POST['cashCourier'])){
        $cashCourier = $_POST['cashCourier'];
    }else{
        $cashCourier = null;
    }

    if(isset($_POST['cashHand'])){
        $cashHand = $_POST['cashHand'];
    }else{
        $cashHand = null;
    }

    if(isset($_POST['cardBank'])){
        $cardBank = $_POST['cardBank'];
    }else{
        $cardBank = null;
    }

    if(isset($_POST['paypal'])){
        $paypal = $_POST['paypal'];
    }else{
        $paypal = null;
    }

    if(isset($_POST['takeAway'])){
        $takeAway = $_POST['takeAway'];
    }else{
        $takeAway = null;
    }

    if(isset($_POST['elta'])){
        $elta = $_POST['elta'];
    }else{
        $elta = null;
    }


    $payment_methods_array=[];

    if (!empty($cashCourier)) {
        $payment_methods_array[]="Αντικαταβολή με Courier";
    }

    if (!empty($cashHand)) {
        $payment_methods_array[]="Συνάντηση/Μετρητά";
    }

    if (!empty($cardBank)) {
        $payment_methods_array[]="Κατάθεση στη τράπεζα";
    }

    if (!empty($paypal)) {
        $payment_methods_array[]="Paypal";
    }

    if (!empty($takeAway)) {
        $payment_methods_array[]="Παραλαβή από το κατάστημα";
    }

    if (!empty($elta)) {
        $payment_methods_array[]="Ελτά";
    }

    $payment_methods = "";
    $payment_methods .= ''.implode(' | ', $payment_methods_array);


    // manage time of auctions & store format
    date_default_timezone_set("Europe/Athens");
    $auction_started = date("d-m-Y | H:i:s");

    $auction_ended = strtotime("+$inputAuctionLast day");
    $auction_ended = date("d-m-Y | H:i:s", $auction_ended);

    $auction_status = "active";
    $winner_bid = "";


    // create a unique product number and check it for duplicates in database
    $checkVariable = false;

    while ($checkVariable == false){

        $prod_number = rand(1000000, 9999999);

        $search_prod_number = "SELECT * FROM products_table WHERE prod_number= '$prod_number'";
        $search_result = mysqli_query($connection, $search_prod_number);
        $number_rows = mysqli_num_rows($search_result);
        
        if ($number_rows == 0){
            $registration ="INSERT INTO products_table 
                        (uuid, title, price, category, sub_category,auction_type, sent_terms, payment_methods, auction_duration, sent_expenses, prod_status, price_raise, prod_description, sent_comments, primary_image_url, auction_started, auction_ended, prod_number, auction_status, winner_bid)     
                        VALUES 
                        ('$uuid', '$inputΤitle', '$inputPrice', '$inputCategory', '$inputSubCategory', '$inputType', '$inputTermsCondition', '$payment_methods', '$inputAuctionLast Ημέρες', '$inputSentExpenses', '$inputState', '$inputRaisePrice', '$inputDescription', '$inputSentComments', '$inputImage', '$auction_started','$auction_ended', '$prod_number', '$auction_status', '$winner_bid')";

                        mysqli_query($connection, $registration);
                        $checkVariable = true;
        }    
    }

   
    // check if succesful
    if ($registration) {
        echo json_encode(array("statusCode"=>200));
    }else 
        echo json_encode(array("statusCode"=>201));



?>
