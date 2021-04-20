<div class="d-flex justify-content-end search-container">
    <form name=search_form id=search_form method="post" action="search_products.php">
        <input class="searchInput" type="text" placeholder="Αναζήτηση.." id="searchID" name="searchID">
        <button class="btn-primary btnsearch"  type="submit"> <i class="fa fa-search"></i></button>
    </form>
</div>

<!-- onclick="SearchFunction()" -->
<!-- <script>
function SearchFunction(){
    var search_input = document.getElementById("searchID").value;
    validate_search = parseInt(search_input);

    if (!isNaN(validate_search)){
        search_input = parseInt(search_input);
    }
}
</script> -->