
<?php
if(isset($_GET['del']) and !empty($_GET['del'])){
$delete=$_GET['del'];
$query1=mysql_query("delete from clients where id='$delete'");
	//if(mysql_affected_rows($query1)==1)
	redirect('/details');
}

?>

<h2>Clients</h2><div class="btn-group"><a href="/contacts" class="btn btn-info active ">List</a></div> <style>
		.ic{
			text-align:right;
		}
		.ic div{
			display:inline-block;
		}
		</style>

<style>
.form-conrtol{
	height:10px;
	
	}

</style>
<div class="row">

<div class="col-md-12" style="padding:0;">
<div class="row">
<div class="col-md-offset-2 col-md-8" style="background-color:#ffffff;padding:0;">

<div>
<div style="background-color:#067bc1; height:40px; font-size:24px;color:#ffffff;text-align:center;">List</div>
<?php
if(isset($error)){
	echo '<div class="alert alert-danger">'.$error.'</div>';
}
if(isset($success)){
	echo '<div class="alert alert-success">'.$success.'</div>';
}
?>
<div class="col-md-12">

  <table class="table table-bordered">
    <thead>
      <tr>
       <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Date</th>

        <th>Details</th>
      </tr>
    </thead>
    <tbody>
    <?php
$i=1;
$query='select * from contact order by id DESC';
$run=mysql_query($query);
while($row=mysql_fetch_array($run)){
	$name=$row['name'];
	$email=$row['email'];
	$sub=$row['subject'];
	$dated=$row['dated'];

	$id=$row['id'];
	
	
	
?>
      <tr>
        
        <td><?Php echo $i++; ?></td>
        <td><?Php echo $name; ?></td>
        <td><?Php echo $email; ?></td>
         <td><?Php echo $sub; ?></td>
         <td><?Php echo $dated; ?></td>

        <td><a href="/details?id=<?php echo $id;?>" class="btn btn-info">Details</td>
      </tr>
<?php }?>
    </tbody>
  </table>
</div>

</div>
</div>
</div>
</div>
</div>
</div>

</div>
<?php /*?><script type="text/javascript">
$(document).ready(function(e) {
    $(document).on('click','.del_btn',function(){
		if(confirm('Are you sure to delete')){return true;}
		return false;
	});
});
</script><?php */?>