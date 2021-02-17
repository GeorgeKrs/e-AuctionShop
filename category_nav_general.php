<?php 
$pc="Υπολογιστές";
$jewellery="Κοσμήματα";
$music_organs="Μουσικά Όργανα";
$games="Ηλεκτρονικά Παιχνίδια";

echo 
'
<div class="sideNav mt-4">
    <ul class="category-list roundedForms">
        <li style="background-color: #dfdfdf;"><h3 style="font-size: 20px;"><b>Κατηγορίες:</h3></b></li>
        <li><hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;"></li>
        <li><b><a href="prod_categories.php?link='.$pc.'"" class="category-links">Υπολογιστές</a></b></li>
        <li><b><a href="prod_categories.php?link='.$jewellery.'" class="category-links">Κοσμήματα</a></b></li>
        <li><b><a href="prod_categories.php?link='.$music_organs.'" class="category-links">Μουσικά Όργανα</a></b></li>
        <li><b><a href="prod_categories.php?link='.$games.'" class="category-links">Ηλεκτρονικά Παιχνίδια</a></b></li>


        <li><hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;"></li>
        <li><b><a href="#" class="category-links">Φωτογραφία & Βίντεο</a></b></li>
        <li><b><a href="#" class="category-links">Ρολόγια</a></b></li>
        <li><b><a href="#" class="category-links">Αθλητικά Είδη</a></b></li>
        <li><b><a href="#" class="category-links">Βιβλία</a></b></li>
        <li><b><a href="#" class="category-links">Δώρα & Gadgets</a></b></li>
        <li><b><a href="#" class="category-links">Μουσική</a></b></li>
    </ul>
</div>   
';
?>
