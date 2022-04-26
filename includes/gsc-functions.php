<?php 
//menampilkan data statistik
function tampil_gsc ($atts)
{
	$css = get_site_url() . "/wp-content/plugins/gsc-stat/css/styled-table.css";
	$currentYear = date("Y");
	$id = $atts['id'];
	$style = $atts['style'];
	$url = "https://code.akwijayanto.com/googlescholar-api/googlescholar.php?user=".$id;
	
 
	// Get the contents of the JSON file 
	$strJsonFileContents = wp_remote_retrieve_body(wp_remote_get($url));
	// Convert to array 
	$array = json_decode($strJsonFileContents, true);
    ob_start();
    ?>
	<!DOCTYPE html>
	<html>
	  <head>
		<link rel="stylesheet" href="<?php echo $css; ?>">
	  </head>
	<body>
		<table class="<?php echo $style; ?>">
		  <thead>
			<tr>
			  <th scope="col"></th>
			  <th scope="col">All</th>
			  <th scope="col">Since <?php echo $currentYear-5; ?></th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <th>Citations</th>
			  <td data-title="citation"><?php echo $array["total_citations"]; ?></td>
			  <td data-title="citation 5 years"><?php echo $array["total_citations since 2015"]; ?></td>
			</tr>
			<tr>
			  <th>h-Index</th>
			  <td data-title="h-index"><?php echo $array["h-index"]; ?></td>
			  <td data-title="h-index 5 years"><?php echo $array["h-index last 5 years"]; ?></td>
			</tr>
			<tr>
			  <th>i10-Index</th>
			  <td data-title="i10-index"><?php echo $array["i10 index"]; ?></td>
			  <td data-title="i10-index 5 years"><?php echo $array["i10-index last 5 years"]; ?></td>
			</tr>
		  </tbody>
		</table>
	</body>
	</html>
	
<?php
    return ob_get_clean();
} ?>