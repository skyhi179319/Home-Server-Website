showSlides();
function showSlides() {
  $("#ImportResults").load("http://127.0.0.1/Home-Server-Website/Framework/App/Content/Photos/Slideshow/Set.php");
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}