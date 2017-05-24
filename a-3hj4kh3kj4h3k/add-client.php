


<?php


if(isset($_POST['submit'])){
	$contact=$_POST['cantact-name'];
	$business=$_POST['business-type'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$pass=$_POST['pwd'];
	$dated=date('Y-m-d h:i:s');
	
	
	
$sql = "INSERT INTO clients (contact_name, business_type, address,email,pass,dated) VALUES ('$contact', '$business', '$address','$email','$pass','$dated')";

if(mysql_query($sql)){
	$success='saved successfully';
	
	}else{
	$error='your recode is not saved';
		}
}

if(isset($_POST['Update'])){
	$contact=$_POST['cantact-name'];
	$business=$_POST['business-type'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$pass=$_POST['pwd'];
	
	
	
	
$sql = "update clients set contact_name='$contact',business_type='$business',address='$address',email='$email',pass='$pass'";

if(mysql_query($sql)){
	$success='saved successfully';
	
	}else{
	$error='your recode is not saved';
		}
}



if(isset($_GET['edit'])){
	$edit=$_GET['edit'];
	$query="select * from clients where id ='$edit'";
	$run=mysql_query($query);
	while($row=mysql_fetch_array($run)){
	$contact=$row['contact_name'];
	$business=$row['business_type'];
	$address=$row['address'];
	$email=$row['email'];
	$pass=$row['pass'];
	
		
		
		
		}
	}


?>




<h2>Clients</h2><div class="btn-group"><a href="/clients" class="btn btn-info ">List</a><a href="/add-client" class="btn btn-info active">Add</a></div> <style>
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
<div style="background-color:#067bc1; height:40px;"></div>

<div class="col-md-12">
<?php
if(isset($error)){
	echo '<div class="alert alert-danger">'.$error.'</div>';
}
if(isset($success)){
	echo '<div class="alert alert-success">'.$success.'</div>';
}
?>
 <form action="" method="post">
    <div class="form-group">
      Cantact Name:
      <input type="text" class="form-control" id="email" placeholder="Cantact Name" name="cantact-name" value="<?php echo @$contact;?>">
    </div>
    <div class="form-group">
      Business type:
      <input type="text" class="form-control" id="business type" placeholder="business type" name="business-type" value="<?php echo @$business; ?>">
     <div class="form-group">
     Address:
      <input type="text" class="form-control" id="address" placeholder=" address" name="address" value="<?php echo @$address;?>">
    </div>
     <div class="form-group">
     Email:
      <input type="email" class="form-control" id="email" placeholder="email" name="email" value="<?php echo @$email; ?>">
    </div>
         <div class="form-group">
     Password:
      <input type="text" class="form-control" id="pass" placeholder="Password" name="pwd" value="<?php echo @$pass; ?>">
    </div>   
    <hr>
   <div style="text-align:right;color:#067bc1;">
    <button type="submit" class="btn btn-primary" name="<?php if(isset($_GET['edit'])){echo'Update';}else{echo'submit';}?>">Save</button>
  </div>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>

</div>