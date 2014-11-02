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
	<div class="container">
    <br/>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-thumbnail" alt="300x300">
        <input type="file" id="pic" name="pic" class="text-center center-block well well-sm" form = "profile" enctype="multipart/form-data"/>
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>
      <h3>Personal info</h3>
      <form class="form-horizontal" id="profile" role="form" action="../../member/edit" method="get">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" id="name" name="name" value="<? echo"".$name; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" id="sname" name="sname" value="<? echo"".$sname; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">About:</label>
          <div class="col-lg-8">
            <input class="form-control" id="about" name="about" value="<? echo"".$about; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" id="email" name="email" value="<? echo"".$email; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Address:</label>
          <div class="col-lg-8">
            <input class="form-control" id="address" name="address" value="<? echo"".$address; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Facebook:</label>
          <div class="col-lg-8">
            <input class="form-control" id="facebook" name="facebook" value="<? echo"".$facebook; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Twitter:</label>
          <div class="col-lg-8">
            <input class="form-control" id="twitter" name="twitter" value="<? echo"".$twitter; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Google Plus:</label>
          <div class="col-lg-8">
            <input class="form-control" id="googleplus" name="googleplus" value="<? echo"".$googleplus; ?>" type="text">
          </div>
        </div><div class="form-group">
          <label class="col-lg-3 control-label">Github:</label>
          <div class="col-lg-8">
            <input class="form-control" id="github" name="github" value="<? echo"".$github; ?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="button" onclick="location.href='<? 
			$id = $this->session->all_userdata();
			$id = $id['username'];
			echo"../../pages/member/".$id; ?>'">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="../../js/bootstrap.min.js"></script> 
</div>
</body>
</html>