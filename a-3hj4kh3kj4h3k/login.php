
<?php
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$query="select * from login where email='$email' AND pass='$pwd'";
	$run=mysql_query($query);
	if(mysql_num_rows($run)>0){
			$_SESSION['admin-login']=$email;
			
		$success = 'loged in successfully';
		header('refresh: 3; url=/dashboard');
		}else{
			
		$error = 'email or passwrd Wrong';	
			}
	
	
	}


?>

<div class="row">

<div class="col-md-12">

<div class="row">

<div class="col-md-offset-4 col-md-4" style="background-color:#ffffff;padding:0; border:2px solid black;margin-top:150px; background-color:#FFD600;">


<div>

<div style="background-color:#067bc1; height:40px; text-align:center;color:#ffffff;font-size:24px;s">Admin Login</div>
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
      Email:
      <input type="email" class="form-control" id="email" placeholder="Email" name="email">
    </div>
    <div class="form-group">
      Password:
      <input type="password" class="form-control" id="pwd" placeholder="" name="pwd">
    <hr>
   <div style="text-align:right;color:#067bc1;">
    <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
  </div>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
