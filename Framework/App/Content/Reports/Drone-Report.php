<html>
    <head>
        <script src="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Reports/Reports.js"></script>
        <link href="http://127.0.0.1/Home-Server-Website/Framework/App/Content/Reports/Reports.css" rel="Stylesheet" />
    </head>
    <body>
        <div class="Report-Container">
            <div class="Report">
                <div class="Report-Description">
                    <p>Do SQL Script Later</p>
                </div>
                <div class="Report-Group">
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
                        // Get Records
                        $Total_Flights = "SELECT COUNT(`Device`) AS Total_Flights FROM devices WHERE Device = 'Drone'";
                        $Total_Flights_Result = $conn->query($Total_Flights);
                        // Total Flights
                        if ($Total_Flights_Result->num_rows > 0) {
                            // output data of each row
                            while ($Flights_Row = $Total_Flights_Result->fetch_assoc()) {
                                $Total_Flights_Row = $Flights_Row['Total_Flights'];
                                echo "<p>Total Flights: $Total_Flights_Row Flights</p>";
                            }
                        }
                        $Total_Flight_Time = "SELECT SUM(`Device_Runtime`) AS Flight_Time FROM devices WHERE Device = 'Drone'";
                        $Total_Flight_Time_Result = $conn->query($Total_Flight_Time);
                        // Total Flight Time
                        if ($Total_Flight_Time_Result->num_rows > 0) {
                            // output data of each row
                            while ($Time_Row = $Total_Flight_Time_Result->fetch_assoc()) {
                                $Total_Time_Row = $Time_Row['Flight_Time'];
                                echo "<p>Total Time: $Total_Time_Row Minutes</p>";
                            }
                        }
                        $AVG_Flight_Time = "SELECT AVG(`Device_Runtime`) AS AVG_Time FROM devices WHERE Device = 'Drone'";
                        $AVG_Flight_Time_Result = $conn->query($AVG_Flight_Time);
                        // AVG Flight Time
                        if ($AVG_Flight_Time_Result->num_rows > 0) {
                            // output data of each row
                            while ($AVG_Row = $AVG_Flight_Time_Result->fetch_assoc()) {
                                $AVG_Time_Row = $AVG_Row['AVG_Time'];
                                echo "<p>AVG Time: $AVG_Time_Row Minutes</p>";
                            }
                        }
                        $LastFlown = "SELECT * FROM devices WHERE Device = 'Drone' ORDER BY Date DESC LIMIT 1 ";
                        $LastFlown_Result = $conn->query($LastFlown);
                        // Last Flown
                        if ($LastFlown_Result->num_rows > 0) {
                            // output data of each row
                            while ($LastFlown_Row = $LastFlown_Result->fetch_assoc()) {
                                date_default_timezone_set('America/Chicago');
                                $LastFlown_Date = $LastFlown_Row['Date'];
                                $Format_LastFlown = new DateTime($LastFlown_Date);
                                $Last = $Format_LastFlown->format('m-d-y');
                                echo "<p>Last Flown: ";
                                echo $Last;
                                echo "</p>";
                                $Today_Date = new DateTime();
                                $Today_Date_Format =  $Today_Date->format("m-d-y");
                                echo "<p>Today's Date: ";
                                echo $Today_Date_Format;
                                echo "</p>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>