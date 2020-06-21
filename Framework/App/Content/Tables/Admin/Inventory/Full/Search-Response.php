<html>
    <head>
        <link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
        <link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Admin/Inventory/Full/Search-Response.css" rel="Stylesheet" />
        <script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
    </head>
    <body>
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
        $sql = "SELECT product_id.Product_Id,inventory.Item,inventory.Amount as OnHand,Orders.Amount as Ordered, orders.Status,orders.Cost,inventory.Last_Used,inventory.Last_Ordered
            FROM inventory
            LEFT JOIN orders ON inventory.Item=Orders.Item
            LEFT JOIN product_id ON inventory.Item=product_id.Item WHERE Product_Id = '$_GET[Product_Id]'";
        function Product_Id(){
            // Inventory Query: Pulling From Main Database
            $Product_Id_Query = $GLOBALS['conn']->query($GLOBALS['sql']);
            if ($Product_Id_Query->num_rows > 0) {
                // output data of each row
                while ($row = $Product_Id_Query->fetch_assoc()) {
                    $Product_Id = $row["Product_Id"];
                    echo "<p>$Product_Id</p>";
                }
            }
        }
        function Product_Name(){
            // Inventory Query: Pulling From Main Database
            $Product_Name_Query = $GLOBALS['conn']->query($GLOBALS['sql']);
            if ($Product_Name_Query->num_rows > 0) {
                // output data of each row
                while ($row = $Product_Name_Query->fetch_assoc()) {
                    $Product_Name = $row["Item"];
                    echo "<p>$Product_Name</p>";
                }
            }
        }
        function Product_Quantity(){
            // Inventory Query: Pulling From Main Database
            $Product_Quantity_Query = $GLOBALS['conn']->query($GLOBALS['sql']);
            if ($Product_Quantity_Query->num_rows > 0) {
                // output data of each row
                while ($row = $Product_Quantity_Query->fetch_assoc()) {
                    $Product_OnHand = $row["OnHand"];
                    $Product_Ordered = $row["Ordered"];
                    echo "<p>On Hand: $Product_OnHand</p>";
                    echo "<p>Ordered: $Product_Ordered</p>";
                }
            }
        }
        function Product_Status(){
            // Inventory Query: Pulling From Main Database
            $Product_Status = $GLOBALS['conn']->query($GLOBALS['sql']);
            if ($Product_Status->num_rows > 0) {
                // output data of each row
                while ($row = $Product_Status->fetch_assoc()) {
                    $Product_Status_Row = $row["Status"];
                    $Product_Cost = $row["Cost"];
                    if($Product_Status_Row == null){
                        echo "<p>Unknown</p>";
                    }
                    else{
                        echo "<p>$Product_Status_Row</p>";
                    }
                    if($Product_Cost == null){
                        echo "<p>$0.00</p>";
                    }
                    else{
                        echo "<p>Cost: $$Product_Cost</p>";
                    }
                }
            }
        }
        function Product_Last_Used(){
            $Product_Last_Used_Query = $GLOBALS['conn']->query($GLOBALS['sql']);
            if ($Product_Last_Used_Query->num_rows > 0) {
                // output data of each row
                while ($row = $Product_Last_Used_Query->fetch_assoc()) {
                    $Product_Last_Used = $row["Last_Used"];
                    if($Product_Last_Used == null){
                        echo "<p>Last Used:</p>";
                        echo "<p>Never</p>";
                    }
                    else{
                        echo "<p>Last Used:</p>";
                        echo "<p>$Product_Last_Used</p>";
                    }
                }
            }
        }
        function Product_Last_Ordered(){
            $Product_Last_Ordered_Query = $GLOBALS['conn']->query($GLOBALS['sql']);
            if ($Product_Last_Ordered_Query->num_rows > 0) {
                // output data of each row
                while ($row = $Product_Last_Ordered_Query->fetch_assoc()) {
                    $Product_Last_Ordered = $row["Last_Ordered"];
                    if($Product_Last_Ordered == null){
                        echo "<p>Last Ordered:</p>";
                        echo "<p>Unknown</p>";
                    }
                    else{
                        echo "<p>Last Ordered:</p>";
                        echo "<p>$Product_Last_Ordered</p>";
                    }

                }
            }
        }
        ?>
        <div class="Product-Info">
            <div class="Product-Id-Header">
                <?php
                    Product_Id();
                ?>
            </div>
            <div class="Product-Container">
                <div class="Product-Name">
                    <?php
                        Product_Name();
                    ?>
                </div>
                <div class="Product-Info-Container">
                    <div class="Product-Inventory">
                        <div class="Product-Inventory-Left">
                            <div class="Product-Box">
                                <?php
                                    Product_Quantity();
                                ?>
                            </div>
                            <div class="Product-Box">
                                <?php
                                    Product_Status();
                                ?>
                            </div>
                        </div>
                        <div class="Product-Inventory-Right">
                            <div class="Product-Box">
                                <?php
                                    Product_Last_Used();
                                ?>
                            </div>
                            <div class="Product-Box">
                                <?php
                                    Product_Last_Ordered();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


