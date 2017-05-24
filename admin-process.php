<?Php
$GLOBALS['file'] = getPage($GLOBALS['url_array'][1]);
//ye jaga py masla a
require(ADMIN_DIR.'/meta.php');
if(!in_array($GLOBALS['file'],$no_header)){
	require(ADMIN_DIR.'/header.php');
}
if(in_array($GLOBALS['file'],$no_header)){
	require(ADMIN_DIR.'/'.$GLOBALS['file'].'.php');
}
if(!in_array($GLOBALS['file'],$no_footer)){
	require(ADMIN_DIR.'/footer.php');
}


?>