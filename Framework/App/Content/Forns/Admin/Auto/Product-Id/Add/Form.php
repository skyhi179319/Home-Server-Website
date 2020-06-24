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
$sql = "SELECT product_id.Product_Id,inventory.Item
            FROM inventory
            LEFT JOIN product_id ON inventory.Item=product_id.Item WHERE Product_Id = '$_GET[Product_Id]'";
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forns/Admin/Auto/Product-Id/Form.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<form class="InputForm" method="post" action="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forns/Admin/Auto/Response/Add/Add.php" enctype='multipart/form-data'>
    <p>Item:</p>
    <?php
        $Item_Query = $conn->query($sql);
        $row = $Item_Query->fetch_assoc();
        $Item = $row["Item"];
    ?>
    <input class="inventory_input" type="text" value="<?php echo $Item; ?>" name="Item"/>
    <p>Amount:</p>
    <input class="inventory_input" type="number" value="1" name="Amount"/>
    <input class="submit_button" id="Auto-Form-Button" type='submit' value='Insert' name='Insert_Record'>
</form>
<script src="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forns/Admin/Auto/Product-Id/Submit.js"></script>