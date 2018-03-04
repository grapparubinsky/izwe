<?php
$page="consigliere_territorio";
$title="IZWE > Consigliere";

$css_class="style='background:#2acdd6;color:#FFF'";
include('include/config.php');
include('include/general.php');
include('include/functions.php');
$_js="\$";
if(!isset($_POST['id'])) {
	$sql_res=mysqli_query($mysqli, "SELECT id as value, name FROM campagne ORDER BY date_start DESC");
	$campaigns_select_options = "<option value=''>---</option>";
	while($row=mysqli_fetch_array($sql_res)) {
	                                $campaigns_select_options .= <<<EOD
                        <option value="{$row['value']}">{$row['name']}</option>
EOD;
	}


	$Body=<<<EOD
 
    <div style="padding:0 1em">
	      
		  	<h3>SCEGLI UNA CAMPAGNA</h3>
		  	<form id="ajaxform">
		    <label for="Campagna">Campagna</label>
				   <select name="id">
					$campaigns_select_options
				</select>
		    <input type="submit" value="Seleziona">
		    <HR>
	   	 </form>
	   <div id="results">
	    	<div class="form_result">
	    		
	    	<div>
	   </div>
  	</div>
<script>
EOD;
}

echo $Head_ridotto;
echo $Body;
echo $Footer;
