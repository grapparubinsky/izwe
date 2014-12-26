<?php 
if($_GET['admin'] == 'true') {

include ('../include/dumper.php');
	$world_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => $_GET['pswd'],
		'db_name' => 'izwe',
	));
	
	$now=date('Ymd-Hi');
	// dump the database to gzipped file
	//$world_dumper->dump('world.sql.gz');
	
	// dump the database to plain text file
	//$world_dumper->dump("$now-izwe.sql");
	
$world_dumper->dump("$now-izwe.sql");
$file="$now-izwe.sql";
chmod($file, 0777);
	if (file_exists($file)) {
	    header('Content-Description: File Transfer');
	    header('Content-Disposition: attachment; filename='.basename($file));
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($file));
	    readfile($file);
	    exit;
	
	}

}
