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
	<?
    	foreach($data->result_array() as $row)
			echo"".$data['sender']." ".$data['time']."".$data['message']."<br/>";
		echo"<a href='../pages'>back</a>";
	?>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="../../js/bootstrap.min.js"></script> 
</div>
</body>
</html>