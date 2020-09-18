<?php
function Display(){
    function Need_To_Do(){
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
        $Cue = "SELECT * FROM notifications WHERE Notification_Type = 'Notes' ORDER BY Date_Time DESC LIMIT 1";
        $result = $conn->query($Cue);
        // Data Query: Pulling From Main Database
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $Notification = $row["Notification"];
                echo "<p class='Toast-NeedToDO'>$Notification</p>";
            }
        }
        else{
            echo "<p class='Toast-NeedToDO'>Nothing Yet</p>";
        }
        $conn->close();
    }
    function New_Updates(){
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
        $Cue = "SELECT * FROM notifications WHERE Notification_Type = 'Updates' ORDER BY Date_Time DESC LIMIT 1";
        $result = $conn->query($Cue);
        // Data Query: Pulling From Main Database
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $Notification = $row["Notification"];
                echo "<p class='Toast-NewUpdates'>$Notification</p>";
            }
        }
        $conn->close();
    }
    function Old_Updates(){
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
        $Cue = "SELECT * FROM notifications WHERE Notification_Type = 'Updates' ORDER BY Date_Time DESC LIMIT 1 OFFSET 1";
        $result = $conn->query($Cue);
        // Data Query: Pulling From Main Database
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $Notification = $row["Notification"];
                echo "<p class='Toast-OldUpdates'>$Notification</p>";
            }
        }
        $conn->close();
    }
    echo "<div class='Info-Group'>";
        Need_To_Do();
        New_Updates();
        Old_Updates();
    echo "</div>";
}
Display();
?>