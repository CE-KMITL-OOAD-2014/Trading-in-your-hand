<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<style>
/* FONT AWESOME & not necessary for functions */
@import url('http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
/*REQUIRED*/
.carousel-row {
	margin-bottom: 10px;
}
.slide-row {
	padding: 0;
	background-color: #ffffff;
	min-height: 150px;
	border: 1px solid #e7e7e7;
	overflow: hidden;
	height: auto;
	position: relative;
}
.slide-content {
	position: absolute;
	top: 0;
	left: 20%;
	display: block;
	float: left;
	width: 80%;
	max-height: 76%;
	padding: 1.5% 2% 2% 2%;
	overflow-y: auto;
}
.slide-content h4 {
	margin-bottom: 3px;
	margin-top: 0;
}
.slide-footer {
	position: absolute;
	bottom: 0;
	left: 20%;
	width: 78%;
	height: 20%;
	margin: 1%;
}

/* Scrollbars */
.slide-content::-webkit-scrollbar {
 width: 5px;
}
 .slide-content::-webkit-scrollbar-thumb:vertical {
 margin: 5px;
 background-color: #999;
 -webkit-border-radius: 5px;
}
 .slide-content::-webkit-scrollbar-button:start:decrement, .slide-content::-webkit-scrollbar-button:end:increment {
 height: 5px;
 display: block;
}
</style>
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
      <?
	$sess = $this->session->all_userdata();
	$num = 0;
    foreach($pdata->result_array() as $rows){
		$num++;
		$data[$num] = $rows;
	}
	$numpage = ($num/3) - round($num/3);
	if($numpage > 0)	$numpage=round($num/3)+1;
	else if($num == 0 )	$numpage = 1;
	else				$numpage=round($num/3);
	?>
      <div class="row carousel-row">
        <?	// Display search product
		echo"
        <div class='slide-row'>
          <div id='carousel-1' class='carousel slide slide-carousel' data-ride='carousel'>    
		  	<div class='col-md-3'>         
            <div class='carousel-inner'>";
			if($num!=0)
			echo"<div class='item active'> <img src='../../../../../productPic/". $data[(($ppage*3)-2)]['pic1'] .".jpg' class='img-thumbnail' alt='150x150'> </div>";
			else echo"<div class='item active'> <img src='http://lorempixel.com/150/150?rand=1' class='img-thumbnail' alt='150x150'> </div>";
			echo"
			</div></div>
          </div>
          <div class='slide-content'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'>"; 
		  if($num!=0)
		  echo"<h4>".$data[(($ppage*3)-2)]['name']."</h4><p>".$data[(($ppage*3)-2)]['detail']."</p><b>Type :</b>&nbsp;".$data[(($ppage*3)-2)]['type']."<br/>";
		  else echo"<h4>Product not found.</h4><p>Sorry , We don't found any product.</p>";
		  echo"</div>
          </div>
          <div class='slide-footer'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'>";
		  if($num!=0){
		  echo"<b>Owner :</b>&nbsp;<a href='../../../../../pages/member/".$data[(($ppage*3)-2)]['username']."'>".$data[(($ppage*3)-2)]['username']."</a><br/>";
		  echo"<b>Price :</b> ".$data[(($ppage*3)-2)]['price']."     <b>Amount :</b> ".$data[(($ppage*3)-2)]['amount']."</div>";
		  }
		  echo" <span class='pull-right buttons'>";
			if($this->session->userdata('username')&&$id==$sess['username']&&$num!=0)
            	echo"<button class='btn btn-sm btn-danger' onClick='confirm(".$data[(($ppage*3)-2)]['id'].")'><i class='fa fa-trash-o fa-lg'></i>Delete</button>";
			else if($num!=0)
				echo"<a class='btn btn-sm btn-primary' href='../../../../pages/buy/".$data[(($ppage*3)-2)]['id']."'><i class='fa fa-fw fa-shopping-cart'></i>Buy</a>";
            echo"</span> </div></div>";
         //////////////////////////////
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
			<b>Type :</b>&nbsp;".$data[(($ppage*3)-1)]['type']."<br/>
			</div>
          </div>
          <div class='slide-footer'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'>
		  <b>Owner :</b>&nbsp;<a href='../../../../../pages/member/".$data[(($ppage*3)-1)]['username']."'>".$data[(($ppage*3)-1)]['username']."</a><br/>
		  <b>Price :</b> ".$data[(($ppage*3)-1)]['price']."     <b>Amount :</b> ".$data[(($ppage*3)-1)]['amount']."</div>";
		  echo"<span class='pull-right buttons'>";
			if($this->session->userdata('username')&&$id==$sess['username'])
            	echo"<button class='btn btn-sm btn-danger' onClick='confirm(".$data[(($ppage*3)-1)]['id'].")'><i class='fa fa-trash-o fa-lg'></i>Delete</button>";
			else
				echo"<a class='btn btn-sm btn-primary' href='../../../../pages/buy/".$data[(($ppage*3)-1)]['id']."'><i class='fa fa-fw fa-shopping-cart'></i>Buy</a>";
            echo"</span> </div></div>";
			}
         //////////////////
		 if($num >= ($ppage*3)){
		echo"
        <div class='slide-row'>
          <div id='carousel-1' class='carousel slide slide-carousel' data-ride='carousel'>
		  	<div class='col-md-3'>              
            <div class='carousel-inner'><div class='item active'> <img src='../../../../../productPic/". $data[($ppage*3)]['pic1'] .".jpg' class='img-thumbnail' alt='150x150'> </div></div>
          </div></div>
          <div class='slide-content'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'> 
            <h4>".$data[($ppage*3)]['name']."</h4>
            <p>".$data[($ppage*3)]['detail']."</p>
			<b>Type :</b>&nbsp;".$data[(($ppage*3))]['type']."<br/>
			</div>
          </div>
          <div class='slide-footer'>
		  <div class='col-md-1'></div>
		  <div class='col-md-5'>
		  <b>Owner :</b>&nbsp;<a href='../../../../../pages/member/".$data[(($ppage*3))]['username']."'>".$data[(($ppage*3))]['username']."</a><br/>
		  <b>Price :</b> ".$data[($ppage*3)]['price']."     <b>Amount :</b> ".$data[($ppage*3)]['amount']."</div>";
		  echo"<span class='pull-right buttons'>";
			if($this->session->userdata('username')&&$id==$sess['username'])
            	echo"<button class='btn btn-sm btn-danger' onClick='confirm(".$data[($ppage*3)]['id'].")'><i class='fa fa-trash-o fa-lg'></i>Delete</button>";
			else
				echo"<a class='btn btn-sm btn-primary' href='../../../../pages/buy/".$data[(($ppage*3))]['id']."'><i class='fa fa-fw fa-shopping-cart'></i>Buy</a>";
            echo"</span> </div></div>";}
          ?>
        <!--class row--> 
      </div>
      <?
	if($ppage%5==1)
		$c = $ppage+4;
	if($ppage%5==2)
		$c = $ppage+3;
	if($ppage%5==3)
		$c = $ppage+2;
	if($ppage%5==4)
		$c = $ppage+1;
	if($ppage%5==0)
		$c = $ppage;
	$x = ($c/5)-1;
		
	  $now = $ppage/5 - round($ppage/5);
	  if($now>0)
	  	$now = round($ppage/5)+1;
	else
		$now = round($ppage/5);
	  echo"<div class='text-center'><ul class='pagination pagination-large'>";	
		if($ppage!=1)
			echo"<li><a href='../../../../pages/search/".$type."/".$name."/".($ppage-1)."' rel='prev'>&laquo;</a></li>";	
		if($numpage>=(5*$x)+1){	
		if($ppage%5 == 1)echo"<li class='active'><span>".$ppage."</span></li>";
		else echo"<li><a href='../../../../pages/search/".$type."/".$name."/". (($now*5)-4) ."'>". (($now*5)-4) ."</a></li>";
			if($numpage>=(5*$x)+2){	
			if($ppage%5 == 2)echo"<li class='active'><span>".$ppage."</span></li>";
			else echo"<li><a href='../../../../pages/search/".$type."/".$name."/". (($now*5)-3) ."'>". (($now*5)-3) ."</a></li>";
			if($numpage>=(5*$x)+3){
				if($ppage%5 == 3)echo"<li class='active'><span>".$ppage."</span></li>";
				else echo"<li><a href='../../../../pages/search/".$type."/".$name."/". (($now*5)-2) ."'>". (($now*5)-2) ."</a></li>";
				if($numpage>=(5*$x)+4){
					if($ppage%5 == 4)echo"<li class='active'><span>".$ppage."</span></li>";
					else echo"<li><a href='../../../../pages/search/".$type."/".$name."/". (($now*5)-1) ."'>". (($now*5)-1) ."</a></li>";
					if($numpage>=(5*$x)+5){
						if($ppage%5 == 0)echo"<li class='active'><span>".$ppage."</span></li>";
						else echo"<li><a href='../../../../pages/search/".$type."/".$name."/". ($now*5) ."'>". ($now*5) ."</a></li>";
					
		}}}}}
	if($ppage != $numpage)
		echo"<li><a href='../../../../pages/search/".$type."/".$name."/".($ppage+1)."' rel='next'>&raquo;</a></li>";
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