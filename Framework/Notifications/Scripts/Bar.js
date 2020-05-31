$(document).ready(function(){
    $("#ImportUpdates").load("http://127.0.0.1/Home-Server-Website/Framework/Notifications/Toasts/Updates.php");
    $("#ImportDrones").load("http://127.0.0.1/Home-Server-Website/Framework/Notifications/Toasts/Drone.php");
    var Maximize_button = document.getElementById("DisableMaximizeButton");
    var Iframe = document.getElementById("Notification-Insert-Frame");
    var info = document.getElementById("Box-Content");
    function Effects(button){
        var Button_Effects = document.getElementById(button);
        Button_Effects.classList.add("Notifications-Header-Button-Text-Effects");
    }
    Maximize_button.disabled = true;
    Iframe.style.display = "none";
    Iframe.style.marginLeft = "24.7em";
    Iframe.style.marginTop = "10px";
    Iframe.style.border = "none";
    info.style.marginLeft = "30px";
    Effects("Text-Shadow-Effect-Button1");
    Effects("Text-Shadow-Effect-Button2");
    Effects("Text-Shadow-Effect-Button3");
});
function DeleteNotificationBox(element){
    var box = document.getElementById(element);
    function Disappear(){
        box.classList.add("Notifications-Box-Animation-Disappear")
    }
    function RemoveBox() {
        box.remove();
    }
    // Not To Self: Please Realize That If You Press OK It Closes The Notification Bar
    var Main_Confirm = confirm("Are You Sure You Want To Close The Notification Bar?");
    if(Main_Confirm == true){
        Disappear();
        setTimeout(RemoveBox,4000)
    }
    else{
        console.log("You Have Decided Not To Close The Notification Bar")
    }
}
function MinimizeBox() {
    var box = document.getElementById("Notifications-Box");
    var header = document.getElementById("Box-Header");
    var Minimize_button = document.getElementById("DisableMinimizeButton");
    var Maximize_button = document.getElementById("DisableMaximizeButton");
    var info = document.getElementById("Box-Content");
    function Minimize(){
        box.classList.remove("Notifications-Box-Animation-Minimize")
    }
    function Event(){
        box.classList.remove("Notifications-Box-Animation-Appear")
        box.classList.add("Notifications-Box-Animation-Minimize")
        box.style.height = "22px";
        box.style.width = "500px";
        header.style.backgroundColor = "black";
        header.style.color = "whitesmoke";
        Minimize_button.disabled = true;
        Maximize_button.disabled = false;
        info.style.display = "none";
    }
    Event();
    setTimeout(Minimize,4000);
}
function MaximizeBox() {
    var Iframe = document.getElementById("Notification-Insert-Frame");
    var box = document.getElementById("Notifications-Box");
    var header = document.getElementById("Box-Header");
    var Minimize_button = document.getElementById("DisableMinimizeButton");
    var Maximize_button = document.getElementById("DisableMaximizeButton");
    var info = document.getElementById("Box-Content");
    function Maximize(){
        box.classList.remove("Notifications-Box-Animation-Maximize");
    }
    function Event(){
        Iframe.style.display = "none";
        box.classList.add("Notifications-Box-Animation-Maximize");
        box.style.height = "164px";
        box.style.width = "500px";
        header.style.backgroundColor = "whitesmoke";
        header.style.color = "black";
        Minimize_button.disabled = false;
        Maximize_button.disabled = true;
        info.style.display = "flex";
    }
    Event();
    setTimeout(Maximize,4000);
}
function Display_Mode(mode){
    var box = document.getElementById("Notifications-Box");
    var header = document.getElementById("Box-Header");
    if(mode == "Normal"){
        box.style.backgroundColor = "cornsilk";
        if(header.style.backgroundColor == "black"){
            console.log("Can't Change Color")
        }
        else{
            header.style.backgroundColor = "whitesmoke";
        }

    }
    if(mode == "Light-Grey"){
        box.style.backgroundColor = "lightsteelblue";
        if(header.style.backgroundColor == "black"){
            console.log("Can't Change Color")
        }
        else{
            header.style.backgroundColor = "lightgrey";
        }
    }
    if(mode == "Dark-Grey"){
        box.style.backgroundColor = "dimgrey";
        if(header.style.backgroundColor == "black"){
            console.log("Can't Change Color")
        }
        else{
            header.style.backgroundColor = "darkgrey";
        }
    }
}
function InsertNotificationFrame() {
    var Iframe = document.getElementById("Notification-Insert-Frame");
    var box = document.getElementById("Notifications-Box");
    if(box.style.height == "22px"){
        console.log("No Action Needed");
    }
    else{
        MinimizeBox();
    }
    function InsertNotification(){
        Iframe.style.display = "block";
    }
    setTimeout(InsertNotification,4000);
}