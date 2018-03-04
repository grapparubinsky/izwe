<?php

$sql_res=mysqli_query($mysqli, "SELECT t.n as value, t.n as name FROM territori as t LEFT JOIN registro as r ON t.n = r.territorio_n where t.n NOT IN (select territorio_n from `registro` WHERE (`data_rientro` IS  NULL OR `data_rientro` = '0000-00-00')) GROUP BY `t`.`n` ORDER BY `t`.`n` + 0 ASC");
$terr_list_select_options = "<option value=''>---</option>";
while($row=mysqli_fetch_array($sql_res)) {
	                        $terr_list_select_options .= <<<EOD
                        <option value="{$row['value']}">{$row['name']}</option>
EOD;
}

