<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
======================================================================================= 
Module Name: email.php
Description: 
	- Use to set the parameters of STMP.
======================================================================================= 
*/


//Working on Local units
$config = array(
	'protocol'		=> 'smtp',
	'smtp_host'		=> 'ssl://smtp.gmail.com',
	'smtp_port'		=> '465',
	'smtp_user'		=> 'b1gsouthluzon@gmail.com',
	'smtp_pass'		=> 'SinglesM123',
	'charset'		=> 'utf-8',
	'newline'		=> "\r\n",
	'mailtype'		=> 'html',
);

/*
//Working Configuration for 10.8.73.54
$config = array(
	'protocol'		=> 'smtp',
	'smtp_host'		=> 'ssl://10.66.5.37',
	//'mail_path'		=> '10.66.5.37',
	'smtp_port'		=> '465',
	'smtp_user'		=> 'wirelessaccessraawaadmin@globe.com.ph',
	'smtp_pass'		=> '',
	'charset'		=> 'utf-8',
	'newline'		=> "\r\n",
	'mailtype'		=> 'html',

);
*/

?>



