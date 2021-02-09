<?php 
    require 'session_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <title>e-AuctionShop</title>

    <!-- bootstrap and css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="style.css" type="text/css" rel="stylesheet">
   
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">



</head>
<body>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<?php 
    if(isset($_SESSION['username'])){
        require 'header_loggedin.php';
    } else {
        require 'header.php';
    }
?>  


<div class="container mt-4">
<div class="generalContainer roundedForms">

    <form name="newProduct" id="newProduct" action="new_product_backend.php" method="post" style="padding: 20px;">


        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label class="inputLabel" for="inputImage">Φωτογραφία Προϊόντος:</label>
                <input style="height: 45px;" type="file" class="form-control" accept="image/*" id="inputImage" name="inputImage" onchange="preview_image(event)" required>
                <h1 class="mt-4" style="color:#000; font-size:18px;">Επιλεγμένη Εικόνα:</h1>
                <img id="img_preview" height="300px;" width="300px;" class="img-thumbnail">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label class="inputLabel" for="inputDescription">Περιγραφή Προϊόντος:</label>
                <textarea id="inputDescription" name="inputDescription" class="form-control" placeholder="" style="width: 100%; height:100%;" required></textarea>
            </div>
                
        </div>


        <script>
        // preview the image before upload
        function preview_image(event) {
                var reader = new FileReader();
                reader.onload = function()
                {
                var output = document.getElementById('img_preview');
                output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }

        </script>


        <div class="form-row mt-4">
            <div class="form-group col-md-6">
                <label for="inputCategory">Κατηγορία προϊόντος:</label>
                <select name="inputCategory" id="inputCategory" class="form-control" required>
                        <option selected>Επιλογή...</option>
                        <option value="Υπολογιστές">Υπολογιστές</option>
                        <option value="Μουσικά Όργανα">Μουσικά Όργανα</option>
                        <option value="Ηλεκτρονικά Παιχνίδια">Ηλεκτρονικά Παιχνίδια</option>
                        <option value="Κοσμήματα">Κοσμήματα</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputSubCategory">Υποκατηγορία προϊόντος:</label>
                <select name="inputSubCategory" id="inputSubCategory" class="form-control" required>
                        <option selected>Επιλογή...</option>
                </select>
                <!-- sub category script -->
                <script>
                    $(document).ready(function() {
                        $('#inputCategory').change(function () {
                            var categorySelection = $(this).val();
                            if (categorySelection == "Υπολογιστές") {
                                $('#inputSubCategory').html('<option value="Επεξεργαστές">Επεξεργαστές</option><option value="Μητρικές Κάρτες">Μητρικές Κάρτες</option><option value="Οθόνες">Οθόνες</option><option value="gpu">Κάρτες Γραφικών</option><option value="Περιφερειακά">Περιφερειακά</option>');
                            }else if (categorySelection == "Μουσικά Όργανα") {
                                $('#inputSubCategory').html('<option value="Ηλεκτρικές Κιθάρες">Ηλεκτρικές Κιθάρες</option><option value="Κλασσικές Κιθάρες">Κλασσικές Κιθάρες</option><option value="Πλήκτρα">Πλήκτρα</option><option value="Μπάσο">Μπάσο</option>');
                            }else if (categorySelection == "Ηλεκτρονικά Παιχνίδια") {
                                $('#inputSubCategory').html('<option value="PS4">PS4</option><option value="PS5">PS5</option><option value="PC">PC</option><option value="XBOX">XBOX</option>');
                            }else if (categorySelection == "Κοσμήματα") {
                                $('#inputSubCategory').html('<option value="Δαχτυλίδια">Δαχτυλίδια</option><option value="Κολιέ">Κολιέ</option><option value="Σκουλαρίκια">Σκουλαρίκια</option><option value="Βραχιόλια">Βραχιόλια</option>');
                            }
                        });
                    });
                </script>

            </div>
        </div>

      
        <div class="form-row mt-4">
            <div class="form-group col-md-6">
                <label for="inputTitle">Τίτλος προϊόντος:</label>
                <input type="text" class="form-control" name="inputTitle" id="inputTitle" required>
            </div>

            <div class="form-group col-md-6">
                <label for="inputPrice">Τιμή προϊόντος:</label>
                <input type="number" min="1" max="10000" class="form-control" name="inputPrice" id="inputPrice" required>
            </div>
        </div>



        <div class="form-row mt-4">
            <div class="form-group col-md-6">
                <label for="inputType">Τύπος καταχώρησης:</label>
                <select name="inputType" id="inputType" class="form-control" required>
                        <option selected>Επιλογή...</option>
                        <option value="Πώληση">Πώληση</option>
                        <option value="Δημοπρασία">Δημοπρασία</option>
                </select>
            </div>

            
            <div class="form-group col-md-6">
                <label for="inputRaisePrice">Ρυθμός αύξησης τιμής προϊόντος:</label>
                <input type="number" min="1" max="100" step="1" class="form-control" name="inputRaisePrice" id="inputRaisePrice" disabled>
            </div>

        </div>


        <script>
            // type = auction more info
            document.getElementById('inputType').onclick = function() {
            var typeSelection = document.getElementById("inputType");  
            var typeSelection = typeSelection.options[typeSelection.selectedIndex].value;

            if (typeSelection=="Δημοπρασία"){
                document.getElementById("inputRaisePrice").disabled = false;
            }else{
                document.getElementById("inputRaisePrice").value = null;
                document.getElementById("inputRaisePrice").disabled = true;
                
            }
        }
        </script>



        <div class="form-row mt-4">
            <div class="form-group col-md-6 col-sm-12">
            <label for="inputAuctionLast">Διάρκεια δημοπρασίας/πώλησης:</label>
                <select name="inputAuctionLast" id="inputAuctionLast" class="form-control" required>
                    <option selected>Ημέρες...</option>
                    <option value="1">1 Ημέρα</option>
                    <option value="2">2 Ημέρες</option>
                    <option value="3">3 Ημέρες</option>
                    <option value="4">4 Ημέρες</option>
                    <option value="5">5 Ημέρες</option>
                    <option value="6">6 Ημέρες</option>
                    <option value="7">7 Ημέρες</option>
                    <option value="8">8 Ημέρες</option>
                    <option value="9">9 Ημέρες</option>
                    <option value="10">10 Ημέρες</option>
                    <option value="11">11 Ημέρες</option>
                    <option value="12">12 Ημέρες</option>
                    <option value="13">13 Ημέρες</option>
                    <option value="14">14 Ημέρες</option>
                    <option value="15">15 Ημέρες</option>
                    <option value="16">16 Ημέρες</option>
                    <option value="17">17 Ημέρες</option>
                    <option value="18">18 Ημέρες</option>
                    <option value="19">19 Ημέρες</option>
                    <option value="20">20 Ημέρες</option>
                    <option value="21">21 Ημέρες</option>
                    <option value="22">22 Ημέρες</option>
                    <option value="23">23 Ημέρες</option>
                    <option value="24">24 Ημέρες</option>
                    <option value="25">25 Ημέρες</option>
                    <option value="26">26 Ημέρες</option>
                    <option value="27">27 Ημέρες</option>
                    <option value="28">28 Ημέρες</option>
                    <option value="29">29 Ημέρες</option>
                    <option value="30">30 Ημέρες</option>
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <!-- <label for="inputBestPrice">Τιμή για άμεση αγορά αν είναι δημοπρασία(κρυφή):</label>
                <input type="number" min="1" max="1000" step="1" class="form-control" name="inputBestPrice" id="inputBestPrice">  -->
            </div>
        </div>


        



        <div class="form-row mt-4">
            <div class="form-group col-md-4">
                <label for="inputState">Κατάσταση:</label>
                <select name="inputState" id="inputState" class="form-control" required>
                        <option selected>Επιλογή...</option>
                        <option value="Καινούριο">Καινούριο</option>
                        <option value="Μεταχειρισμένο">Μεταχειρισμένο</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputTermsCondition">Όροι αποστολής:</label>
                <select name="inputTermsCondition" id="inputTermsCondition" class="form-control" required>
                        <option selected>Επιλογή...</option>
                        <option value="Επιβαρύνουν τον αγοραστή">Επιβαρύνουν τον αγοραστή</option>
                        <option value="Επιβαρύνουν τον πωλητή">Επιβαρύνουν τον πωλητή</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="inputSentExpenses">Έξοδα αποστολής:</label>
                <input type="number" min="0" max="1000" step="1" class="form-control" name="inputSentExpenses" id="inputSentExpenses"> 
            </div>
        </div>


        <div class="form-group mt-4 col-md-6">
            <label for="inputPayMethods">Τρόποι πληρωμής-παραλαβής:</label>
        </div>


        <div class="form-row mt-4">
                 
            <div class="form-group col-md-6 col-sm-12">
                <div class="form-group">  
                    <input type="checkbox" id="cashCourier" name="cashCourier" value="cashCourier">
                    <label for="cashCourier">Αντικαταβολή με Courier</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="cashHand" name="cashHand" value="cashHand">
                    <label for="cashHand">Συνάντηση/Μετρητά</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="cardBank" name="cardBank" value="cardBank">
                    <label for="cardBank">Κατάθεση στη τράπεζα</label>
                </div>
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="checkbox" id="paypal" name="paypal" value="paypal">
                    <label for="paypal">Paypal</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="takeAway" name="takeAway" value="takeAway">
                    <label for="takeAway">Παραλαβή από το κατάστημα</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="elta" name="elta" value="elta">
                    <label for="elta">Ελτά</label>
                </div>
            </div>

        </div>
            

        <div class="form-row mt-4">
            <div class="form-group col-md-12">
                <label for="inputSentComments">Σχόλια αποστολής:</label>
                <textarea id="inputSentComments" name="inputSentComments" class="form-control" placeholder="" style="width: 100%; height:100%;" required></textarea>        
            </div>
        </div>

    
        <button type="submit"  class="btn btn-primary mt-4" >Καταχώρηση Νέου προϊόντος</button>
    </form>

</div>
</div>


<!-- <div class="container mt-4">
    <div class="generalContainer roundedForms"> -->

    <div
        id="alertBox_success"
        class="container mt-4" 
        style="background-color: white; 
            text-align: center; 
            width:400px;
            border-radius: 15px 50px;
            border: 2px solid #75d802;
            display: none;">

        <h6 style="font-size: 25px; padding-top: 8px;"><i style="color: #75d802;" class="far fa-check-circle">Η καταχώρησή σας έγινε δεκτή.</i></h6>

        <button class="mt-4 btn btn-light" onclick="redirectHomePage();">Επιστροφή στην αρχική</button>

    </div>  

    <div
        id="alertBox_fail"
        class="container mt-4" 
        style="background-color: white; 
            text-align: center; 
            width:400px;
            border-radius: 15px 50px;
            border: 2px solid #d8020a;
            display: none;">

        <h6 style="font-size: 25px; padding-top: 8px;"><i class="fas fa-exclamation-triangle">Αποτυχία καταχώρησης. Παρακαλώ προσπαθείστε ξανά αργότερα</i></h6>

        <button class="mt-4 btn btn-light" onclick="redirectHomePage();">Επιστροφή στην αρχική</button>
    </div>  



    <!-- </div>
</div>
 -->


<?php 
    require 'footer.php';
?>



<script>
    function redirectHomePage() {
        window.location.href = "index.php";
    }
</script>


<script>
// script for preventing submit and getting the data from the user


    document.getElementById('newProduct').onsubmit=function(e) {
    e.preventDefault();


    // file variables
    var inputImage= $('input[type="file"]')[0].files[0];
    
    // textarea-text variables 
    var inputDescription = document.getElementById("inputDescription").value;
    var inputSentComments = document.getElementById("inputSentComments").value;
    var inputΤitle = document.getElementById("inputTitle").value;

    // numbers(double) variables
    var inputPrice = document.getElementById("inputPrice").value;
    var inputRaisePrice = document.getElementById("inputRaisePrice").value;
    var inputSentExpenses = document.getElementById("inputSentExpenses").value;

    // selectform variables
    var inputCategory = document.getElementById("inputCategory").value;
    var inputSubCategory = document.getElementById("inputSubCategory").value;
    var inputAuctionLast = document.getElementById("inputAuctionLast").value;
    var inputState = document.getElementById("inputState").value;
    var inputType = document.getElementById("inputType").value;
    var inputTermsCondition = document.getElementById("inputTermsCondition").value;

    // chechboxes variables
    var cashCourier = document.getElementById("cashCourier");
    var cashHand = document.getElementById("cashHand");
    var cardBank = document.getElementById("cardBank");
    var paypal = document.getElementById("paypal");
    var takeAway =  document.getElementById("takeAway");
    var elta =  document.getElementById("elta");
   

    //  initialize new FormData
    var formData = new FormData();

    formData.append('inputImage',inputImage);

    formData.append('inputDescription',inputDescription);
    formData.append('inputSentComments',inputSentComments);
    formData.append('inputΤitle',inputΤitle);

    formData.append('inputPrice',inputPrice);
    formData.append('inputRaisePrice',inputRaisePrice);
    formData.append('inputSentExpenses',inputSentExpenses);

    formData.append('inputCategory',inputCategory);
    formData.append('inputSubCategory',inputSubCategory);
    formData.append('inputAuctionLast',inputAuctionLast);
    formData.append('inputState',inputState);
    formData.append('inputType',inputType);
    formData.append('inputTermsCondition',inputTermsCondition);

    if (cashCourier.checked) {
        formData.append("cashCourier","Αντικαταβολή με Courier")
    }
    if (cashHand.checked) {
        formData.append("cashHand","Συνάντηση/Μετρητά")
    }
    if (cardBank.checked) {
        formData.append("cardBank","Κατάθεση στη τράπεζα")
    }
    if (paypal.checked) {
        formData.append("paypal","Paypal")
    }
    if (takeAway.checked) {
        formData.append("takeAway","Παραλαβή από το κατάστημα")
    }
    if (elta.checked) {
        formData.append("elta","Ελτά")
    }


    for (var key of formData.entries()) {
        console.log(key[0] + ': ' + key[1]);
    }

    $.ajax({
        url: 'new_product_backend.php',
        enctype: 'multipart/form-data',
        type: "POST",
        cache: false, 
        processData: false,
        contentType: false,
        data: formData, 
        success: function(data) {
            data = JSON.parse(data);
            if (data.statusCode==200) {
                    document.getElementById('alertBox_success').style.display="block";
    
            }else if (data.statusCode==201) {
                document.getElementById('alertBox_fail').style.display="block";
            }
        }
    });      
};

</script>











    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!--icons-->
    <script src="https://kit.fontawesome.com/eb305cdc11.js"></script>
    
</body>
</html>