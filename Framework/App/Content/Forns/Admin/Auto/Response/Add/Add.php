<?php
header("Location: http://127.0.0.1/Home-Server-Website/Framework/App/Content/Forns/Admin/Auto/Add.php");
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
    $sql = "SELECT Amount FROM inventory WHERE Item = '$_POST[Item]'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $Total = $row["Amount"] + $_POST[Amount];
            $query = "UPDATE inventory SET Amount= '$Total' WHERE Item = '$_POST[Item]'";
            $Date = new DateTime();
            $Date_Format =  $Date->format("m-d-y");
            $Last_Used_Query = "UPDATE inventory SEt Last_Used = '$Date_Format' WHERE Item = '$_POST[Item]' ";
            mysqli_query($conn,$query);
            mysqli_query($conn,$Last_Used_Query);
        }
    }
}
$conn->close();
exit;
?>