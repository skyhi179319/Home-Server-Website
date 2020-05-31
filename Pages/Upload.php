<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://127.0.0.1//Home-Server-Website/Scripts/Jquery.js"></script>
    <script src="http://127.0.0.1//Home-Server-Website/Framework/Layouts/Main-Layout.js"></script>
    <link href="http://127.0.0.1//Home-Server-Website/Pages/Upload-form.css" rel="Stylesheet" />
    <link href="http://127.0.0.1//Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
</head>
<body>
<div id="ImportNav"></div>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "arizona";
$dbname = "main";
// Uploads Images To Main Database
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['upload_photo'])){

    $name = $_FILES['file']['name'];
    $target_dir = "127.0.0.1/Home-Server-Website/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
        // Convert to base64
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
        // Insert record
        $query = "insert into images(image,event_name) values('$image','$_POST[event]')";
        mysqli_query($conn,$query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    }

}
?>
<form class="UploadForm" method="post" action="" enctype='multipart/form-data'>
    <p>Event:</p>
    <input class="event_input" type="text" name="event"/>
    <input class="file_button" type='file' name='file' />
    <input class="submit_button" type='submit' value='Save Image' name='upload_photo'>
</form>
</body>
</html>
