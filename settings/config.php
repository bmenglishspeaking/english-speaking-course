<?php
ini_set('error_display',1);
error_reporting(E_ALL);
ob_start();
session_start();
//set timezone
date_default_timezone_set('Europe/London');

// Live database credentials
define('DBHOST','sanjeevdubey.db.10729404.hostedresource.com');
define('DBUSER','sanjeevdubey');
define('DBPASS','Testing@123');
define('DBNAME','sanjeevdubey');

//Test database credentials
/*define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','sanjeevdubey');*/




//application address



define('SITEEMAIL','noreply@domain.com');
$url="http://".$_SERVER['HTTP_HOST']."/english-speaking-course/"; 
define('SITEURL',$url);
define('DIR',$url);
$classPath = $_SERVER['DOCUMENT_ROOT']  . '/bmenglishspeaking/english-speaking-course/classes'; 
define('CLASSPATH',$classPath);
$cssPath = SITEURL  . '/css';
define('CSSPATH',$cssPath);
$imagePath = SITEURL.'/images';
define('IMAGEPATH',$imagePath);
$jsPath = SITEURL.'/js';
define('JSPATH',$jsPath);
$today = date("Y-m-d h:i:s");  
define('CURRENTTME',$today);



try {

	//create PDO connection 
	$pdo = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}
//include the classes, pass in the database connection
include($classPath.'/database.class.php');
include($classPath.'/utilities.class.php');
$db =  new db($pdo);
$utils = new Utilities($pdo);

?>
