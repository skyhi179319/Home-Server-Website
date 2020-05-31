$( function() {
    $( "#dialog" ).dialog({
        width: 700,
        height: 500
    });
} );
showSlides();

function showSlides() {
    $("#ImportResults1").load("http://127.0.0.1/Home-Server-Website/Framework/App/Content/Photos/Rows/Set.php");
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}