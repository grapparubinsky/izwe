<?php

if(!$css_class) $css_class=""; 

$Head_ridotto=<<<EOD
<!DOCTYPE html>
<html lang="it">
<head>
  	<meta charset='utf-8'>
   	<title>$title</title>
 	<link rel="stylesheet" href="{$BASE_URL}/css/style.css">
  	<script type="text/javascript" src="{$BASE_URL}/js/bsn.AutoSuggest_c_2.0.js"></script>
	<link rel="stylesheet" href="{$BASE_URL}/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
	<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
<body $css_class>

EOD;

$Header=<<<EOD
$Head_ridotto
  <div id="header-wrapper">
	  <div id="header">
		  <div class="logo">
			  <a href="{$BASE_URL}/"><h2>IZWE.</h2></a>
		  </div>
		  <h2 style="float:left">$thead</h2>
		  <div style="clear:both"></div>
	  </div>
  </div>
EOD;

$Footer=<<<EOD

<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'_blank','height=451,width=635');
	if (window.focus) {newwindow.focus()}
	return false;
}

function popitup_territorio(url) {
	newwindow2=window.open(url,'territorio','height=451,width=635');
	newwindow2.moveTo(300,100);
	if (window.focus) {newwindow2.focus()}
	return false;
}

</script>

</body>
</html>
EOD;
