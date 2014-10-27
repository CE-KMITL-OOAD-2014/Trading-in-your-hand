<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="back"> 
  <script>
  function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
  
  
   $(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});
   
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
                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="username" tabindex="1" required autofocus>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="name" id="name" class="form-control input-lg" placeholder="First Name" tabindex="2" required autofocus>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="sname" id="sname" class="form-control input-lg" placeholder="Last Name" tabindex="3" required autofocus>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" required autofocus>
          </div>
          <div class="form-group">
            <textarea rows="3" class="form-control" id="address" name="address" placeholder="Address" tabindex="5" style="resize:none" required autofocus></textarea>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="6"required autofocus>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="7" onkeyup="checkPass(); return false;" required autofocus>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 col-sm-3 col-md-3"> <span class="button-checkbox">
              <button type="button" class="btn" data-color="info" tabindex="8">I Agree</button>
              <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
              </span> </div>
            <div class="col-xs-8 col-sm-9 col-md-9"> By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="../member/register" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use. </div>
          </div>
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-12 col-md-6">
              <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7">
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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.min.js"></script> 
</div>
</body>
</html>