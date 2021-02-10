<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <!-- favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='images/favicon.png'>
    <title>e-AuctionShop</title>

    <!-- bootstrap and css -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>

    <link href='style.css' type='text/css' rel='stylesheet'>
   
    <link rel='stylesheet' href='//use.fontawesome.com/releases/v5.0.7/css/all.css'>



</head>
<body>
     

<?php 
    require 'session_check.php'; 
    require 'header_loggedin.php';  
    require 'uuid_search.php';
?> 

<!-- make an array of personal info based on id-->
<?php 
$search_info = "SELECT * FROM user_info WHERE uuid='$uuid'";
$history_result = mysqli_query($connection, $search_info);
$row = mysqli_fetch_assoc($history_result);


// echo the form with the data
echo "


<div class='container mt-4'>
<div class='generalContainer roundedForms'>

<ul class='breadcrumb'>
    <li><a href='index.php' class='category-links'>Αρχική Σελίδα</a></li>
    <li><a href='user_settings.php' class='category-links'>Ρυθμίσεις Χρήστη</a></li>
    <li style='font-size:17px;'><b>Προσωπικά Στοιχεία</b></li>
</ul>


<form name='personalInfo_form' id='personalInfo_form' action='changeInfo_backend.php' method='post' style='padding: 20px;'>
    <div class='form-group'>
        <label for='inputName'>Ονοματεπώνυμο</label>
        <input type='text' class='form-control'  name='inputName' id='inputName' placeholder='' value= '$row[full_name]' required>
    </div>
    <div class='form-row'>
        <div class='form-group col-md-6'>
            <label for='inputUsername'>Ψευδώνυμο</label>
            <input type='text' class='form-control' name='inputUsername' id='inputUsername' placeholder='' value= '$row[username]' disabled required>
        </div>
            <div class='form-group col-md-6'>
            <label for='inputPassword'>Email</label>
        <input type='email' class='form-control' name='inputEmail' id='inputEmail' placeholder='' value= '$row[email]' required>
        </div>
    </div>
    <div class='form-row'>
        <div class='form-group col-md-6'>
            <label for='inputAddress'>Διεύθυνση/Αριθμός</label>
            <input type='text' class='form-control' name='inputAddress' id='inputAddress' placeholder='' value= '$row[address_numb]' required>
        </div>
            <div class='form-group col-md-6'>
            <label for='inputPhoneNumber'>Κινητό τηλέφωνο</label>
        <input type='text' class='form-control' name='inputPhoneNumber' id='inputPhoneNumber' placeholder='+30' value='$row[phone]' disabled required>
        </div>
    </div>

    <div class='form-row'>
        <div class='form-group col-md-6'>
            <label for='inputCity'>Πόλη</label>
            <input type='text' class='form-control' name='inputCity' id='inputCity' value= '$row[city]' required>
        </div>
        <div class='form-group col-md-4'>
            <label for='inputNomo'>Νομός</label>
            <select name='inputNomo' id='inputNomo' class='form-control'>
                <option selected> $row[district]</option>";
                    require 'nomoi_ellados.php';
            echo "   
            </select>
        </div>
        <div class='form-group col-md-2'>
            <label for='inputTK'>ΤΚ</label>
            <input type='text' class='form-control' name='inputΤΚ' id='inputΤΚ' value='$row[TK]' required>
        </div>
    </div>
    <button type='submit'  class='btn btn-primary' >Αποθήκευση αλλαγών</button>
</form>



</div>
</div>



<!-- alert box if success -->
<div
    id='alertBox_S'
    class= 'container mt-4' 
    style= 'background-color: white; 
            text-align: center; 
            width:400px;
            border-radius: 15px 50px;
            border: 2px solid #0AD802;
            display: none;'>

    <h6 style='font-size: 25px; padding-top: 8px; color: #000;'><i class='far fa-check-circle'  style='color: #0AD802';> Οι αλλαγές αποθηκεύτηκαν με επιτυχία.</i></h6>
</div>


<!-- alert box if fail -->
<div
    id='alertBox_F'
    class= 'container mt-4' 
    style= 'background-color: white; 
            text-align: center; 
            width:400px;
            border-radius: 15px 50px;
            border: 2px solid #d8020a;
            display: none;'>

    <h6 style='font-size: 25px; padding-top: 8px;'><i class='fas fa-exclamation-triangle'> Δεν έγινε η αλλαγή των στοιχείων σας. Δοκιμάστε αργότερα.</i></h6>
</div>
";

    require 'footer.php';
?>




<!-- pass the values to the back end and make the changes to the database -->
<script>

    document.getElementById('personalInfo_form').onsubmit= function(e){
    e.preventDefault();

    var email = $("#inputEmail").val();
    var full_name = $("#inputName").val();
    var address_numb = $("#inputAddress").val();
    var city = $("#inputCity").val();
    var district = $("#inputNomo").val(); 
    var tk = $("#inputΤΚ").val();

    $.ajax({
        url: "personal_info_backend.php",
        type: "POST",
        data: { 
            // left->name of var, right -> value
            email: email,
            full_name: full_name,
            address_numb: address_numb,
            city: city,
            district: district,
            tk: tk,
        },
        cache: false,
        success: function(data) {
            data = JSON.parse(data);
            if (data.statusCode==200){
                document.getElementById('alertBox_S').style.display="block";
                document.addEventListener('mouseup', function(e) {
                var alert_div = document.getElementById('alertBox_S');
                if (!alert_div.contains(e.target)) {
                    alert_div.style.display = 'none';
                }
                });
            } else if (data.statusCode==201) {
                document.getElementById('alertBox_F').style.display="block";
                document.addEventListener('mouseup', function(e) {
                var alert_div = document.getElementById('alertBox_F');
                if (!alert_div.contains(e.target)) {
                    alert_div.style.display = 'none';
                }
                });
            }
        }
    }); 
}

</script>









<!-- jQuery library -->
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

<!-- Popper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>

<!-- Latest compiled JavaScript -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script> 

<!--icons-->
<script src='https://kit.fontawesome.com/eb305cdc11.js'></script>

</body>
</html>
