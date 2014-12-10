<?php
$page="consigliere_territorio";
$title="IZWE > Consigliere";

$css_class="style='background:#2acdd6;color:#FFF'";
include('include/config.php');
include('include/general.php');
include('include/functions.php');
$_js="\$";
if(!isset($_POST['id'])) {
 date_default_timezone_set('Europe/Rome');
 $currentYear = date('Y');
 $yearoption="";
        foreach (range($currentYear-1, $currentYear+3) as $value) {
        	if($value==$currentYear) $yearselected="selected"; else $yearselected="";
           $yearoption.= "<option value='$value' $yearselected>{$value}</option>";
        }
  $Body=<<<EOD
 
    <div style="padding:0 1em">
	      
		  	<h3>SCEGLI UNA ZONA</h3>
		  	<form id="ajaxform">
		  	<input type="hidden" name="priorita" value="">
		    <label for="zona">Zona</label>
				   <select name="zona">
				   	<option value="Grottaferrata">Grottaferrata</option>
				   	<option value="Frascati">Frascati</option>
				   </select>
		    <input type="button" onclick="return submitForm();" value="Seleziona">
		    <HR>
	   	 </form>
	   <div id="results">
	    	<div class="form_result">
	    		
	    	<div>
	   </div>
  	</div>
<script>
			function submitForm() {
			    $_js.ajax({type:'GET', url: 'ajax/terr.php', data:$_js('#ajaxform').serialize(), success: function(response) {
			        $_js('#results').find('.form_result').html(response);
			      
			    }});
			
			    return false;
			}

</script>

EOD;
}

echo $Head_ridotto;
echo $Body;
echo $Footer;