<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="back"> 
	<? 	$id = $this->session->all_userdata();
		$id = $id['username']; ?>
    <div class="container">
      <div class="row">
        
        <div class="col-xs-2 col-md-3"></div>
        <div class="col-xs-8 col-md-6">
          <div class="form-wrap">
          <h1>Identity information</h1>
          <img src="../../userPic/<? echo"".md5(base64_encode(md5($id))).".jpg"; ?>" class="avatar img-thumbnail" alt="300x300">
            <form action="../../member/uploaded/iden" method="POST" enctype="multipart/form-data" >
        <input type="file" name="userfile" class="text-center center-block well well-sm"/>
        <input type="submit" name="submit" value="Upload" class="btn btn-success" />
        </form>
            <hr>
          </div>
        </div>
      </div>
      <!-- /.row --> 
    </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="../js/bootstrap.min.js"></script> 
</div>
</body>
</html>