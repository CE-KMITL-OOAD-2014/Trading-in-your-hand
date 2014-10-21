<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap 101 Template</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="back"> 
  
  <!--------------------------Login------------------------------------------------------------------------------------------------------------>
  <section id="login">
    <div class="container">
      <div class="row">
        
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
          <div class="form-wrap">
            <h1>Log in </h1>
            <form role="form" action="../../member/login" method="post" id="login-form" autocomplete="off">
              <div class="form-group">
                <label for="username" class="sr-only">username</label>
                <input type="username" name="username" id="username" class="form-control" placeholder="User name" required autofocus>
              </div>
              <div class="form-group">
                <label for="key" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autofocus>   
              <hr class="colorgraph"><input type="submit" value="Log in" class="btn btn-primary btn-block btn-lg" tabindex="7"></hr>
              </div>
            </form>
            <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
            <hr>
          </div>
        </div>
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container --> 
  </section>
  <div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">×</span> <span class="sr-only">Close</span> </button>
          <h4 class="modal-title">Recovery password</h4>
        </div>
        <div class="modal-body">
          <p>Type your email account</p>
          <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-custom">Recovery</button>
        </div>
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
  
  <!-----------------------------------End_Login----------------------------------------------------------------------------------------------------> 
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="../js/bootstrap.min.js"></script> 
</div>
</body>
</html>