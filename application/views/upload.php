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
		<form action="../member/edit" method="POST" enctype="multipart/form-data" >
            Select File To Upload:<br />
            <input type="file" name="userfile"  />
            <br /><br />
            <input type="submit" name="submit" value="Upload" class="btn btn-success" />
        </form>
 
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="../js/bootstrap.min.js"></script> 
</div>
</body>
</html>