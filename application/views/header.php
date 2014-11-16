<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../../../../images/logo.png" />
<?
if($page=="profile")
	echo"<title>".$username." - Trading in your hand</title>";
else
	echo"<title>".$page." - Trading in your hand</title>";
?>
<link href="../../../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div style="background-color:#CCC">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="border-radius:0 !important; background-color:#666 !important;">
    <div class="container-fluid" style=" border:10px !important; border-color:#000 !important;"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="../../../../../pages" onMouseOver="logo.src='../../../../images/logo2.png';" onMouseOut="logo.src='../../../../images/logo.png';"><img src="../../../../images/logo.png" width="25px" height="25px" id="logo"/>Trading in your hand</a> </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search product, member" id="searchname" name="searchname">
          </div>
          <label style="color:#FFF">Search in</label>
        </form>
        <ul class="nav navbar-nav">
            <li class='dropdown active'> <a href='#' class='dropdown-toggle' data-toggle='dropdown'>catalogue<span class='caret'></span></a>
              <ul class='dropdown-menu' role='menu'>
                <li><a href="window.location.href ='../../../../pages/search/all/'+document.getElementById('searchname').value;" style='color:#333;'>All</a></li>
                <li class='divider'></li>
                <li><a onClick="window.location.href ='../../../../pages/search/electronics/'+document.getElementById('searchname').value;" style='color:#333;'>Electronics</a></li>
                <li><a onClick="window.location.href ='../../../../pages/search/cloths/'+document.getElementById('searchname').value;" style='color:#333;'>Cloths</a></li>
                <li><a onClick="window.location.href ='../../../../pages/search/others/'+document.getElementById('searchname').value;" style='color:#333;'>Others</a></li>
              </ul>
            </li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
          <? if($page=="home")
          		echo"<li class='active'><a href='#'>Home</a></li>";
          	else
				echo"<li><a href='../../../../pages'>Home</a></li>";
			if($page=="promotion")
          		echo"<li class='active'><a href='#'>Promotion</a></li>";
          	else
				echo"<li><a href='../../../../pages/promotion'>Promotion</a></li>";
			if(!$this->session->userdata('username'))
			if($page=="register")
          		echo"<li class='active'><a href='#'>Register</a></li>";
          	else
				echo"<li><a href='../../../../pages/register'>Register</a></li>";
			if(!$this->session->userdata('username'))
			if($page=="login")
          		echo"<li class='active'><a href='#'>Log in</a></li>";
          	else
				echo"<li><a href='../../../../pages/login'>Log in</a></li>";
			if($page=="about")
          		echo"<li class='active'><a href='#'>About</a></li>";
          	else
				echo"<li><a href='../../../../pages/about'>About</a></li>";
			if($this->session->userdata('username')){
			$username = $this->session->all_userdata();
			$username = $username['username'];
				echo"<li><li class='dropdown'> <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Account<span class='caret'></span></a>
            <ul class='dropdown-menu' role='menu'>
              <li><a href='../../../../pages/member/".$username."' style='color:#333;'>Profile</a></li>
              	<li><a href='../../../../pages/viewmessage' style='color:#333;'>Message</a></li>
              <li class='divider'></li>
              <li><a href='../../../../member/logout' style='color:#333;'>Log out</a></li>
            </ul>
          </li></li>";}
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container-fluid --> 
  </nav>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="../../../../js/bootstrap.min.js"></script> 
</div>
</body>
</html>