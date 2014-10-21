<html>
<head><title>Untitled Document</title>
</head>
<body>
<?	
	$point = 1;
	foreach($data->result_array() as $row[$point]){
			echo"".$row[$point]['name']." ".$row[$point]['price']." ".$row[$point]['amount']." "."<a href='../Pages/editproduct?name=".$row[$point]['name']."&price=".$row[$point]['price']."&amount=".$row[$point]['amount']."'>edit</a><br/>";
			$point++;	
	}
	echo"<a href='../Pages'>Back</a>";
?>
</body>
</html>