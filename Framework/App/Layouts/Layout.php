<!doctype html>
<head>
    <script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
    <script src="http://127.0.0.1/Home-Server-Website/Framework/App/Layouts/Layout.js"></script>
    <script src="http://127.0.0.1/Home-Server-Website/Framework/App/Layouts/Layout_Button_Functions.js"></script>
    <link href="http://127.0.0.1/Home-Server-Website/Framework/App/Layouts/Layout.css" rel="Stylesheet" />
</head>
<body>
    <div class="FullProgram" id="Full-Program">
        <div class="Content-Header" id="Program-Header">
            <button class="Program-Close" onclick="DeleteBox('Full-Program')">
                <span>&times;</span>
            </button>
            <button class="Program-Minimize" id="DisableProgramMinimizeButton" onclick="MinimizeProgram()">
                <span>-</span>
            </button>
            <button class="Program-Maximize" id="DisableProgramMaximizeButton" onclick="MaximizeProgram()">
                <span>+</span>
            </button>
        </div>
        <div class="SidePanel" id="SidePanel-Menu">
            <div class="Content-Header">
                <p class="Header">Menu</p>
                <button class="Menu-Close" onclick="DeleteBox('SidePanel-Menu')">
                    <span>&times;</span>
                </button>
            </div>
            <div id="ImportSidePanelMenu"></div>
        </div>
        <div class="MainWindow" id="Content-Window">
            <div id="LoadContent"></div>
        </div>
    </div>
    <script src="http://127.0.0.1/Home-Server-Website/Framework/App/Layouts/Layout_Button_Functions.js"></script>
</body>
</html>