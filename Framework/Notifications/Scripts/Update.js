$("#ImportInfo1").load("http://127.0.0.1/Home-Server-Website/Framework/Notifications/Toasts/Update_Sets.php");
function Auto_Reload() {
    $("#ImportInfo1").load("http://127.0.0.1/Home-Server-Website/Framework/Notifications/Toasts/Update_Sets.php");
    console.log("5 Minutes");
}
setInterval(Auto_Reload, 300000);