var CurrentURL = window.location.href;
$(document).ready(function(){
	$("#ImportNav").load("http://127.0.0.1/Home-Server-Website/Framework/Layouts/Navbar/Navbar.php");
	//$("#ImportToast").load("http://127.0.0.1/Home-Server-Website/Framework/Notifications/Toasts/Updates.php");
})

function UpdatePage(){
	$(document).ready(function(){
		$("#ImportNotifications").load("http://127.0.0.1/Home-Server-Website/Framework/Notifications/Bar.php");
	});
}
function AppPage(){
	$(document).ready(function(){
		$("#ImportFUllApp").load("http://127.0.0.1/Home-Server-Website/Framework/App/App.php");
	});
}
if(CurrentURL == "http://127.0.0.1/Home-Server-Website/Pages/Updates.php"){
	UpdatePage();
}
if(CurrentURL == "http://127.0.0.1/Home-Server-Website/Pages/App.php"){
	AppPage();
}
