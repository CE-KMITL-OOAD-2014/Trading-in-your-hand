<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<? 			$id = $this->session->all_userdata();
			$id = $id['username']; ?>
</head>
<body>
<div class="back"> 
  <!-------------------------------show product--------------------------------------------------------------------------------------------------->
  
  <div class = "container">
    <div col-md-12>
      <div>
        <div class="col-md-2"></div>
        <h3> Add Product</h3>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-4"> <a class="thumbnail" > <img src="http://fc07.deviantart.net/fs70/i/2012/358/7/2/_rurouni_kenshin__art_of_sword_drawing__by_eyjaynizel-d5p0jtr.jpg"></a> </div>
      <div class="col-md-4">
      <form action="#" method="post" id="data" name="data">
        <label for="name" class="sr-only">name</label>
        <input type="name" name="name" id="name" class="form-control" placeholder="NameProduct" required autofocus>
        <label for="cost" class="sr-only">cost</label>
        <input type="cost" name="cost" id="cost" class="form-control" placeholder="Cost" required autofocus>
        <label for="Amount" class="sr-only">Amount</label>
        <input type="Amount" name="Amount" id="Amount" class="form-control" placeholder="Amount" required autofocus>
        <div class="form-group">
          <textarea rows="8" class="form-control" placeholder="Detail" style="resize:none" required autofocus ></textarea>
        </div>
        </form>
      </div>
      <div class="row hidden-xs" >
        <div class="col-md-12">
          <div class="col-md-8"></div>
          <div class="col-md-2">
          <br/>
          <button type="submit" class="btn btn-default btn-lg pull-right" form = "data">  Submit </button>
          </div>
        </div>
      </div>
    </div>
    <!---->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="../../js/bootstrap.min.js"></script> 
</div>
</body>
</html>