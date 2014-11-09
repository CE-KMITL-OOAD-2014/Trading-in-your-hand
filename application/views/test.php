<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="back"> 
  <!-------------------------------show product--------------------------------------------------------------------------------------------------->
  <? 		$id = $this->session->all_userdata();
			$id = $id['username']; ?>
  <div class = "container">
    <div col-md-12>
      <div>
        <div class="col-md-2"></div>
        <h3> Edit Profile</h3>
      </div>
      <div class="col-md-4"> <a class="thumbnail" > <img src="../../userPic/<? echo"".md5(base64_encode($id)).".jpg"; ?>"></a> </div>
      <div class="col-md-6">
      <form id="profile" action="../../member/edit" method="post">
		<label class="col-lg-2 control-label">First name:</label>
        <input class="form-control" id="name" name="name" value="<? echo"".$name; ?>" type="text">
        <label class="col-lg-2 control-label">Last name:</label>
        <input class="form-control" id="name" name="name" value="<? echo"".$sname; ?>" type="text">
        <label class="col-lg-2 control-label">About:</label>
        <input class="form-control" id="name" name="name" value="<? echo"".$about; ?>" type="text">
        <label class="col-lg-2 control-label">Email:</label>
        <input class="form-control" id="name" name="name" value="<? echo"".$email; ?>" type="text">
        <label class="col-lg-2 control-label">Address:</label>
        <input class="form-control" id="name" name="name" value="<? echo"".$address; ?>" type="text">
        <label class="col-lg-2 control-label">Facebook:</label>
        <input class="form-control" id="name" name="name" value="<? echo"".$facebook; ?>" type="text">
        <label class="col-lg-2 control-label">Twitter:</label>
        <input class="form-control" id="name" name="name" value="<? echo"".$twitter; ?>" type="text">
        <label class="col-lg-2 control-label">Google Plus:</label>
        <input class="form-control" id="name" name="name" value="<? echo"".$googleplus; ?>" type="text">
        <label class="col-lg-2 control-label">Github:</label>
        <input class="form-control" id="name" name="name" value="<? echo"".$github; ?>" type="text">
      </form>
      </div>
      <div class="row" >
        <div class="col-md-12">
          
          <button class="btn btn-default pull-right" type="button" onclick="location.href='<? echo"../../pages/member/".$id; ?>'">Cancel</button>
          <button type="submit" class="btn btn-primary btn-block btn-lg pull-right" form = "data">  Submit </button>
         
        </div>
      </div>
    </div>
    <!---->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="../../js/bootstrap.min.js"></script> 
</div>
</body>
</html>