<?php
$page="nuovo_proclamatore";
$title="IZWE > nuovo proclamatore";
$thead="Nuovo proclamatore";
include('include/config.php');
include('include/general.php');
include('include/functions.php');
if(!isset($_POST['nome'])) {

  $Body=<<<EOD

    <div id="content-wrapper">
      <section>
	  <h3>Informazioni personali</h3>
	  <form method="POST" action="">
	    <input name="nome" required type="text" value="" placeholder="Nome">
	    <input name="cognome" required type="text" value="" placeholder="Cognome">
      </section>
      <section>
      <section>
      	<h3>Gruppo di servizio</h3>
      	<label for="gruppo">Assegna al gruppo</label>
      	<input type="text" id="gruppo" name="gruppo" value="">
      	<input type="hidden" id="gruppo_id" name="gruppo_id" value="">
      </section>
    <input type="submit" value="Registra">
    </form>
    </div>
<script type="text/javascript">
	var options = {
		script:"ajax/proc.php?json=true&",
		varname:"gruppo",
		json:true,
		callback: function (obj) { document.getElementById('gruppo_id').value = obj.id; }
	};
	var as_json = new AutoSuggest('gruppo', options);
</script>
EOD;
} else {
  
$ins_proc=mysqli_query($mysqli, "INSERT INTO proclamatori (gruppo_id, nome, cognome) 
VALUES ('{$_POST['gruppo_id']}', '{$_POST['nome']}', '{$_POST['cognome']}')") or die(mysqli_error($mysqli));

$Body=<<<EOD
<div id="content-wrapper">
      <section>
	  <h3>Dati inseriti correttamente</h3>
      </section>
</div>
EOD;
}

echo $Header;
echo $Body;
echo $Footer;