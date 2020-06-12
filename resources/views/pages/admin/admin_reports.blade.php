@extends('layouts.admin_layout')

<!---bar chart to show sales by month---->
<!---pie chart to show property sales by categories---->
@extends('layouts.admin_layout')


@section('content')

	<div class="tcard">
		<h1>PROPERTIES</h1>
		<table>
			<tr>
				<th>Property ID</th>
				<th>Sales_id</th>
				<th>Property Value</th>
        <th>month</th>
        <th>year</th>
        <th>category</th>
				<th>Commision	</th>
			</tr>

			<?php 		
			$property = DB::table('sales_and_invoice')->get();

				foreach ($property as $property) {
					echo "<tr><td>".$property->property_id;
					echo "</td><td>".$property->sales_id;
          echo "</td><td>".$property->property_value;
          echo "</td><td>".$property->month;
          echo "</td><td>".$property->year;
          echo "</td><td>".$property->category;
					echo "</td><td>".$property->commision."</td></tr>";
					}
			?>
		</table>
	</div>
@endsection
					<!--pie chart-->
	<?php
	//get no of sold properties by property id. complete labelling for sales by categories

	//count bungalows sold
	$result = mysql_query("SELECT count(bungalow) from sales_and_invoice;");
	$bungalows=mysql_result($result, 0);

	//count bedsitters sold
	$result1 = mysql_query("SELECT count(bedsitter) from sales_and_invoice;");
	$bedsitters=mysql_result($result1, 0);

	//count townhouse sold
	$result2 = mysql_query("SELECT count(townhouse) from sales_and_invoice;");
	$townhouses=mysql_result($result2, 0);

		$dataPoints = array(
			array("label"=> "Bungalow", "y"=> $bungalows),
			array("label"=> "Bedsitter", "y"=> $bedsitters),
			array("label"=> "townhouse", "y"=> $townhouses)
		);
			
		?>
		
	<script>
		window.onload = function () {
		
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			exportEnabled: true,
			title:{
				text: "Property sales by categories"
			},
			subtitles: [{
				text: "Number of properties sold by category"
			}],
			data: [{
				type: "pie",
				showInLegend: "true",
				legendText: "{label}",
				indexLabelFontSize: 16,
				indexLabel: "{label} - #percent%",
				yValueFormatString: "#,##0",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
 
}
	</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>        
@endsection


@section("js")

  <!-- Page level plugins -->
  <script src="{{ asset('js/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-bar-demo.js') }}"></script>
@endsection