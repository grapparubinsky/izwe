<?php
include("../include/config.php");
if (isset($_REQUEST['json']))
	{
		header("Content-Type: application/json");
		if(isset($_GET['nominati'])) {
		$sql_res=mysqli_query($mysqli, "SELECT id, nome, cognome, anziano, servitore FROM proclamatori WHERE anziano = '1' OR servitore = '1' AND nome LIKE '%{$_GET['nominati']}%' ORDER BY nome DESC");
			while($row=mysqli_fetch_array($sql_res)) {
			  $value[]=$row['nome'].' '.$row['cognome'];
			  $id[]=$row['id'];
		  }
		
		} elseif(isset($_GET['gruppo'])) {
		$sql_res=mysqli_query($mysqli, "SELECT id, nome_gruppo FROM gruppi WHERE nome_gruppo LIKE '%{$_GET['gruppo']}%' ORDER BY nome_gruppo DESC");
			while($row=mysqli_fetch_array($sql_res)) {
			  $value[]=$row['nome_gruppo'];
			  $id[]=$row['id'];
		  }
		} elseif(isset($_GET['proclamatore'])) {
		$sql_res=mysqli_query($mysqli, "SELECT id, nome, cognome FROM proclamatori WHERE nome LIKE '%{$_GET['proclamatore']}%' OR cognome LIKE '%{$_GET['proclamatore']}%'");
			while($row=mysqli_fetch_array($sql_res)) {
			   $value[]=$row['nome'].' '.$row['cognome'];
			  $id[]=$row['id'];
		  }
		}
		echo "{\"results\": [";
		$arr = array();
		for ($i=0;$i<count($value);$i++)
		{
			$arr[] = "{\"id\": \"".$id[$i]."\", \"value\": \"".$value[$i]."\", \"info\": \"\"}";
		}
		echo implode(", ", $arr);
		echo "]}";
	}