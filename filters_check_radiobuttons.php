<script>
// check sub-categories
if(document.getElementById('pcAll').checked) {
    sub_category_name = ""; 
}else if(document.getElementById('cpu').checked) {
    sub_category_name = "Επεξεργαστές" 
}else if(document.getElementById('gpu').checked) {
    sub_category_name = "Κάρτες Γραφικών"
}else if(document.getElementById('monitor').checked) {
    sub_category_name = "Οθόνες"
}else if(document.getElementById('mobo').checked) {
    sub_category_name = "Μητρικές Κάρτες"
}else if(document.getElementById('pcGeneral').checked) {
    sub_category_name = "Περιφερειακά"
}else if(document.getElementById('jewelleryAll').checked) {
    sub_category_name = "";
}else if(document.getElementById('neckless').checked) {
    sub_category_name = "Κολιέ";
}else if(document.getElementById('bracelets').checked) {
    sub_category_name = "Βραχιόλια";
}else if(document.getElementById('rings').checked) {
    sub_category_name = "Δαχτυλίδια";
}else if(document.getElementById('earings').checked) {
    sub_category_name = "Σκουλαρίκια";
}else if(document.getElementById('musicInstrumentsfiltersAll').checked) {
    sub_category_name = "";
}else if(document.getElementById('e_guitars').checked) {
    sub_category_name = "Ηλεκτρικές Kιθάρες";
}else if(document.getElementById('c_guitars').checked) {
    sub_category_name = "Κλασσικές Kιθάρες";
}else if(document.getElementById('bass').checked) {
    sub_category_name = "Μπάσο";
}else if(document.getElementById('keys').checked) {
    sub_category_name = "Πλήκτρα";
}else if(document.getElementById('gamesfiltersAll').checked) {
    sub_category_name = "";
}else if(document.getElementById('PS4').checked) {
    sub_category_name = "PS4";
}else if(document.getElementById('PS5').checked) {
    sub_category_name = "PS5";
}else if(document.getElementById('PC_games').checked) {
    sub_category_name = "PC";
}else if(document.getElementById('XBOX').checked) {
    sub_category_name = "XBOX";
}

// check condition
if(document.getElementById('condfilter_all').checked) {
    condfilter = ""; 
}else if(document.getElementById('condfilter_new').checked) {
    condfilter = "Καινούργιο" 
}else if(document.getElementById('condfilter_old').checked) {
    condfilter = "Μεταχειρισμένο"
}

// check type
if(document.getElementById('typefilter_all').checked) {
    typeFilter = ""
}else if(document.getElementById('typeAuction').checked) {
    typeFilter = "Δημοπρασία"
}else if(document.getElementById('typefilter_sale').checked) {
    typeFilter = "Πώληση"
}

</script>
