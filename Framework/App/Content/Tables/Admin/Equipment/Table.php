<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Admin/Equipment/Table.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<div class="TableDiv">
    <div class="Search-Container">
        <input type="text" id="Search-Equipment-Name" placeholder="Search Name">
        <input type="text" id="Search-Equipment-Used-By" placeholder="Search User">
        <input type="text" id="Search-Equipment-Number"placeholder="Search #">
    </div>
    <table class="DataTable" id="Equipment-Table" align="center">
        <tr class="TableHeaders">
            <th>Equipment</th>
            <th>Used By</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Equipment #</th>
            <th>Checked Out</th>
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
        $sql = "SELECT equipment.Equipment_Id , equipment.Equipment_Name, equipment_usage.Equipment_Used_By, equipment_usage.Equipment_Start_Date, equipment_usage.Equipment_End_Date,equipment_check.Equipment_Name, equipment_check.Equipment_Check
                FROM equipment
                LEFT JOIN equipment_usage ON equipment.Equipment_Name = equipment_usage.Equipment_Name
                LEFT JOIN equipment_check ON equipment.Equipment_Name = equipment_check.Equipment_Name ORDER BY Equipment_Id";
        $result = $conn->query($sql);
        // Inventory Query: Pulling From Main Database
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $Name = $row["Equipment_Name"];
                $Used_By = $row['Equipment_Used_By'];
                $Start_Date = $row['Equipment_Start_Date'];
                $End_Date = $row['Equipment_End_Date'];
                $Start_Date_Format = new DateTime($Start_Date);
                $End_Date_Format = new DateTime($End_Date);
                $Equipment_Id = $row['Equipment_Id'];
                $Equipment_Checked = $row['Equipment_Check'];
                echo "<tr class='TableRows'>";
                echo "<td>$Name</td>";
                echo "<td>$Used_By</td>";
                echo "<td>";
                echo $Start_Date_Format->format('m-d-y');
                echo "</td>";
                echo "<td>";
                echo $End_Date_Format->format('m-d-y');
                echo "</td>";
                echo "<td>$Equipment_Id</td>";
                if($Equipment_Checked == 1){
                    echo "<td>Checked</td>";
                }
                else{
                    echo "<td>Unchecked</td>";
                }
                echo "</tr>";
            }
        }
        else {
            echo "<tr class='TableRows'>";
            # colspan is full table
            echo "<td colspan='5'>0 results</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<script src="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Admin/Equipment/Table.js"></script>