<body>
<div class="back"> 
  <script> 
var checkname = false;
var checkpass = false;
function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#password_confirmation").val();
	if(password.length!=0&&confirmPassword.length!=0)
    if (password != confirmPassword){
		  $("#password_confirmation").css( "background-color", "#F78181" );
		  $("#regisbutton").prop("type", "button");	 
	}
    else{
		$("#password_confirmation").css( "background-color", "#9FF781" );
		if(checkname&&checkpass)
		$("#regisbutton").prop("type", "submit");
	}
}

$(document).ready(function () {
   $("#password_confirmation").keyup(checkPasswordMatch);
   $("#username").keyup(validateusername);
   $("#username").keyup(checkPasswordMatch);
   $("#password").keyup(validatepass);
   $("#password").keyup(checkPasswordMatch);
});
function validatepass(){
		var regex = /^.{6,20}$/;
		var pass = $("#password").val();
		if(regex.test(pass)){
				$("#password").css( "background-color", "#9FF781" );
				checkpass = true;
			}
			else{
				$("#password").css( "background-color", "#F78181" );
				checkpass = false;	
				$("#regisbutton").prop("type", "button");
			}
}
   
function validateusername(){
		var regex = /^[a-zA-Z0-9]{4,12}$/;
		var text = $("#username").val();
			if(regex.test(text)){
				$("#username").css( "background-color", "#9FF781" );
				checkname = true;
			}
			else{
				$("#username").css( "background-color", "#F78181" );
				checkname = false;	
				$("#regisbutton").prop("type", "button");
			}
	}
   </script> 
  
  <!--------------------------Register---------------------------------------------------------------------------------->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" action="../member/register" method="post">
          <h2>Please Sign Up <small>It's free and always will be.</small></h2>
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <input type="text" name="username" id="username" class="form-control input-lg" autocomplete="off" placeholder="username" tabindex="1" required autofocus>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="name" id="name" class="form-control input-lg" autocomplete="off" placeholder="First Name" tabindex="2" required autofocus>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="sname" id="sname" class="form-control input-lg" autocomplete="off" placeholder="Last Name" tabindex="3" required autofocus>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control input-lg" autocomplete="off" placeholder="Email Address" tabindex="4" required autofocus>
          </div>
          <div class="form-group">
            <textarea rows="3" class="form-control" id="address" name="address" autocomplete="off" placeholder="Address" tabindex="5" style="resize:none" required autofocus></textarea>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password" id="password" class="form-control input-lg" autocomplete="off" placeholder="Password 6-20 Characters" tabindex="6"required autofocus>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off" class="form-control input-lg" placeholder="Confirm Password" tabindex="7" required autofocus>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"> By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="../member/register" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use. </div>
          </div>
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-12 col-md-6">
              <input type="button" value="Register" id="regisbutton" class="btn btn-primary btn-block btn-lg" tabindex="7">
            </div>
            <div class="col-xs-12 col-md-6"><a href="../pages/login" class="btn btn-success btn-block btn-lg">Sign In</a></div>
          </div>
        </form>
      </div> <!--col md -->
    </div> <!-- row -->
    <!-- Modal -->
    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">?</button>
            <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
          </div>
        </div>
        <!-- /.modal-content --> 
      </div>
      <!-- /.modal-dialog --> 
    </div>
    <!-- /.modal --> 
  </div> <!-- container -->
  
  <!-----------------------------------End_register--------------------------------------------------------------------------> 
</div>
</body>
