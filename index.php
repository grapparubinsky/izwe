<?php
$page="index";
$title="Territori > IZWE";
$thead="Home";
include('include/config.php');
include('include/general.php');

  $Body=<<<EOD

    <div id="content-wrapper">
      <section>
		  
		  <div class="box" style="background:#D6006E;color:#FFF;" ONCLICK="window.location.href='{$BASE_URL}/registro'">
		  		REGISTRO
		  </div>
		  <hr>
		  <div class="box" style="background:#1a936f;color:#FFF" ONCLICK="window.location.href='{$BASE_URL}/cronologia'">
		  		CRONOLOGIA
		  </div>
		  <div class="box" style="background:#00ccd3;color:#FFF" ONCLICK="window.location.href='{$BASE_URL}/status'">
		  		STATUS
		  </div>
		   <div class="box" style="background:#d37700;color:#FFF;" onclick="return popitup('{$BASE_URL}/view')">
		  		VIEW
		  </div>
		  
	  </section>
	</div>

EOD;


echo $Header;
echo $Body;
echo $Footer;

/*mostrare i territori ora out
todo list
 * 
lista territori out da troppo

ordina territori da far uscire

bonus Roy mode on: dove si trova il fratello, assegna progressivamente territori vicini geograficamente (calcola bbox)

SELECT * from  registro as r
join registro as r2 ON r.territorio_n = r2.territorio_n AND r.data_uscita != r2.data_uscita  
 
 * 
 */
