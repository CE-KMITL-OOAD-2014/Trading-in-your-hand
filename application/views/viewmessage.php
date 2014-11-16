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
$username = $this->session->all_userdata();
?>
<br/>
<div class="back">
  <div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>From</th>
              <th>Time</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody>
            <?
    	foreach($data->result_array() as $row)
			echo"<tr><td></td><td>".$row['sender']."</td><td>".$row['time']."</td><td>".$row['message']."</td></tr>";
		?>
          </tbody>
        </table>
      </div>
      <div class="form-group"> <a class='btn btn-primary btn-block btn-lg pull-right' href='../../../pages/message'>Send Message</a></div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
      <!-- Include all compiled plugins (below), or include individual files as needed --> 
      <script src="../../js/bootstrap.min.js"></script> 
    </div>
  </div>
</div>
</body>
</html>