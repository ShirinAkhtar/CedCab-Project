<?php
/**
 * Template File Doc Comment
 * 
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
require 'header2.php';
require 'class.php';
$Ride = new Ride();  
$dataPoints = $Ride->avilable_rides1('tfare as y, Rdate as label', 'status=1', 'Rdate', 'ASC');
?>
<html>
	<head>
		<title>CedCab</title>
		<link type="text/css" rel="stylesheet" href="style2.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
		window.onload = function() {
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				title: {
					text: "Revenue Chart of CEDCAB"
				},
				axisY: {
					title: "Revenue",
					includeZero: true,
					prefix: "Rupees",
					suffix: ""
				},
				data: [{
					type: "bar",
					yValueFormatString: "#,##0.00",
					indexLabel: "{y}",
					indexLabelPlacement: "inside",
					indexLabelFontWeight: "bolder",
					indexLabelFontColor: "white",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();
		}
		</script>
	</head>

	<body style="background-color:white;padding-left:200px">
		<div id="chartContainer" style="height: 380px; width: 100%;"></div>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</body>
	<?php require 'footer.php' ?>
</html>