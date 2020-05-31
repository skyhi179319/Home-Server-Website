<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Drone/Table.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<div class="TableDiv">
    <!-- Device Runtime For Computer And Mobile Browsers -->
    <table class="DataTable" align="center">
        <tr class="TableHeaders">
            <th>Device</th>
            <th>Runtime</th>
            <th>Owned By</th>
            <th>Purpose</th>
            <th>Event Name</th>
            <th>Date</th>
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
$Cue1 = "SELECT * FROM devices WHERE Device = 'Drone' ORDER BY Date DESC LIMIT 4 ";
$result1 = $conn->query($Cue1);
$Cue2 = "SELECT * FROM devices WHERE Device = 'Drone' ORDER BY Date DESC LIMIT 100 OFFSET 4";
$result2 = $conn->query($Cue2);
// Data Query: Pulling From Main Database
if ($result1->num_rows > 0) {
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
        $Device = $row1["Device"];
        $Device_Runtime = $row1['Device_Runtime'];
        $OwnedBy = $row1['OwnedBy'];
        $Purpose = $row1['Purpose'];
        $Event_Name = $row1['Event_Name'];
        $Date = $row1['Date'];
        $Format = new DateTime($Date);
        echo "<tr>";
        echo "<td>$Device</td>";
        echo "<td>$Device_Runtime</td>";
        echo "<td>$OwnedBy</td>";
        echo "<td>$Purpose</td>";
        echo "<td>$Event_Name</td>";
        echo "<td>";
        echo $Format->format('m-d-y');
        echo  "</td>";
        echo "</tr>";
    }
    echo "<tr>";
    echo "<td colspan='6'><button id='ShowDropdownTable'>Show Results</button><button id='HideDropdownTable'>Hide Results</button></td>";
    echo  "</tr>";
    // table
    if ($result2->num_rows > 0) {
        // output data of each row
        while($row2 = $result2->fetch_assoc()) {
            $Device2 = $row2["Device"];
            $Device_Runtime2 = $row2['Device_Runtime'];
            $OwnedBy2 = $row2['OwnedBy'];
            $Purpose2 = $row2['Purpose'];
            $Event_Name2 = $row2['Event_Name'];
            $Date2 = $row2['Date'];
            $Format2 = new DateTime($Date2);
            echo "<tr class='TableResults'>";
            echo "<td>$Device2</td>";
            echo "<td>$Device_Runtime2</td>";
            echo "<td>$OwnedBy2</td>";
            echo "<td>$Purpose2</td>";
            echo "<td>$Event_Name2</td>";
            echo "<td>";
            echo $Format2->format('m-d-y');
            echo  "</td>";
            echo "</tr>";
        }
    }
}
else {
    echo "<tr>";
    # colspan is full table
    echo "<td colspan='6'>0 results</td>";
    echo "</tr>";
}
$conn->close();
?>
    </table>
    <script src="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Drone/Table.js"></script>
</div>

