<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?
$data = $this->session->all_userdata();
echo"".$data['username'];
?>
<div class="back">
  <div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="../member/sendmessage" method="post">
        <div class="form-group">
          <label for="Receiver" class="sr-only">Receiver</label>
          <input type="receiver" name="receiver" id="receiver" class="form-control" placeholder="Receiver"  required autofocus>
        </div>
        <div class="form-group">
          <textarea rows="8" class="form-control" id="message" name="message" placeholder="Message" style="resize:none" required autofocus ></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-lg pull-right"> Submit </button>
        </div>
      </form>
      <a href="../pages/viewmessage">View message</a> 
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
      <!-- Include all compiled plugins (below), or include individual files as needed --> 
      <script src="../../js/bootstrap.min.js"></script> 
    </div>
  </div>
</div>
</body>
</html>