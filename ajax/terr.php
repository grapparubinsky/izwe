<?php
include("../include/config.php");
include('../include/functions.php');
//echo '<pre>';
//print_r($GLOBALS);
//echo '</pre>';
$_js="\$";

if(isset($_GET['insert'])) {
$p=$_GET;
	
	if(isset($p['id'])) {
		$caunt=count($p['id']);
	} else {
		$caunt=count($p['territorio_n']);
	}
	
	for ($i=0; $i < $caunt; $i++) {
	if(!empty($p['territorio_n'][$i]) && !empty($p['data_uscita'][$i]) && $p['delete'][$i] == '0') {
		if(!empty($p['id'])) {
			$id['add'][$i]= 'id,';
			$id['value'][$i] = "'".$p['id'][$i]."',";
		} else {
			$id['add']='';
			$id['value'][$i] ='';
		}
			
		$upd=mysqli_query($mysqli, "INSERT INTO 
			registro ({$id['add'][$i]} id_p, territorio_n, data_uscita, r_uscita, data_rientro, r_rientro, note)
			VALUES ({$id['value'][$i]} '{$p['id_p'][$i]}', '{$p['territorio_n'][$i]}', '{$p['data_uscita'][$i]}', '{$p['r_uscita'][$i]}', '{$p['data_rientro'][$i]}', '{$p['r_rientro'][$i]}', '{$p['note'][$i]}')
				ON DUPLICATE KEY 
				UPDATE 
					data_uscita = '{$p['data_uscita'][$i]}',
					r_uscita = '{$p['r_uscita'][$i]}',
					data_rientro = '{$p['data_rientro'][$i]}',
					r_rientro = '{$p['r_rientro'][$i]}',
					note = '{$p['note'][$i]}'") or die(mysqli_error($mysqli));

			
					
		} elseif($p['delete'][$i] == '1') {
			$upd=mysqli_query($mysqli, "DELETE FROM registro WHERE id = '{$p['id'][$i]}'") or die(mysqli_error($mysqli));
		}
	}

} 
if(isset($_GET['priorita'])) {

		$upd=mysqli_query($mysqli, "SELECT t.n, r.data_rientro, t.note FROM territori as t LEFT JOIN registro as r ON t.n = r.territorio_n where t.n NOT IN (select territorio_n from `registro` WHERE (`data_rientro` IS  NULL OR `data_rientro` = '0000-00-00')) AND `t`.`zona` = '{$_GET['zona']}' ORDER BY `r`.`data_rientro` ASC LIMIT 15") or die(mysqli_error($mysqli));
		
			while($t=mysqli_fetch_assoc($upd)){
				if(empty($t)) {
					echo '<i>Nada de nada.</i>';
				} else {
									
									if(empty($t['data_rientro'])) {$rientro='-';}
									else $rientro=$t['data_rientro'];
									if($t['note'] == '0') {$note='-';}
									else $note=$t['note'];
					//	print_r($t);	
			$table.=<<<EOD
							<tr>
								<td><b onclick="return popitup_territorio('{$BASE_URL}/view?territorio_n={$t['id']}')">{$t['id']} </b>
								<td>$rientro </td> 
								<td>$note</td>
							</tr>
EOD;
		}
	}	
				echo $Content=<<<EOD
	<form id="grigliainsert">
	<table style="table-layout:fixed; width:100%" cellspacing="0">
		<tr>
			<th width="50" >N.</th>
			<th>Ultimo rientro</th>
			<th>Note</th>
		</tr>
			$table
	</table>
	</form>
	
EOD;

} 





elseif(!empty($_GET['id_p'])) {
		$sel_proc=mysqli_query($mysqli, "SELECT * FROM proclamatori WHERE id = '{$_GET['id_p']}' LIMIT 1") or die(mysqli_error($mysqli));	
		
		$p=mysqli_fetch_assoc($sel_proc);
		//print_r($p);
	
		$w=0;
		$sel_reg=mysqli_query($mysqli, "SELECT * FROM registro WHERE id_p = '{$p['id']}' ORDER BY data_rientro DESC");	
			while($r=mysqli_fetch_assoc($sel_reg)){
				if(empty($r)) {
					echo '<i>Nessun territorio assegnato a questo proclamatore.</i>';
				} else {
			
								if($r['r_uscita'] == '0') $r_uscita_check='';
							else $r_uscita_check = 'checked';
							
								if($r['r_rientro'] == '0') $r_rientro_check='';
							else $r_rientro_check = 'checked';
							
			$table.=<<<EOD
							<tr>
								<td><b onclick="return popitup('{$BASE_URL}/view?territorio_n={$r['territorio_n']}')">{$r['territorio_n']} </b>
								<td>{$p['nome']} {$p['cognome']} 
								<td><input type="date"  name="data_uscita[$w]" value="{$r['data_uscita']}" min="0" placeholder="Data uscita"></td>
								<input type="hidden" name="r_uscita[$w]" value="0">
								<td><input type="checkbox"  name="r_uscita[$w]" value="1" $r_uscita_check></td>
								<td><input type="date"  name="data_rientro[$w]" value="{$r['data_rientro']}" min="0" placeholder="Data rientro"></td> 
								<input type="hidden" name="r_rientro[$w]" value="0">
								<td><input type="checkbox"  name="r_rientro[$w]" value="1" $r_rientro_check></td>
								<td><input type="text"  name="note[$w]" value="{$r['note']}" min="0" placeholder="Note"></td>
								<td>{$r['id']}</td>
								<input type="hidden" name="delete[$w]" value="0">
								<td><input type="checkbox"  name="delete[$w]" value="1"></td>
								<input type="hidden" name="id[$w]" value="{$r['id']}">
								<input type="hidden" name="id_p[$w]" value="{$p['id']}">
								<input type="hidden" name="territorio_n[$w]" value="{$r['territorio_n']}">
							
							</tr>
EOD;
		}
				$w++;
	}	

$w='0';
	echo $Content=<<<EOD
	<form id="grigliainsert" onchange="return UpdateRecord();">
	<table style="table-layout:fixed; width:100%" cellspacing="0">
		<tr>
			<th width="50">N.</th>
			<th width="180">Proclamatore</th>
			<th width="220">Data uscita</th>
			<th>R</th>
			<th width="220">Data rientro</th>
			<th>R</th>
			<th>Note</th>
			<th width="25">ID</th>
			<th>Elimina</th>
		</tr>
			$table
</table>
	</form>	
	<hr>
	<h3>Assegna un territorio</h3>	
	<form id="griglianew">
	<table style="table-layout:fixed; width:100%" cellspacing="0">	
	<tr>
			<th width="50">N.</th>
			<th width="180">Proclamatore</th>
			<th width="220">Data uscita</th>
			<th width="40">R</th>
			<th>Note</th>
			
			<th>Registra</th>
		</tr>				
			<tr>
								<td><input type="text"  name="territorio_n[$w]" value="" min="1" placeholder="N°"></td>
								<td>{$p['nome']} {$p['cognome']} 
								<td><input type="date"  name="data_uscita[$w]" value="" min="0" placeholder="Data uscita"></td>
								<input type="hidden" name="r_uscita[$w]" value="0">
								<td><input type="checkbox"  name="r_uscita[$w]" value="1"></td>
								<td><input type="text"  name="note[$w]" value="" min="0" placeholder="Note"></td>
							
								 <td> <input type="button" class="btn btn-success" onclick="return AddRecord();" value="Registra"></td>
								<input type="hidden" name="id_p[$w]" value="{$p['id']}">
								<input type="hidden" name="delete[$w]" value="0">
							</tr>
							
	<div class="btn btn-warning" style="color:#444" onclick="return popitup('{$BASE_URL}/consigliere')">
		Trova un territorio da far uscire
	</div><br /><br/>
	
	</table>
	</form>

EOD;
} elseif(isset($_GET['cronologia'])) {
	
	$add="";
	if(!empty($_GET['territorio_n'])) {
		$add.= "WHERE territorio_n = '{$_GET['territorio_n']}'";
	}
		if(!empty($_GET['data_uscita']) && !empty($_GET['data_rientro'])) {
				$add.="AND data_uscita BETWEEN date('{$_GET['data_uscita']}') AND date('{$_GET['data_rientro']}') AND data_rientro BETWEEN date('{$_GET['data_uscita']}') AND date('{$_GET['data_rientro']}')";
		} else {
			if(!empty($_GET['data_uscita'])) {
				$add.="AND data_uscita = '{$_GET['data_uscita']}'";
			}
			if(!empty($_GET['data_rientro'])) {
				$add.="AND data_rientro = '{$_GET['data_rientro']}'";
			}
		}
// echo "SELECT r.id as id, r.id_p, territorio_n, DATE_FORMAT(data_uscita, '%d-%m-%Y') as data_uscita, DATE_FORMAT(data_rientro, '%d-%m-%Y') as data_rientro, registered, note, p.nome, p.cognome FROM registro AS r INNER JOIN proclamatori AS p ON r.id_p = p.id $add ORDER BY data_uscita DESC";

		$sel_terr=mysqli_query($mysqli, "SELECT r.id as id, r.id_p, territorio_n, DATE_FORMAT(data_uscita, '%d-%m-%Y') as data_uscita, DATE_FORMAT(data_rientro, '%d-%m-%Y') as data_rientro, r.r_uscita, r.r_rientro, note, p.nome, p.cognome FROM registro AS r INNER JOIN proclamatori AS p ON r.id_p = p.id $add ORDER BY data_uscita DESC") or die(mysqli_error($mysqli));	
			$table="";
			while($t=mysqli_fetch_assoc($sel_terr)){
				if(empty($t)) {
					echo '<i>Nessuna cronologia per questo territorio.</i>';
				} else {
									
						if($t['data_rientro'] == '00-00-0000' || empty($t['data_rientro'])) $rientro="<span style='color:green;font-weight:bold'>FUORI</span>";		
							else $rientro = $t['data_rientro'];						
						if($t['r_uscita'] == '0') $r_uscita='<b style="color:red">NO</b>';
							else $r_uscita = 'SI';
							
						if($t['data_rientro'] == '00-00-0000') { $r_rientro = '-'; }
						elseif($t['r_rientro'] == '0' && $t['data_rientro'] !== '0000-00-00') { $r_rientro='<b style="color:red">NO</b>'; }
						else { $r_rientro = 'SI'; } 
							
			$table.=<<<EOD
							<tr>
								<td><b onclick="return popitup('{$BASE_URL}/view?territorio_n={$t['territorio_n']}')">{$t['territorio_n']} </b>
								<td>{$t['nome']} {$t['cognome']} 
								<td>{$t['data_uscita']}</td>
								<td>$r_uscita</td>
								<td>$rientro</td> 
								<td>$r_rientro</td>
								<td>{$t['note']}</td>
								<td>{$t['id']}</td>
							</tr>
EOD;
		}
	}	
				echo $Content=<<<EOD
	<form id="grigliainsert">
	<table style="table-layout:fixed; width:100%" cellspacing="0">
		<tr>
			<th width="50">N.</th>
			<th width="180">Proclamatore</th>
			<th width="220">Data uscita</th>
			<th>R</th>
			<th width="220">Data rientro</th>
			<th>R</th>
			<th>Note</th>
			<th width="25">ID</th>
		</tr>
			$table
	</table>
	</form>
	
EOD;
} elseif(isset($_GET['status'])) {
	

	if(isset($_GET['not_registered'])) {
		$campi_add="";
		$add= "WHERE r_uscita = '0' || r_rientro = '0' AND data_rientro != '0000-00-00'";
		$orderby="territorio_n ASC";
		$sqlexec='1';
	}
	elseif(isset($_GET['in_scadenza'])) {
			$campi_add=", DATEDIFF(data_uscita, NOW()) as uscito_da_gg";
			$add= "WHERE (data_rientro IS NULL OR data_rientro = '0000-00-00') AND (DATEDIFF(data_uscita, NOW()) BETWEEN '-115' AND '-90')";
			$orderby="uscito_da_gg DESC";
			$sqlexec='1';
		}
	elseif(isset($_GET['scaduti'])) {
			$campi_add=", DATEDIFF(data_uscita, NOW()) as uscito_da_gg";
			$add= "WHERE (data_rientro IS NULL OR data_rientro = '0000-00-00') AND DATEDIFF(data_uscita, NOW()) <= '-115'";
			$orderby="uscito_da_gg DESC";
			$sqlexec='1';
			
		}

		if($sqlexec=='1') {
		$sel_terr=mysqli_query($mysqli, "SELECT r.id, r.id_p, territorio_n, DATE_FORMAT(data_uscita, '%d-%m-%Y') as data_uscita, 
		DATE_FORMAT(data_rientro, '%d-%m-%Y') as data_rientro, r_uscita, r_rientro, note, p.id, p.nome, p.cognome{$campi_add} 
		FROM registro AS r JOIN proclamatori AS p ON r.id_p = p.id
		$add 
		ORDER BY $orderby") or die(mysqli_error($mysqli));	

			while($t=mysqli_fetch_assoc($sel_terr)){
				if(empty($t)) {
					echo '<i>Nada de nada.</i>';
				} else {
						if($t['data_rientro'] == '00-00-0000' || empty($t['data_rientro'])) $rientro="<span style='color:green;font-weight:bold'>FUORI</span>";		
							else $rientro = $t['data_rientro'];						
						if($t['r_uscita'] == '0') $r_uscita='<b style="color:red">NO</b>';
							else $r_uscita = 'SI';
							
						if($t['r_rientro'] == '0' && $t['data_rientro'] !== '0000-00-00') { $r_rientro='<b style="color:red">NO</b>'; }
						elseif($t['r_rientro'] == '0' && $t['data_rientro'] == '0000-00-00'){ $r_rientro = '-'; }
						else { $r_rientro = 'SI'; } 
							
							
							if(isset($_GET['not_registered'])) {
								$table_th='<th width="220">Data rientro</th>';
								$table_th.='<th>R</th>';
								$table_td="<td>$rientro</td> ";
								$table_td.="<td>$r_rientro</td>";
							}
							
							if(isset($_GET['in_scadenza'])) {
								$now=date('d-m-Y');
								
									$diff=Diff_Date($t['data_uscita'], $now);
								
								$table_th='<th>Fuori da..</th>';
								$table_td="<td>{$diff}</td>";
							}
							if(isset($_GET['scaduti'])) {
								$now=date('d-m-Y');
								
									$diff=Diff_Date($t['data_uscita'], $now);
								
								$table_th='<th>Fuori da..</th>';
								$table_td="<td>{$diff}</td>";
							}
			$table.=<<<EOD
							<tr>
								<td><b onclick="return popitup('{$BASE_URL}/view?territorio_n={$t['territorio_n']}')">{$t['territorio_n']} </b>
								<td>{$t['nome']} {$t['cognome']} 
								<td>{$t['data_uscita']}</td>
								<td>$r_uscita</td>
								$table_td
								<td>{$t['note']}</td>
								<td>{$t['id']}</td>
							</tr>
EOD;
		}
	}	
				echo $Content=<<<EOD
	<form id="grigliainsert">
	<table style="table-layout:fixed; width:100%" cellspacing="0">
		<tr>
			<th width="50">N.</th>
			<th width="180">Proclamatore</th>
			<th width="220">Data uscita</th>
			<th>R</th>
			$table_th
			<th>Note</th>
			<th width="25">ID</th>
		</tr>
			$table
	</table>
	</form>
	
EOD;
}
else {
	echo 'Scegli sopra per cosa filtrare.';
	}
}
/*

	echo '<pre>';
print_r($GLOBALS);
*/
