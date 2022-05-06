<?php 
//menampilkan data statistik
function tampil_gsc ($atts)
{
	$css = plugin_dir_url(__FILE__) . 'css/styled-table.css';
	$currentYear = date("Y");
	$id = $atts['id'];
	$style = $atts['style'];
	$url = plugin_dir_url(__FILE__) . 'gsc.php?user='.$id;
	echo $url;
	
	// Get the contents of the JSON file 
	$strJsonFileContents = wp_remote_retrieve_body(wp_remote_get($url));
	// Convert to array 
	$array = json_decode($strJsonFileContents, true);
    ob_start();
    ?>
	<!DOCTYPE html>
	<html>
	  <head>
		<link rel="stylesheet" href="<?php wp_enqueue_style('styled-table', $css); ?>">
	  </head>
	<body>
		<table class="<?php esc_attr_e($style); ?>">
		  <thead>
			<tr>
			  <th scope="col"></th>
			  <th scope="col">All</th>
			  <th scope="col">Since <?php esc_attr_e($currentYear-5); ?></th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <th>Citations</th>
			  <td data-title="citation"><?php esc_attr_e( $array["total_citations"] ); ?></td>
			  <td data-title="citation 5 years"><?php esc_attr_e( $array["total_citations since 2015"] ); ?></td>
			</tr>
			<tr>
			  <th>h-Index</th>
			  <td data-title="h-index"><?php esc_attr_e( $array["h-index"] ); ?></td>
			  <td data-title="h-index 5 years"><?php esc_attr_e( $array["h-index last 5 years"] ); ?></td>
			</tr>
			<tr>
			  <th>i10-Index</th>
			  <td data-title="i10-index"><?php esc_attr_e( $array["i10 index"] ); ?></td>
			  <td data-title="i10-index 5 years"><?php esc_attr_e( $array["i10-index last 5 years"] ); ?></td>
			</tr>
		  </tbody>
		</table>
	</body>
	</html>
	
<?php
    return ob_get_clean();
} ?>