<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forns/Admin/Equipment/Check/Form.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<form class="InputForm" method="post" action="" enctype='multipart/form-data'>
    <p>Equipment Name:</p>
    <input class="inventory_input" type="text" name="Equipment_Name"/>
    <div class="InputForm_Radio_Section">
        <input class="inventory_radio" type="radio" name="Check" checked/>
        <label for="Check">Check</label>
        <input class="inventory_radio" type="radio" name="Uncheck"/>
        <label for="Uncheck">Uncheck</label>
    </div>
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
    if($_POST['Check']){
        // Delete record
        $query = "UPDATE equipment_check SEt Equipment_Check = '1' WHERE Equipment_Name = '$_POST[Equipment_Name]' ";
        mysqli_query($conn,$query);
    }
    if($_POST['Uncheck']){
        $query = "UPDATE equipment_check SEt Equipment_Check = '0' WHERE Equipment_Name = '$_POST[Equipment_Name]' ";
        mysqli_query($conn,$query);
    }
}
$conn->close();
?>