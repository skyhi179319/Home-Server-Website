<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forns/Admin/Equipment/Form.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<form class="InputForm" method="post" action="" enctype='multipart/form-data'>
    <p>ID:</p>
    <input class="inventory_input" type="number" name="Equipment_ID"/>
    <p>Equipment:</p>
    <input class="inventory_input" type="text" name="Equipment_Name"/>
    <input class="submit_button" type='submit' value='Insert' name='Insert_Record'>
</form>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "arizona";
$dbname = "main";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['Insert_Record'])){
    // Insert record
    $query1 = "insert into equipment(Equipment_Id,Equipment_Name) values('$_POST[Equipment_ID]','$_POST[Equipment_Name]')";
    mysqli_query($conn,$query1);
}
$conn->close();
?>