<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">
 <?
	$sess = $this->session->all_userdata();
	$num = 0;
    foreach($pdata->result_array() as $rows){
		$num++;
		$data[$num] = $rows;
	}
	$numpage = ($num/5) - round($num/5);
	if($numpage > 0)	$numpage=round($num/5)+1;
	else if($num == 0 )	$numpage = 1;
	else				$numpage=round($num/5);
	?>
<script>
function confirm(id){
	var locate = "../../../product/delete/";
		window.location.href = locate.concat(id);		
}
</script>
</head>
<body>
<div class="back"> 
	<div class="container">
    <div class="col-md-12">
		<div class="row carousel-row">
        	<?
            if($num >= (($ppage*3)-4)){
		echo"
        <div class='slide-row'>
          <div id='carousel-1' class='carousel slide slide-carousel' data-ride='carousel'>
		  	<div class='col-md-3'>              
            <div class='carousel-inner'><div class='item active'> <img src='../../../../../productPic/". $data[(($ppage*3)-4)]['pic1'] .".jpg' class='img-thumbnail' alt='150x150'> </div></div>
          </div></div>
          <div class='slide-content'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'> 
            <h4>".$data[(($ppage*3)-4)]['name']."</h4>
            <p>".$data[(($ppage*3)-4)]['detail']."</p>
			</div>
          </div>
          <div class='slide-footer'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'>
		  <b>Price :</b> ".$data[(($ppage*3)-4)]['price']."     <b>Amount :</b> ".$data[(($ppage*3)-4)]['amount']."</div>";
		  echo"<span class='pull-right buttons'>
            <button class='btn btn-sm btn-default'><i class='fa fa-fw fa-eye'></i> Show</button>
            ";
			if($this->session->userdata('username')&&$id==$sess['username'])
            	echo"<button class='btn btn-sm btn-danger' onClick='confirm(".$data[(($ppage*3)-4)]['id'].")'><i class='fa fa-trash-o fa-lg'></i>Delete</button>";
			else
				echo"<button class='btn btn-sm btn-primary'><i class='fa fa-fw fa-shopping-cart'></i> Buy</button>";
            echo"</span> </div></div>";
			}
			////////////////////////
			if($num >= (($ppage*3)-3)){
		echo"
        <div class='slide-row'>
          <div id='carousel-1' class='carousel slide slide-carousel' data-ride='carousel'>
		  	<div class='col-md-3'>              
            <div class='carousel-inner'><div class='item active'> <img src='../../../../../productPic/". $data[(($ppage*3)-3)]['pic1'] .".jpg' class='img-thumbnail' alt='150x150'> </div></div>
          </div></div>
          <div class='slide-content'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'> 
            <h4>".$data[(($ppage*3)-3)]['name']."</h4>
            <p>".$data[(($ppage*3)-3)]['detail']."</p>
			</div>
          </div>
          <div class='slide-footer'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'>
		  <b>Price :</b> ".$data[(($ppage*3)-3)]['price']."     <b>Amount :</b> ".$data[(($ppage*3)-3)]['amount']."</div>";
		  echo"<span class='pull-right buttons'>
            <button class='btn btn-sm btn-default'><i class='fa fa-fw fa-eye'></i> Show</button>
            ";
			if($this->session->userdata('username')&&$id==$sess['username'])
            	echo"<button class='btn btn-sm btn-danger' onClick='confirm(".$data[(($ppage*3)-3)]['id'].")'><i class='fa fa-trash-o fa-lg'></i>Delete</button>";
			else
				echo"<button class='btn btn-sm btn-primary'><i class='fa fa-fw fa-shopping-cart'></i> Buy</button>";
            echo"</span> </div></div>";
			}
			/////////////////////////
			if($num >= (($ppage*3)-2)){
		echo"
        <div class='slide-row'>
          <div id='carousel-1' class='carousel slide slide-carousel' data-ride='carousel'>
		  	<div class='col-md-3'>              
            <div class='carousel-inner'><div class='item active'> <img src='../../../../../productPic/". $data[(($ppage*3)-2)]['pic1'] .".jpg' class='img-thumbnail' alt='150x150'> </div></div>
          </div></div>
          <div class='slide-content'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'> 
            <h4>".$data[(($ppage*3)-2)]['name']."</h4>
            <p>".$data[(($ppage*3)-2)]['detail']."</p>
			</div>
          </div>
          <div class='slide-footer'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'>
		  <b>Price :</b> ".$data[(($ppage*3)-2)]['price']."     <b>Amount :</b> ".$data[(($ppage*3)-2)]['amount']."</div>";
		  echo"<span class='pull-right buttons'>
            <button class='btn btn-sm btn-default'><i class='fa fa-fw fa-eye'></i> Show</button>
            ";
			if($this->session->userdata('username')&&$id==$sess['username'])
            	echo"<button class='btn btn-sm btn-danger' onClick='confirm(".$data[(($ppage*3)-2)]['id'].")'><i class='fa fa-trash-o fa-lg'></i>Delete</button>";
			else
				echo"<button class='btn btn-sm btn-primary'><i class='fa fa-fw fa-shopping-cart'></i> Buy</button>";
            echo"</span> </div></div>";
			}
			/////////////////////////////
			if($num >= (($ppage*3)-1)){
		echo"
        <div class='slide-row'>
          <div id='carousel-1' class='carousel slide slide-carousel' data-ride='carousel'>
		  	<div class='col-md-3'>              
            <div class='carousel-inner'><div class='item active'> <img src='../../../../../productPic/". $data[(($ppage*3)-1)]['pic1'] .".jpg' class='img-thumbnail' alt='150x150'> </div></div>
          </div></div>
          <div class='slide-content'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'> 
            <h4>".$data[(($ppage*3)-1)]['name']."</h4>
            <p>".$data[(($ppage*3)-1)]['detail']."</p>
			</div>
          </div>
          <div class='slide-footer'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'>
		  <b>Price :</b> ".$data[(($ppage*3)-1)]['price']."     <b>Amount :</b> ".$data[(($ppage*3)-1)]['amount']."</div>";
		  echo"<span class='pull-right buttons'>
            <button class='btn btn-sm btn-default'><i class='fa fa-fw fa-eye'></i> Show</button>
            ";
			if($this->session->userdata('username')&&$id==$sess['username'])
            	echo"<button class='btn btn-sm btn-danger' onClick='confirm(".$data[(($ppage*3)-1)]['id'].")'><i class='fa fa-trash-o fa-lg'></i>Delete</button>";
			else
				echo"<button class='btn btn-sm btn-primary'><i class='fa fa-fw fa-shopping-cart'></i> Buy</button>";
            echo"</span> </div></div>";
			}
			//////////////////////////
			if($num >= (($ppage*3))){
		echo"
        <div class='slide-row'>
          <div id='carousel-1' class='carousel slide slide-carousel' data-ride='carousel'>
		  	<div class='col-md-3'>              
            <div class='carousel-inner'><div class='item active'> <img src='../../../../../productPic/". $data[(($ppage*3))]['pic1'] .".jpg' class='img-thumbnail' alt='150x150'> </div></div>
          </div></div>
          <div class='slide-content'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'> 
            <h4>".$data[(($ppage*3))]['name']."</h4>
            <p>".$data[(($ppage*3))]['detail']."</p>
			</div>
          </div>
          <div class='slide-footer'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'>
		  <b>Price :</b> ".$data[(($ppage*3)-1)]['price']."     <b>Amount :</b> ".$data[(($ppage*3))]['amount']."</div>";
		  echo"<span class='pull-right buttons'>
            <button class='btn btn-sm btn-default'><i class='fa fa-fw fa-eye'></i> Show</button>
            ";
			if($this->session->userdata('username')&&$id==$sess['username'])
            	echo"<button class='btn btn-sm btn-danger' onClick='confirm(".$data[(($ppage*3))]['id'].")'><i class='fa fa-trash-o fa-lg'></i>Delete</button>";
			else
				echo"<button class='btn btn-sm btn-primary'><i class='fa fa-fw fa-shopping-cart'></i> Buy</button>";
            echo"</span> </div></div>";
			}
			?>
        </div>
     <?
	  $now = $ppage/5 - round($ppage/5);
	  if($now>0)
	  	$now = round($ppage/5)+1;
	else
		$now = round($ppage/5);
	  echo"<div class='text-center'><ul class='pagination pagination-large'>";	
		if($ppage!=1)
			echo"<li><a href='../../../../pages/search/".$id."/".($ppage-1)."' rel='prev'>&laquo;</a></li>";	
		if($numpage>=2){	
		if($ppage%5 == 1)echo"<li class='active'><span>".$ppage."</span></li>";
		else echo"<li><a href='../../../../pages/search/".$id."/". (($now*5)-4) ."'>". (($now*5)-4) ."</a></li>";
			if($ppage%5 == 2)echo"<li class='active'><span>".$ppage."</span></li>";
			else echo"<li><a href='../../../../pages/search/".$id."/". (($now*5)-3) ."'>". (($now*5)-3) ."</a></li>";
			if($numpage>=3){
				if($ppage%5 == 3)echo"<li class='active'><span>".$ppage."</span></li>";
				else echo"<li><a href='../../../../pages/search/".$id."/". (($now*5)-2) ."'>". (($now*5)-2) ."</a></li>";
				if($numpage>=4){
					if($ppage%5 == 4)echo"<li class='active'><span>".$ppage."</span></li>";
					else echo"<li><a href='../../../../pages/search/".$id."/". (($now*5)-1) ."'>". (($now*5)-1) ."</a></li>";
					if($numpage>=5){
						if($ppage%5 == 5)echo"<li class='active'><span>".$ppage."</span></li>";
						else echo"<li><a href='../../../../pages/search/".$id."/". ($now*5) ."'>". ($now*5) ."</a></li>";
					
		}}}}
	if($ppage != $numpage)
		echo"<li><a href='../../../../pages/member/".$id."/".($ppage+1)."' rel='next'>&raquo;</a></li>";
	echo"</ul></div>";
	?>
    </div>
 	</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="../js/bootstrap.min.js"></script> 
</div>
</body>
</html>