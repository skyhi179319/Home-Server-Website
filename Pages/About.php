<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
    <script src="http://127.0.0.1/Home-Server-Website/Framework/Layouts//Main-Layout.js"></script>
    <link href="http://127.0.0.1//Home-Server-Website/Pages/About.css" rel="Stylesheet" />
    <link href="http://127.0.0.1/Home-Server-Website/Framework/Themes/Defualt.css" rel="Stylesheet" />
</head>
<body>
<div id="ImportNav"></div>
<div class="Profiles">
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
        $sql = "SELECT * FROM management ";
        $result = $conn->query($sql);
        // Profile Query: Pulling From Main Database
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $Name = $row['Name'];
                $Job = $row['Main_Job'];
                $image_src = $row['Image'];
                echo "<div class='Cards'>";
                echo "<img src= '$image_src'>";
                echo "<div class='Cards-Container'>";
                echo "<h4>$Name</h4>";
                echo "<p>$Job</p>";
                echo "</div>";
                echo "</div>";
            }
        }
    ?>
</div>
</body>
</html>