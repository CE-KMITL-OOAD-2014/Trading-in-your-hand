<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap 101 Template</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class ="back"> 
  
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
        <label for="name" class="sr-only">name</label>
        <input type="name" name="name" id="name" class="form-control"style="background-color:#FFC" placeholder="NameProduct" required autofocus>
        <label for="cost" class="sr-only">cost</label>
        <input type="cost" name="cost" id="cost" class="form-control"style="background-color:#FFC" placeholder="Cost" required autofocus>
        <label for="Amount" class="sr-only">Amount</label>
        <input type="Amount" name="Amount" id="Amount" class="form-control"style="background-color:#FFC" placeholder="Amount" required autofocus>
        <div class="form-group">
          <textarea rows="8" class="form-control" placeholder="Detail" style="resize:none;background-color:#FFC" required autofocus ></textarea>
        </div>
      </div>
      <div class="row hidden-xs" >
        <div class="col-md-12">
          <div class="col-md-2"></div>
          <div class="col-md-2"> <a class="thumbnail" id="carousel-selector-1"><img src="http://placehold.it/170x100&text=one"></a> </div>
          <div class="col-md-2"> <a class="thumbnail" id="carousel-selector-2"><img src="http://placehold.it/170x100&text=two"></a> </div>
        </div>
      </div>
    </div>
    <!---->
    <div class="col-md-10">
    <div class="pull-right">
    <button type="button" class="btn btn-default btn-lg" style="background-color:#0CF" >  Upload </button>
  </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>