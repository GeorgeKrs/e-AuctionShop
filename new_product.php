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
                <label class="inputLabel" for="inputImage">Φωτογραφία Προϊόντος</label>
                <input style="height: 45px;" type="file" class="form-control" accept="image/*" id="inputImage" name="inputImage" onchange="preview_image(event)" required>
                <h1 style="font-family: Lobster; color:#fff"><u>Eikona</u></h1>
                <img id="img_preview" height="300px;" width="300px;" class="img-thumbnail">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label class="inputLabel" for="prod_description">Περιγραφή Προϊόντος:</label>
                <textarea id="prod_description" name="prod_description" class="form-control" placeholder="" style="width: 100%; height:100%;" required></textarea>
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
                        <option value="pc">Υπολογιστές</option>
                        <option value="music_organs">Μουσικά Όργανα</option>
                        <option value="games">Ηλεκτρονικά Παιχνίδια</option>
                        <option value="jewellery">Κοσμήματα</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCategory">Υποκατηγορία προϊόντος:</label>
                <select name="inputSubCategory" id="inputSubCategory" class="form-control" required>
                        <option selected>Επιλογή...</option>
                </select>
                <!-- sub category script -->
                <script>
                    $(document).ready(function() {
                        $('#inputCategory').change(function () {
                            var categorySelection = $(this).val();
                            if (categorySelection == "pc") {
                                $('#inputSubCategory').html('<option value="cpu">Επεξεργαστές</option><option value="motherboard">Μητρικές Κάρτες</option><option value="monitor">Οθόνες</option><option value="gpu">Κάρτες Γραφικών</option><option value="pcGeneral">Περιφερειακά</option>');
                            }else if (categorySelection == "music_organs") {
                                $('#inputSubCategory').html('<option value="electric_g">Ηλεκτρικές Κιθάρες</option><option value="guitar">Κλασσικές Κιθάρες</option><option value="keyboard">Πλήκτρα</option><option value="bass">Μπάσο</option>');
                            }else if (categorySelection == "games") {
                                $('#inputSubCategory').html('<option value="PS4">PS4</option><option value="PS5">PS5</option><option value="PC">PC</option><option value="XBOX">XBOX</option>');
                            }else if (categorySelection == "jewellery") {
                                $('#inputSubCategory').html('<option value="rings">Δαχτυλίδια</option><option value="neckless">Κολιέ</option><option value="earrings">Σκουλαρίκια</option><option value="bracelets">Βραχιόλια</option>');
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
                        <option value="sell">Πώληση</option>
                        <option value="auction">Δημοπρασία</option>
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

            if (typeSelection=="auction"){
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
                        <option value="new">Καινούριο</option>
                        <option value="old">Μεταχειρισμένο</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputTermsCondition">Όροι αποστολής:</label>
                <select name="inputTermsCondition" id="inputTermsCondition" class="form-control" required>
                        <option selected>Επιλογή...</option>
                        <option value="buyer">Επιβαρύνουν τον αγοραστή</option>
                        <option value="saler">Επιβαρύνουν τον πωλητή</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="inputSentExpenses">Έξοδα αποστολής:</label>
                <input type="number" min="1" max="1000" step="1" class="form-control" name="inputSentExpenses" id="inputSentExpenses"> 
            </div>
        </div>


        <div class="form-group mt-4 col-md-6">
            <label for="inputPayMethods">Τρόποι πληρωμής:</label>
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
                <label for="inputTermsCondition">Σχόλια αποστολής:</label>
                <textarea id="sentComments" name="sentComments" class="form-control" placeholder="" style="width: 100%; height:100%;" required></textarea>        
            </div>
        </div>

    
        <button type="submit"  class="btn btn-primary mt-4" >Καταχώρηση Νέου προϊόντος</button>
    </form>

</div>
</div>

























<?php 
    require 'footer.php';
?>















    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <!--icons-->
    <script src="https://kit.fontawesome.com/eb305cdc11.js"></script>
    
</body>
</html>