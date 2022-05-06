<?php
/*
  Plugin Name: GSC Statistics
  Description: Display citation statistics from Google Scholar based on user ID
  Version: 1.0.0
  Author: Arif Kurnia Wijayanto, M.Sc
  Author URI: https://akwijayanto.com
  License: GPLv2
*/

require_once plugin_dir_path(__FILE__) . 'gsc-functions.php';

add_shortcode("gsc", "tampil_gsc"); 
?>
