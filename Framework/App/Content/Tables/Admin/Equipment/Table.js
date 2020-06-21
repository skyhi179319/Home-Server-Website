function Search_Equipment(inputId,number) {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    table = document.getElementById("Equipment-Table");
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
$( "#Search-Equipment-Name" ).keyup(function() {
    Search_Equipment("Search-Equipment-Name",0);
});
$( "#Search-Equipment-Used-By" ).keyup(function() {
    Search_Equipment("Search-Equipment-Used-By",1);
});
$( "#Search-Equipment-Number" ).keyup(function() {
    Search_Equipment("Search-Equipment-Number",4);
});