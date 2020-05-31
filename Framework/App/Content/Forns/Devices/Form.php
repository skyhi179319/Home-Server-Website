<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forms/Devices/Form.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<div class="Timer">
    <p><time>00:00:00</time></p>
    <button id="start">start</button>
    <button id="stop">stop</button>
    <button id="clear">clear</button>
</div>
<script src="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forms/Devices/Form.js"></script>
<form class="InputForm" method="post" action="" enctype='multipart/form-data'>
    <p>Device:</p>
    <input class="event_input_input" type="text" name="Device"/>
    <p>Runtime In Minutes:</p>
    <input class="event_input" type="number" name="Runtime"/>
    <p>Owned By:</p>
    <input class="event_input" type="text" name="OwnedBy"/>
    <p>Purpose:</p>
    <input class="event_input_input" type="text" name="Purpose"/>
    <p>Event:</p>
    <input class="event_input_input" type="text" name="Event"/>
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
    $query = "insert into devices(Device,Device_Runtime,OwnedBy,Purpose,Event_Name) values('$_POST[Device]','$_POST[Runtime]','$_POST[OwnedBy]','$_POST[Purpose]','$_POST[Event]')";
    mysqli_query($conn,$query);
}
$conn->close();
?>