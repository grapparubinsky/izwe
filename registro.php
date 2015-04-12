<?php
$page="registrazione_territorio";
$title="IZWE > Registra un territorio";
$thead="Registra un territorio";
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
		    <label for="proclamtore">Proclamatore</label>
		    <input id="proclamatore" name="nome_proclamatore" type="text" value="">
		    <input type="hidden" id="id_p" name="id_p" value="">
		    <input type="button" class="btn btn-success" onclick="return submitForm();" value="Seleziona">
	   	 </form>
	   	</section>
	    <section id="results">
	    	<h3>Territori assegnati</h3>
	    	<div class="form_result">
	    		
	    	<div>
	    </section>
  	</div>
<script type="text/javascript">
	var options2 = {
		script:"ajax/proc.php?json=true&",
		varname:"proclamatore",
		json:true,
		callback: function (obj) { document.getElementById('id_p').value = obj.id; }
	};
	var as_json = new AutoSuggest('proclamatore', options2);
</script>
<script>
			function submitForm() {
			    $_js.ajax({type:'GET', url: 'ajax/terr.php', data:$_js('#ajaxform').serialize(), success: function(response) {
			        $_js('#results').find('.form_result').html(response);
			      
			    }});
			
			    return false;
			}

	function UpdateRecord() {
			    $_js.ajax({type:'POST', url: 'ajax/terr.php?insert', data:$_js('#grigliainsert').serialize(), success: function(response) {
			       
			      
			    }});
				
			    return false;
			}
	function AddRecord() {
			    $_js.ajax({type:'POST', url: 'ajax/terr.php?insert', data:$_js('#griglianew').serialize(), success: function(response) {
			       SubmitForm();
			      
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
