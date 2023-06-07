<?php 
$json = file_get_contents('https://api.hnb.hr/tecajn-eur/v3');


$json_data = json_decode($json,true);
		
print '
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	  body {
		width: 80%;
		margin: 0 auto;
	  }
	</style>
</head>
	<body>
		
			<table class="table">
				<thead>
					<tr>
						<th width="16">Number</th>
						<th width="42">Date</th>
						<th width="16">Country</th>
						<th width="16">Code</th>
						<th width="16">Quantity</th>
						<th width="32">Currency</th>
						<th width="100">Bought</th>
						<th width="100">Middle</th>
						<th width="100">Sold</th>
					</tr>
				</thead>
				<tbody>';
				foreach($json_data as $key => $value) { 
						
				print '
				<tr>
					<td>' . $json_data[$key]["broj_tecajnice"] . '</td>
					<td>' . $json_data[$key]["datum_primjene"] . '</td>
					<td>' . $json_data[$key]["drzava"] . '</td>
					<td>' . $json_data[$key]["drzava_iso"] . '</td>
					<td>' . $json_data[$key]["sifra_valute"] . '</td>
					<td>' . $json_data[$key]["valuta"] . '</td>
					<td>' . $json_data[$key]["kupovni_tecaj"] . '</td>
					<td>' . $json_data[$key]["srednji_tecaj"] . '</td>
					<td>' . $json_data[$key]["prodajni_tecaj"] . '</td>
				</tr>';
			}
			print '
			</tbody>
		</table>
	</body>
	<form action="http://localhost/ProjektNWP/index.php?menu=1">
<center><input type="submit" value="Back"> </center>
</form>
</html>';
	
?>