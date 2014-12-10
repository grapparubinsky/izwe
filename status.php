<?php
$page="status_territorio";
$title="IZWE > Stato Registro";
$thead="Stato Registro";
include('include/config.php');
include('include/general.php');
include('include/functions.php');
$_js="\$";
if(!isset($_POST['id'])) {
 date_default_timezone_set('Europe/Rome');
 $currentYear = date('Y');

  $Body=<<<EOD
    <div id="content-wrapper">
	      <section>
		  	<h3>Seleziona</h3>
		  	<form id="ajaxform">
		  	<input type="hidden" name="status" value="">
		  	Filtra per:<br />
		   	<input type="checkbox" name="not_registered" value="">Da registrare <br />
		   	<input type="checkbox" name="in_scadenza" value="">In Scadenza <br />
		   	<input type="checkbox" name="scaduti" value="">Scaduti <br />
		    <input type="button" class="btn btn-success" onclick="return submitForm();" value="Seleziona">
	   	 </form>
	   	</section>
	    <section id="results">
	    	<h3>Status</h3>
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