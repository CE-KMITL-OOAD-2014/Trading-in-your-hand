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

    <div class="container">
      <div class="row">
        
        <div class="col-xs-2 col-md-3"></div>
        <div class="col-xs-8 col-md-6">
          <div class="form-wrap">
            <? 
			$sess = $this->session->all_userdata();
			echo"<h1>Enter confirmation code</h1>".$sess['rcode']; ?>
            <form action="<? 
			if(!$this->session->userdata('login2'))
				echo"../../member/register2way";
			else
				echo"../../member/logintwoway";
			?>" method="post" autocomplete="off">
              <div class="form-group">
                <label for="key" class="sr-only">code</label>
                <input type="password" name="code" id="code" class="form-control" placeholder="Password" required autofocus>
              </div>
              <div class="form-group">	
                <input type="submit" value="Confirm" class="btn btn-primary btn-block btn-lg">
              </div>
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