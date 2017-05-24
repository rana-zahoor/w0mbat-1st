<style>
.header-main-wrapper{
	background:#ffd600;
	height:30px;
	vertical-align:top;
	padding:0;
}
.hw-left{
	float:left;
	background-image:url(img/header-bg.png);
	background-position:right;
	width:75%;
	height:28px;
}
.hw-right{
	float:right;
	width:19%;
}
.left-menu{
	padding-right:0;
}
.left-menu .btn-group-vertical a{
	border-radius:0 !important;
	background:none;
	border:none;
	font-size:20px;
}
.left-menu .btn-group-vertical a.active{
	background-color:#FFFFFF;
}
.container{
	background:#ffd600;
}
</style>
<div class="container">
	<div class="row">
    	<div class="col-md-12 header-main-wrapper">
        	
            <div class="hw-left">
            <strong>SEM WOMBAT</strong>
            </div>
            <div class="hw-right">
                <div style="float:right">
                <img src="img/5GnxYfnj.jpg" class="img img-circle" style="max-height:25px;">
                <span style="padding-top:5px;"><strong>Dove Morris</strong><span class="glyphicon glyphicon-chevron-down" style="padding-top:5px;"></span></span>
                </div>
            </div>
            
        </div>
    </div>
	<div class="row">
    	<div class="col-md-2 left-menu">
        	<div class="btn-group-vertical" style="width:100%;">
<?php

foreach($GLOBALS['pages'] as $pg=>$icon){
	$active = ($GLOBALS['file']==$pg)?'active':'';
	echo '<a href="/'.$pg.'" class="btn btn-default '.$active.'"  ><span class="glyphicon glyphicon-'.$icon.'" style="width:50px; height:50px; padding:15px;" ></span>&nbsp;<strong> '.ucfirst($pg).' </strong></a>';
}
?>
            </div>
        </div>
        <div class="col-md-10" style="background:#d5d5d5;">
        	<?php require(FRONT.'/'.$GLOBALS['file'].'.php'); ?>
        </div>
        
    </div>
</div>