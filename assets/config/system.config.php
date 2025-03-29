<?PHP
/*--------------Display Error------------------/
	*error_reporting(E_ALL);
	*/
error_reporting(0);
@session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set("Asia/Bangkok");

//--------------Base part------------------//
$config['BASE_URL'] 	= 'localhost:3000';
$config['SITE_NAME']	= 'PK Karaoke';
$config['GET_INFO']		= true;

//-------------Data Base-----------------//
$config['DB_HOST'] 		= 'localhost:3306';
$config['DB_USER'] 		= 'root';
$config['DB_PASSWD'] 	= '';
$config['DB_NAME'] 		= 'demosiam_pkkaraoke2';
$config['DB_TABLE_NAME'] = 'pkkaraoke';

//-------------Contact Detail-----------------//
$config['CONTACT']['EMAIL']		= 'contact@pk-karaoke.com';
$config['CONTACT']['TEL']		= '02-999-9999';
$config['CONTACT']['FAX']		= '02-999-9998';
$config['CONTACT']['ADDRESS']	= '';
$config['CONTACT']['FACEBOOK']	= 'https://www.facebook.com/';
$config['CONTACT']['TWITTER']	= 'https://twitter.com/?lang=th';

// +-------------Domain name---------------+ //
$config['DOMAIN_NAME']	= 'demosiam';

// +-------------Salt String------------------+ //
// |------ Values = A-Z, a-z, 1-0 , !,@,#,%,^,&,*,(,),-,+-----|
// |----------------5-10 charactor-------------|
$config['SALT'] = '#@COMPANY@#';

//------------Global variable------------//
$tbl	= $config['DB_TABLE_NAME'];
$salt	= $config['SALT'];
$host	= $config['DOMAIN_NAME'];

//------- เซ็ตให้เข้าเว็บโดยมี www เสมอ --------//
#/*
// $Redirect	= "https://".$_SERVER['HTTP_HOST'];
// $Redirect2	= strstr($Redirect , 'https://www');
// if ( ! $Redirect2 ) {
// 	$URL	= "https://www.".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
// 	header ("Location: $URL");
// }
#*/
