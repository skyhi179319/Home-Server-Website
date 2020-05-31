<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/App/Content/Tables/Images/Table.css" rel="Stylesheet" />
<div class="TableDiv">
    <!-- Uploads Images And Event Names From Computer And Mobile Browsers -->
    <table class="DataTable" align="center">
        <tr class="TableHeaders">
            <th>Image</th>
            <th>Event</th>
        </tr>
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
$sql = "SELECT image, event_name FROM images";
$result = $conn->query($sql);
// Image Query: Pulling From AXC Database
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        $event = $row["event_name"];
        $image_src = $row['image'];
        echo "<tr>";
        echo "<td>";
        echo "<img src= '$image_src'>";
        echo "</td>";
        echo "<td>";
        echo "<p>$event</p>";
        echo "</td>";
        echo "</tr>";
    }
}
else {
    echo "<tr>";
    # colspan is full table
    echo "<td colspan='2'>0 results</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
$conn->close();
?>