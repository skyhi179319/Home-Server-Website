<link rel="Stylesheet" href="http://127.0.0.1/Home-Server-Website/Framework/Notifications/Scripts/Bar.css">
<script src="http://127.0.0.1/Home-Server-Website/Scripts/Jquery.js"></script>
<script src="http://127.0.0.1/Home-Server-Website/Framework/Notifications/Scripts/Bar.js"></script>
<div class="Notifications-Bar Notifications-Box-Animation-Appear" id="Notifications-Box">
    <div class="Notifications-Content-Header">
        <div class="Content-Header" id="Box-Header">
            <p class="Notifications-Header">Notifications</p>
            <button class="Notifications-Box-Close" id="Close-Notification-Box">
                <span>&times;</span>
            </button>
            <button class="Notifications-Box-Minimize" id="DisableMinimizeButton" onclick="MinimizeBox()">
                <span>-</span>
            </button>
            <button class="Notifications-Box-Maximize" id="DisableMaximizeButton" onclick="MaximizeBox()">
                <span>+</span>
            </button>
            <button class="Notifications-Box-Light-Grey" id="Display-Mode-Light-Grey">
                <span id="Text-Shadow-Effect-Button1">LG</span>
            </button>
            <button class="Notifications-Box-Dark-Grey" id="Display-Mode-Dark-Grey">
                <span id="Text-Shadow-Effect-Button2">DG</span>
            </button>
            <button class="Notifications-Box-Normal" id="Display-Mode-Normal">
                <span id="Text-Shadow-Effect-Button3">N</span>
            </button>
            <!-- Iframe Appear Button -->
            <button class="Notifications-Insert-Button" id="Insert-Notification">Insert</button>
        </div>
    </div>
    <div class="Notifications-Bar-Content" id="Box-Content">
        <div id="ImportUpdates"></div>
        <div id="ImportDrones"></div>
    </div>
</div>
