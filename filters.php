    <form id="filters_form">
        <ul class="category-list roundedForms">
            <li style="background-color: #dfdfdf;"><h3 style="font-size: 20px;"><b>Φίλτρα:</h3></b></li>
            <li><hr style="background-color: #0275d8; width: 100%; height: 100%; border-width:3px;"></li>
            <li style="background-color: #dfdfdf;"><h3 style="font-size: 16px;"><b>Κατάσταση:</h3></b></li>

            <li style="padding-left: 10px;">
                <input class="form-check-input" type="radio" name="condfilter" id="condfilter_all" value="condAll" checked onclick="validateFilters();">
                <label class="form-check-label" for="condfilter_all">Όλα</label>
            </li>
            <li style="padding-left: 10px;">
                <input class="form-check-input" type="radio" name="condfilter" id="condfilter_new" value="condNew" onclick="validateFilters();">
                <label class="form-check-label" for="condfilter_new">Καινούργιο</label>
            </li>
            <li style="padding-left: 10px;">
                <input class="form-check-input" type="radio" name="condfilter" id="condfilter_old" value="condOld" onclick="validateFilters();">
                <label class="form-check-label" for="condfilter_old">Μεταχειρισμένο</label>
            </li>
    
            <li style="background-color: #dfdfdf;"><h3 style="font-size: 16px; padding-top:20px;"><b>Είδος καταχώρησης:</h3></b></li>

            <li style="padding-left: 10px;">
                <input class="form-check-input" type="radio" name="typefilter" id="typefilter_all" value="typeAll" checked onclick="validateFilters();">
                <label class="form-check-label" for="typefilter_all">Όλες</label>
            </li>
            <li style="padding-left: 10px;">
                <input class="form-check-input" type="radio" name="typefilter" id="typefilter_auction" value="typeAuction" onclick="validateFilters();">
                <label class="form-check-label" for="typefilter_auction">Δημοπρασίες</label>
            </li>
            <li style="padding-left: 10px;">
                <input class="form-check-input" type="radio" name="typefilter" id="typefilter_sale" value="typeSale" onclick="validateFilters();">
                <label class="form-check-label" for="typefilter_sale">Πωλήσεις</label>
            </li>

            <li style="background-color: #dfdfdf;"><h3 style="font-size: 16px; padding-top:20px;"><b>Τιμή:</h3></b></li>

            <li>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <!-- <label for="startPrice">από:</label> -->
                    <input type="text" class="form-control" name="startPrice" id="startPrice" placeholder="από:">
                </div>
                <div class="form-group col-md-6">
                    <!-- <label for="endPrice">έως:</label> -->
                    <input type="text" class="form-control" name="endPrice" id="endPrice" placeholder="έως:">
                </div>
            </li>
            <li style="display:flex; justify-content: center;">
                <button class="btn btn-primary" type="button" onclick="validateFilters();">Εφαρμογή</button>
            </li>

            <li class="mt-4" style="display:flex; justify-content: center;">
                <button class="btn btn-primary" type="button" onclick="window.location.reload();">Καθαρισμός Φίλτρων</button>
            </li>

        </ul>
    </form>

