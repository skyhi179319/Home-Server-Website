<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://127.0.0.1//Home-Server-Website/Scripts/Jquery.js"></script>
    <script src="http://127.0.0.1//Home-Server-Website/Framework/Layouts/Main-Layout.js"></script>
    <link href="http://127.0.0.1//Home-Server-Website/Pages/Delete-form.css" rel="Stylesheet" />
    <link href="http://127.0.0.1//Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
</head>
<body>
<div id="ImportNav"></div>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "arizona";
$dbname = "main";
// Deletes Images And Event Of The Given Name In The Text Box From The Main Database
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['delete_photo'])){

    // sql to delete a record
        $sql = "DELETE FROM images WHERE event_name = '$_POST[event]'";

        if ($conn->query($sql) === TRUE) {
        } else {
        }

        $conn->close();
    }
?>
<form class="DeleteForm" method="post" action="" enctype='multipart/form-data'>
    <p>Event:</p>
    <input class="event_input" type="text" name="event"/>
    <input class="submit_button" type='submit' value='Delete Images' name='delete_photo'>
</form>
</body>
</html>
