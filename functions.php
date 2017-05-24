<?Php
if(isset($_GET['logout']) && $_GET['logout']==true){
	unset($_SESSION['admin-login']);
	unset($_SESSION['user-login']);
	header('location: /');
}

function getPage($x){
	if(empty($x) or $x == ADMIN_PATH){return default_page;}
	if(isset($_SESSION['admin-login'])){
		if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/'.ADMIN_DIR.'/'.$x.'.php')){return '404';}else{return $x;}		
	}else{
		if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/'.FRONT.'/'.$x.'.php')){return '404';}else{return $x;}
	}
}

function isAdmin(){
	return ($GLOBALS['url_array'][1]==ADMIN_PATH or isset($_SESSION['admin-login']))? true:false;
}


$abc = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$GLOBALS['full_url'] = parse_url($abc,PHP_URL_PATH);
$GLOBALS['url_array'] = explode('/',$GLOBALS['full_url']);
if(count($GLOBALS['url_array'])>2){
	if(strlen($_SERVER['QUERY_STRING'])>0){
		$GLOBALS['url_array'][1] .= '?'.$_SERVER['QUERY_STRING'];
	}
	redirect('/'.$GLOBALS['url_array'][1]);
}

$GLOBALS['pages'] = array(
'dashboard' => 'dashboard',
'audience' => 'user',
'contact' => 'envelope',
);

$GLOBALS['admin-pages'] = array(
'dashboard' => 'dashboard',
'clients' => 'user',
'contacts' => 'envelope',
'reports' => ''
);

//ye kion bnaye  hyn 
$sub_pages = array(
'add-client' => 'clients',
'update-client' => 'clients',
'add-reports' => 'reports',
'add-client' => 'clients',
'details' => 'contacts'
);



$no_header = array('login','reset-password');
$no_footer = array('login','reset-password');




function redirect($link){
	header('location: '.$link);
}
function refresh($link,$time){
	header('refresh: '.$time.'; url='.$link.'; ');
}

function uploadFile($tmp,$path){
	if(move_uploaded_file($tmp,$path)){
		return true;
	}else{
		return false;
	}
}


?>