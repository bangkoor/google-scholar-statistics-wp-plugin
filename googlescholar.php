<?php

header('Content-Type: application/json; charset=utf-8');

if(!isset($_GET["user"]))
	exit -1;
$url = "https://scholar.google.com/citations?user=" . $_GET["user"];

# create and load the HTML
include('simple_html_dom.php');
$html = new simple_html_dom();
$html->load_file($url);


?>
