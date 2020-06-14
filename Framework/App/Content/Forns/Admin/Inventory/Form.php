<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forns/Admin/Inventory/Form.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<form class="InputForm" method="post" action="" enctype='multipart/form-data'>
    <p>Item:</p>
    <input class="inventory_input" type="text" name="Item"/>
    <p>ID:</p>
    <input class="inventory_input" type="number" name="Product_ID"/>
    <p>Amount:</p>
    <input class="inventory_input" type="number" name="Amount"/>
    <p>Last Used:</p>
    <input class="inventory_input" type="date" name="Last_Used"/>
    <p>Last Ordered:</p>
    <input class="inventory_input" type="date" name="Last_Ordered"/>
    <p>Options</p>
    <div class="InputForm_Radio_Section">
        <input class="inventory_radio" type="radio" name="Add_New_Item"/>
        <label for="Add_New_Item">Add New Item</label>
        <input class="inventory_radio" type="radio" name="Add"/>
        <label for="Add">Add</label>
        <input class="inventory_radio" type="radio" name="Subtract"/>
        <label for="Subtract">Subtract</label>
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
    if($_POST['Add_New_Item']){
        // Insert record
        $query1 = "insert into inventory(Item,Amount,Last_Used,Last_Ordered) values('$_POST[Item]','$_POST[Amount]','$_POST[Last_Used]','$_POST[Last_Ordered]')";
        $query2 = "insert into product_id(Item,Product_Id) values('$_POST[Item]','$_POST[Product_ID]')";
        mysqli_query($conn,$query1);
        mysqli_query($conn,$query2);
    }
    if($_POST['Add']){
        // Update record
        $sql = "SELECT Amount FROM inventory WHERE Item = '$_POST[Item]'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $Total = $row["Amount"] + $_POST[Amount];
                $query = "UPDATE inventory SET Amount= '$Total' WHERE Item= '$_POST[Item]'";
                mysqli_query($conn,$query);
            }
        }
    }
    if($_POST['Subtract']){
        // Update record
        $sql = "SELECT Amount FROM inventory WHERE Item = '$_POST[Item]'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $Total = $row["Amount"] - $_POST[Amount];
                $query = "UPDATE inventory SET Amount= '$Total' WHERE Item= '$_POST[Item]'";
                mysqli_query($conn,$query);
            }
        }
    }
}
$conn->close();
?>