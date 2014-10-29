<body>
<?
$username = $this->session->all_userdata();
echo"".$username['username'];
?>
<div class="back"> 
	<?
    	foreach($data->result_array() as $row)
			echo"".$row['sender']."     ".$row['time']."     ".$row['message']."<br/>";
		echo"<a href='../pages'>back</a>";
	?>
</div>
</body>
