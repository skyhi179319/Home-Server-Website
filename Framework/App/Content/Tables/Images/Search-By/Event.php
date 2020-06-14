<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="http://192.168.0.8/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Images/Table.css" rel="Stylesheet" />
<link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Images/Search-By/Event.css" rel="Stylesheet" />
<form class="SearchForm" method="post" action="" enctype='multipart/form-data'>
    <p>Event:</p>
    <input class="event_input" type="text" name="Event"/>
    <input class="submit_button" type='submit' value='Check Event' name='Check_Event'>
</form>
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
        if(isset($_POST['Check_Event'])){
            $sql = "SELECT image, event_name FROM images WHERE event_name='$_POST[Event]'";
            $result = $conn->query($sql);
            // Image Query: Pulling From Main Database
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $event = $row["event_name"];
                    $image_src = $row['image'];
                    echo "<tr class='TableRows'>";
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
                echo "<tr class='TableRows'>";
                # colspan is full table
                echo "<td colspan='2'>0 results</td>";
                echo "</tr>";
            }
        }
        echo "<tr class='TableRows'";
        # colspan is full table
        echo "<td colspan='2'><a href='http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Images/Search-By/Event.php'>Refresh</a></td>";
        echo "</tr>";

        echo "</table>";
        echo "</div>";
        $conn->close();
        ?>