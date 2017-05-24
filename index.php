<?Php
ob_start();
session_start();
define('ADMIN_PATH','admin');
define('ADMIN_DIR','a-3hj4kh3kj4h3k');
define('FRONT','f-jerlkji3h4jlsfd');
require('config.php');
require('functions.php');

if(isAdmin()){
	echo 'is admin';
	require('admin-process.php');
}else{
	echo 'is-front';
	require('front-process.php');	
}

?>