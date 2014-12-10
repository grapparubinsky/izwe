<?php
$page="cronologia_territorio";
$title="IZWE > Cronologia";
$thead="Cronologia Territori";
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
    <div id="content-wrapper">
	      <section>
		  	<h3>Seleziona</h3>
		  	<form id="ajaxform">
		  	<input type="hidden" name="cronologia" value="">
		    <label for="territorio_n">Territorio N.</label>
		    <input id="territorio_n" name="territorio_n" style="width:50px" type="text" value="">
		    <label for="data_uscita">Data uscita</label>
		    <input id="data_uscita" name="data_uscita" type="date" value="">
		    <label for="data_rientro">Data rientro</label>
		    <input id="data_rientro" name="data_rientro" type="date" value="">
		   <div class="btn btn-success" onclick="return submitForm();">Seleziona</div>
	   	 </form>
	   	</section>
	    <section id="results">
	    	<h3>Cronologia totale</h3>
	    	<div class="form_result">
	    		
	    	<div>
	    </section>
  	</div>
<script>
			function submitForm() {
			    $_js.ajax({type:'GET', url: 'ajax/terr.php', data:$_js('#ajaxform').serialize(), success: function(response) {
			        $_js('#results').find('.form_result').html(response);
			      
			    }});
			
			    return false;
			}

	function UpdateRecord() {
			    $_js.ajax({type:'GET', url: 'ajax/terr.php?insert', data:$_js('#grigliainsert').serialize(), success: function(response) {
			       
			      
			    }});
			
			    return false;
			}
</script>
</script>
EOD;
}

echo $Header;
echo $Body;
echo $Footer;