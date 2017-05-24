<?Php
$GLOBALS['file'] = getPage($GLOBALS['url_array'][1]);
//ye jaga py masla a
require(FRONT.'/meta.php');
if(!in_array($GLOBALS['file'],$no_header)){
	require(FRONT.'/header.php');
}
if(in_array($GLOBALS['file'],$no_header)){
	require(FRONT.'/'.$GLOBALS['file'].'.php');
}
if(!in_array($GLOBALS['file'],$no_footer)){
	require(FRONT.'/footer.php');
}


?>