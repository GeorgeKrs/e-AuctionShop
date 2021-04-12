<div class="d-flex justify-content-end search-container">
    <form name=search_form id=search_form method="post">
        <input class="searchInput" type="text" placeholder="Αναζήτηση.." id="searchID" name="search">
        <button class="btn-primary btnsearch" onclick="SearchFunction()" type="button"><i class="fa fa-search"></i></button>
    </form>
</div>

<script>
function SearchFunction(){
    var search_input = document.getElementById("searchID").value;
    validate_search = parseInt(search_input);

    if (!isNaN(validate_search)){
        search_input = parseInt(search_input);
    }

    formData = new FormData();
    formData.append("search_input",search_input);

    // alert(typeof(search_input));
    // alert(search_input);

    $.ajax({
        url: 'search_products_backend.php',
        enctype: 'multipart/form-data',
        type: "POST",
        cache: false, 
        processData: false,
        contentType: false,
        data: formData, 
        success: function(data) {
            $('#result_search').html(data);
        }
    });
    window.location.href = "search_products.php";

    

}
</script>