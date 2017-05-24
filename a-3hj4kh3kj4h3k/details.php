
<?php

if(isset($_GET['status']) and isset($_GET['id']) and !empty($_GET['id']) and !empty($_GET['status'])){
$status=$_GET['status'];
$id = $_GET['id'];
$query1=mysql_query("update contact set status = '$status' where id='$id'");
	//if(mysql_affected_rows($query1)==1)
	//redirect('/details?id='.$id);
}


if(isset($_GET['del']) and !empty($_GET['del'])){
$delete=$_GET['del'];
$query1=mysql_query("delete from clients where id='$delete'");
	//if(mysql_affected_rows($query1)==1)
	redirect('/details');
}

if(!isset($_GET['id']) or empty($_GET['id'])){
	redirect('/contacts');
}else{
$id=$_GET['id'];
$query='select * from contact where id = '.$id;
 
$run=mysql_query($query);
if(mysql_num_rows($run)==0){
	redirect('/contacts');
}
$row=mysql_fetch_assoc($run);
}
$i=1;
?>
<div style="background-color:#FFFFFF;">
    <table class="table table-bordered">
        
        <?php
		foreach($row as $k=>$v){
			echo '<tr>';
			echo '<td>'.ucfirst($k).'</td>';
				if($k=='attachments'){
					$s = json_decode($v,true);
					echo '<td><ol type="1">';
					foreach($s as $links){
						$ln = 'http://'.$_SERVER['HTTP_HOST'].$links;
						echo '<li> <a href="'.$ln.'" target="_blank" download="'.end(explode('/',$links)).'">'.$ln.'</a></li>';
					}
					echo '</ol></td>';
				}else{
					if($k=="status" and $v=='open'){
						$btn_html = 'Open <a class="btn btn-danger del_btn" href="?id='.$row['id'].'&status=closed">Close</a>';
					
						}else{
							$btn_html = $v;
							}
					echo '<td>'.$btn_html.'</td>';
				}
			echo '</tr>';
		}
		?>
        <tr>
        
        </tr>
    </table>
</div>

