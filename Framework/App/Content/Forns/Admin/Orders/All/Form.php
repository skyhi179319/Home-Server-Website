<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forns/Admin/Orders/All/Form.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<form class="InputForm" method="post" action="" enctype='multipart/form-data'>
    <p>Item:</p>
    <input class="inventory_input" type="text" name="Item"/>
    <p>Amount:</p>
    <input class="inventory_input" type="number" name="Amount"/>
    <p>Cost:</p>
    <input class="inventory_input" type="number" name="Cost" step="any"/>
    <p>Last Ordered:</p>
    <input class="inventory_input" type="date" name="Last_Ordered"/>
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
    $query = "insert into all_orders(Item,Amount,Cost,Last_Ordered) values('$_POST[Item]','$_POST[Amount]','$_POST[Cost]','$_POST[Last_Ordered]')";
    mysqli_query($conn,$query);
}
$conn->close();
?>