<!DOCTYPE html>
<html>
<head>
	<title>area chart</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	title:{
		text: "In This Year2020"   
	},
	axisX: {
		interval: 1,
		intervalType: "month",
		valueFormatString: "MMM"
	},
	axisY:{
		title: "User Visit In Covid-19",
		includeZero: true,
		valueFormatString: "#0"
	},
	data: [{        
		type: "line",
		markerSize: 12,
		xValueFormatString: "MMM, YYYY",
		yValueFormatString: "###.#",
		dataPoints: [        
			{ x: new Date(2020, 00, 1), y: 100, indexLabel: "loss", markerType: "cross",  markerColor: "tomato" },
			{ x: new Date(2020, 01, 1), y: 150, indexLabel: "gain", markerType: "triangle",  markerColor: "#6B8E23" },
			{ x: new Date(2020, 02, 1) , y: 55, indexLabel: "loss", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2020, 03, 1) , y: 70, indexLabel: "loss", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2020, 04, 1) , y: 90, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23" },
			{ x: new Date(2020, 05, 1) , y: 20, indexLabel: "loss", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2020, 06, 1) , y: 250, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23" },
			{ x: new Date(2020, 07, 1) , y: 100, indexLabel: "loss", markerType: "cross", markerColor: "tomato" },
			{ x: new Date(2020, 08, 1) , y: 300, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23" },
			{ x: new Date(2020, 09, 1) , y: 500, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23" },
			{ x: new Date(2020, 10, 1) , y: 1000, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23" },
			{ x: new Date(2020, 11, 1) , y: 1100, indexLabel: "gain", markerType: "triangle", markerColor: "#6B8E23" }
		]
	}]
});
chart.render();

}
</script>

</head>

<body class="body1" background="./Images/1.jpg">
	<div class="main">
			<div class="logo">
				<img src="./Images/logo1.png">
			</div>
			
			<ul>
			  	<li><a href="home.php">Home</a> </li>
				<li><a href="../Pages/watchgame.php">Menu</a> </li>
				<li><a href="contact.php">Contact</a> </li>
				<li><a href="../Pages/about.php">About</a> </li>
				<li><a href="login.php">LOGIN</a> </li>
			</ul>
		</div>
<br><br><br><br><br><br><br><br>
	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<br><br><br><br><br><br><br><br>
<p><h3 align="center">This resturant is admited by FDA and health reconization 0085 licenes in 2008 august</h2></p>
	<br><br><br>
	<div align="center">
		<img src="images/certificate.jpg" width="230" height="200" class="img">
		</div>
		<br>
		<div align="center" class="fbb">
			<h4>Serve Safe Certificate 2010/2015</h2>
			<h4>National Resturant Association</h2>
		</div>
<br><br><br><br><br><br><br><br>
<br><br><br>

 <footer class="footer">
    <h4 align="center"><a href="../Pages/index.html">www.rollingstone.com&copy;</a></h4>
    </footer>

</body>
</html>