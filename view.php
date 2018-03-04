<?php
$page="view";
$title="Visualizza territori > IZWE";


if(isset($_GET['territorio_n'])) {
if(file_exists(__DIR__."/../territori/{$_GET['territorio_n']}.jpg")){
	$Body=<<<EOD
	<img width=100% src="{$BASE_URL}/territori/{$_GET['territorio_n']}.jpg" />
EOD;
} else {
	$Body=<<<EOD
	<embed src="{$BASE_URL}/territori/{$_GET['territorio_n']}.pdf#view=FitH" type="application/pdf" width="100%" height="100%" />
EOD;
}

} else {
	$css_class="style='background:#D37700;color:#FFF'";
include('include/config.php');
include('include/general.php');
	$Body= <<<EOD
  <div style="padding:0 1em">
      <h2>INSERISCI N° TERRITORIO</h2>
      <form method="get" action="">
	
	<input type="text" name="territorio_n" value="" placeholder="Territorio n.">
	<input type="submit" value="Apri">
	
</form>
	</div>
EOD;
}

echo $Head_ridotto;
echo $Body;
echo $Footer;
