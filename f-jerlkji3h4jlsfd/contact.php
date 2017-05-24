<?php


$errors = array();
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$sub=$_POST['subject'];
	$des=$_POST['des'];
	
	$files = array();
	$size_limit = 8000000;
	$toUploadPath = '/uploads/';
	$files_types = array('image/png','image/jpeg','image/gif','image/jpg','application/zip','application/x-rar-compressed','application/pdf','application/msword','application/vnd.ms-powerpoint','application/vnd.ms-excel','application/rtf');
	$s=$f=0;
	
	for($i=0;$i<count($_FILES['attachments']['name']);$i++){
		$mime = $_FILES['attachments']['type'][$i];
		$size = $_FILES['attachments']['size'][$i];
		if(in_array($mime,$files_types) && $size <= $size_limit){
			if(uploadFile($_FILES['attachments']['tmp_name'][$i],$_SERVER['DOCUMENT_ROOT'].$toUploadPath.$_FILES['attachments']['name'][$i])){
				$s++;
				$files[] = $toUploadPath.$_FILES['attachments']['name'][$i];
			}else{
				$f++;
				$errors[] = '('.$i.') <strong>'.$_FILES['attachments']['name'][$i].'</strong> Failed Uploading.';
			}
		}else{
			$f++;
			$errors[] = '<strong>'.$mime.'</strong> Not Allowed in file: ('.$i.') <strong>'.$_FILES['attachments']['name'][$i].'</strong>';
		}
	}
	
	$errors[] = "<strong>$s</strong> Files Uploaded Successfully & <strong>$f</strong> Failed Uploading";	 

	$status='open';
	$attachments = json_encode($files);
		$dated=date('Y-m-d h:i:s');

	
$query="insert into contact (name,phone,email,subject,des,attachments,status) values('$name','$phone','$email','$sub','$des','$attachments','$status')";
$ss = mysql_query($query);
if(mysql_affected_rows()==1){
	$success = 'Contact Request Sent Successfully.';
}else{
	$error[] ='Problem in sending contact request.';
}



	
	
	}


?>



 <style>
		.ic{
			text-align:right;
		}
		.ic div{
			display:inline-block;
		}
		</style>

<div class="ic" style="margin-top:10px;">
<div class="btn btn-default"><span class="glyphicon glyphicon-user"></span></div>
<div class="btn btn-default"><span class="glyphicon glyphicon-user"></span></div>
<div class="btn btn-default"><span class="glyphicon glyphicon-repeat"></span></div>
</div>



<div style="height:30px; background-color:#FFFFFF; margin-top:40px;">
<div style="display:inline-block; width:15%; float:right; height:40px; margin-top:-5px; border:#DFDFDF solid 1px; background-color:#ffffff;" onClick="$('#cal').focus();">May 3, 2016 - June 3, 2016 </div>
</div>
<br>
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
<div><b>SUBMIT A REQUEST</b></div>
<div class="col-md-12">
<?php
if(count($errors)){
	echo '<ul type="circle" class="alert alert-danger">';
	foreach($errors as $k=>$v){
		echo '<li>'.$v.'</li>';
	}
	echo '</ul>';
}
if(isset($success)){
	echo '<div class="alert alert-success">'.$success.'</div>';
}
?>
 <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      Name:
      <input type="text" class="form-control" id="email" placeholder="Name" name="name">
    </div>
    <div class="form-group">
      Phone:
      <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone">
     <div class="form-group">
     Email:
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
     <div class="form-group">
     Subject:
      <input type="text" class="form-control" id="sub" placeholder="Subject" name="subject">
    </div>
         <div class="form-group">
     Desription:
      <textarea rows="5" cols="88" class="form-control" name="des"></textarea>
    </div>
            <div class="form-group">
      Attachments:
      <input type="file" class="form-control" name="attachments[]" multiple>
    </div>
    <hr>
   <div style="text-align:right;color:#067bc1;">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </div>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>

</div>