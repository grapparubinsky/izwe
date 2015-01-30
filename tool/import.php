<?php
require_once '../include/config.php';

if(!isset($_POST['action'])) {
	echo <<<EOD
	<form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload" />
            <label>Carica il tuo file:</label>
            <input type="file" name="file" />
            <br />
            <input type="submit" value="Carica online" />
        </form>
EOD;
} else {
define("UPLOAD_DIR", "tmp/");

if(isset($_POST['action']) and $_POST['action'] == 'upload')
{
    if(isset($_FILES['file']))
    {
        $file = $_FILES['file'];
        if($file['error'] == UPLOAD_ERR_OK and is_uploaded_file($file['tmp_name']))
        {
            move_uploaded_file($file['tmp_name'], UPLOAD_DIR.$file['name']);
        }
    }
}
$sel=mysqli_query($mysqli, "DROP DATABASE izwe") or die(mysqli_error($mysqli));
$sel=mysqli_query($mysqli, "CREATE DATABASE izwe") or die(mysqli_error($mysqli));

$mysqlDatabaseName ='izwe';
$mysqlUserName ='root';
$mysqlPassword ='root';
$mysqlHostName ='localhost';
$mysqlImportFilename = UPLOAD_DIR.$_FILES['file']['name'];
//DO NOT EDIT BELOW THIS LINE
//Export the database and output the status to the page
$command='mysql -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' < ' .$mysqlImportFilename;
exec($command,$output=array(),$worked);
switch($worked){
    case 0:
        echo 'Import file <b>' .$mysqlImportFilename .'</b> successfully imported to database <b>' .$mysqlDatabaseName .'</b>';
        break;
    case 1:
        echo 'There was an error during import. Please make sure the import file is saved in the same folder as this script and check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr><tr><td>MySQL Import Filename:</td><td><b>' .$mysqlImportFilename .'</b></td></tr></table>';
        break;
}
}
?>