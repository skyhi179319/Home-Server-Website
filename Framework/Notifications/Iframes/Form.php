<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Notifications/Iframes/Form.css" rel="Stylesheet" />
<form class="InputForm" method="post" action="" enctype='multipart/form-data'>
    <div class="Main-Input-Dividers">
        <div class="Main-Input-Headers">
            <p>Notification:</p>
            <p>Notification Type:</p>
            <p>Issued By:</p>
        </div>
        <div class="Main-Input-Section">
            <input class="Main-input" type="text" maxlength="30" name="Notification"/>
            <input class="Main-input" type="text" name="Notification_Type"/>
            <input class="Main-input" type="text" name="Notification_Issued_By"/>
        </div>
    </div>
    <input class="submit_button" type='submit' value='Insert' name='Insert_Record'>
    <div class="Notes">
        <h3>Notification Types</h3>
        <p>Updates: An Update To The Site</p>
        <p>Note: An Need To Do</p>
    </div>
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
    $query = "insert into notifications(Notification,Notification_Type,Issued_By) values('$_POST[Notification]','$_POST[Notification_Type]','$_POST[Notification_Issued_By]')";
    mysqli_query($conn,$query);
}
$conn->close();
?>