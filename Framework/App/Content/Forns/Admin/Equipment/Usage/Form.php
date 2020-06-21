<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forns/Admin/Equipment/Usage/Form.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<form class="InputForm" method="post" action="" enctype='multipart/form-data'>
    <p>Equipment:</p>
    <input class="inventory_input" type="text" name="Equipment_Name"/>
    <p>Used By:</p>
    <input class="inventory_input" type="text" name="Equipment_Used_By"/>
    <p>Start Date:</p>
    <input class="inventory_input" type="date" name="Start_Date"/>
    <p>End Date:</p>
    <input class="inventory_input" type="date" name="End_Date"/>
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
    $query1 = "insert into equipment_usage(Equipment_Name,Equipment_Used_By,Equipment_Start_Date,Equipment_End_Date) values('$_POST[Equipment_Name]','$_POST[Equipment_Used_By]','$_POST[Start_Date]','$_POST[End_Date]')";
    mysqli_query($conn,$query1);
}
$conn->close();
?>