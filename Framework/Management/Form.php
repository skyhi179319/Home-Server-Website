<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/Management/Form.css" rel="Stylesheet" />
<form class="InputForm" method="post" action="" enctype='multipart/form-data'>
    <div class="Main-Input-Dividers">
        <div class="Main-Input-Column">
            <p>Name:</p>
            <input class="Main-input" type="text" maxlength="30" name="Name"/>

        </div>
        <div class="Main-Input-Column">
            <p>Main Job:</p>
            <input class="Main-input" type="text" maxlength="30" name="Job"/>
        </div>
        <div class="Main-Input-Column">
            <p>Image</p>
            <input class="file_button" type="file" name="file"/>
        </div>
    </div>
    <input class="submit_button" type='submit' value='Insert' name='Insert_Record'>
</form>

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
if(isset($_POST['Insert_Record'])){

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
        $query = "insert into management(Name,Main_Job,Image) values('$_POST[Name]','$_POST[Job]','$image')";
        mysqli_query($conn,$query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    }

}