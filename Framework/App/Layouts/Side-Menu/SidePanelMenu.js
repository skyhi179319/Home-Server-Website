$(function(){
    $( "#menu" ).menu();
});
$(document).ready(function(){
	$( ".DetailText" ).each(function() {
		$(this).css("background-color","cornflowerblue");
    });
	$("#Load-Event-Pictures").click(function(){
		// Done
		$("#LoadContent").load("http://127.0.0.1/Home-Server-Website/Framework/App/Content/Photos/Rows/Pictures.php");
	});
	$("#Load-Event-Image-Table").click(function(){
		// Done
		$("#LoadContent").load("http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Images/Table.php");
	});
	$("#Load-Event-Slideshow").click(function(){
		// Done
		$("#LoadContent").load("http://127.0.0.1/Home-Server-Website/Framework/App/Content/Photos/Slideshow/Slideshow.php");
	});
	$("#Load-Drone-Runtime-Chart").click(function(){
		// Done
		$("#LoadContent").load("http://127.0.0.1/Home-Server-Website/Framework/App/Content/Charts/Drone/Drone.php");
	});
	$("#Load-Drone-Runtime-Table").click(function(){
		// Done
		$("#LoadContent").load("http://127.0.0.1/Home-Server-Website/Framework/App/Content/Tables/Drone/ByDroneTable.php");
	});
	$("#Drone-Report").click(function(){
		// Done
		$("#LoadContent").load("http://127.0.0.1/Home-Server-Website/Framework/App/Content/Reports/Drone-Report.php");
	});
	$("#Light-Mode").click(function(){
		$(".MainWindow").css("background-color","aliceblue");
		$(".FullProgram").css("background-color","lavender");
		$(".SidePanel").css("background-color","gainsboro")
	});
	$("#Dark-Mode").click(function(){
		$(".MainWindow").css("background-color","slategrey");
		$(".FullProgram").css("background-color","lightslategrey");
		$(".SidePanel").css("background-color","steelblue");
	});
	$("#Reset-Mode").click(function(){
		$(".MainWindow").css("background-color","ghostwhite");
		$(".FullProgram").css("background-color","ghostwhite");
		$(".SidePanel").css("background-color","cornflowerblue")
	});
	$("#Reset").click(function(){
		$("#LoadContent").empty();
	});
});