<link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Admin/Inventory/Table.css" rel="Stylesheet" />
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>

<div class="TableDiv">
    <div class="Search-Container">
        <input type="text" id="Search-Inventory-Item" placeholder="Search Item">
        <input type="text" id="Search-Inventory-Status" placeholder="Search Status">
        <input type="text" id="Search-Inventory-Number"placeholder="Search #">
    </div>
    <table class="DataTable" id="Inventory-Table" align="center">
        <tr class="TableHeaders">
            <th>Item</th>
            <th>On Hand</th>
            <th>Ordered</th>
            <th>Status</th>
            <th>Cost</th>
            <th>Product #</th>
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
        $sql = "SELECT inventory.Item, inventory.Amount as OnHand,Orders.Amount as Ordered, orders.Status, orders.Cost, product_id.Product_Id
                FROM inventory
                INNER JOIN orders ON inventory.Item=Orders.Item
                INNER JOIN product_id ON inventory.Item=product_id.Item ORDER BY Product_Id ASC";
        $result = $conn->query($sql);
        // Inventory Query: Pulling From Main Database
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $Item = $row["Item"];
                $OnHand = $row['OnHand'];
                $Ordered = $row['Ordered'];
                $Status = $row['Status'];
                $Cost = $row['Cost'];
                $Product_Id = $row['Product_Id'];
                echo "<tr class='TableRows'>";
                echo "<td>$Item</td>";
                echo "<td>$OnHand</td>";
                echo "<td>$Ordered</td>";
                echo "<td>$Status</td>";
                echo "<td>$$Cost</td>";
                echo "<td>$Product_Id</td>";
                echo "</tr>";
            }
        }
        else {
            echo "<tr class='TableRows'>";
            # colspan is full table
            echo "<td colspan='6'>0 results</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<div class="Product-Id-Div">
    <div class="Product-Id-Header">
        <p>Product ID Meaning</p>
    </div>
    <div class="Product-Id-Info">
        <div class="Product-Id-Block">
            <p>Marketing</p>
            <p>100-190</p>
            <p>Sellable</p>
            <p>200-290</p>
            <p>Supplies</p>
            <p>300-390</p>
        </div>
        <div class="Product-Id-Block">
            <p>Limited</p>
            <p>400-490</p>
            <p>Customers</p>
            <p>500-595</p>
        </div>
    </div>
</div>
<script src="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Admin/Inventory/Table.js"></script>