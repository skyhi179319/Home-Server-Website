function Search_Inventory(inputId,number) {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    table = document.getElementById("Inventory-Table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    // Number is the column to search from. Remember that arrays start at 0
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[number];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
$( "#Search-Inventory-Item" ).keyup(function() {
    Search_Inventory("Search-Inventory-Item",0);
});
$( "#Search-Inventory-Status" ).keyup(function() {
    Search_Inventory("Search-Inventory-Status",3);
});
$( "#Search-Inventory-Number" ).keyup(function() {
    Search_Inventory("Search-Inventory-Number",5);
});