<div class="d-flex justify-content-end search-container">

    <form name=search_form id=search_form method="post" action="search_products.php">
        <span data-toggle="tooltip" data-placement="top" title="Αναζήτηση κωδικού προϊόντος ή αναζήτηση με λέξεις κλειδιά (κατηγορία ή υποκατηγορία ή όνομα)." Tooltip on top >
            <input class="searchInput" type="text" placeholder="Αναζήτηση.." id="searchID" name="searchID">
            <button class="btn-primary btnsearch" type="submit"> <i class="fa fa-search"></i> </button>
        </span>
    </form>
</div>


<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
