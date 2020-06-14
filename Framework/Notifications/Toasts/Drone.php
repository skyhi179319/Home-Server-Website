<link rel="Stylesheet" href="http://127.0.0.1/Home-Server-Website/Framework/Notifications/Scripts/Toast.css">
<script src="http://127.0.0.1/Home-Server-Website/Framework/Notifications/Scripts/Toast.js"></script>
<body>
<div class="Toast-Box Toast-Box-Animation-Appear" id="Toast-Box-Drone">
    <div class="Toast-Content-Header">
        <div class="Content-Header">
            <p class="Header">Drone</p>
            <button class="Toast-Box-Close" id="Close-Drone-Toast">
                <span>&times;</span>
            </button>
        </div>
    </div>
    <div class="Toast-Content">
        <div class="Single">
            <div class="Single-Info">
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
                $Cue = "SELECT * FROM devices WHERE Device = 'Drone' ORDER BY Date DESC LIMIT 1";
                $result1 = $conn->query($Cue);
                // Data Query: Pulling From AXC Database
                if ($result1->num_rows > 0) {
                    // output data of each row
                    while ($row1 = $result1->fetch_assoc()) {
                        $Device = $row1["Device"];
                        $Device_Runtime = $row1['Device_Runtime'];
                        $Purpose = $row1['Purpose'];
                        $Event_Name = $row1['Event_Name'];
                        $Date = $row1['Date'];
                        $Format = new DateTime($Date);
                        echo "<div class='Box'>";
                        echo "<p class='Device'>$Device</p>";
                        echo "<p class='Time'>$Device_Runtime</p>";
                        echo "<p class='Date'>";
                        echo $Format->format('m-d-y');
                        echo "</p>";
                        echo "</div>";
                        echo "<div class='Box'>";
                        echo "<p class='Purpose'>$Purpose</p>";
                        echo "<p class='Event'>$Event_Name</p>";
                        echo "</div>";
                    }
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</div>
</body>