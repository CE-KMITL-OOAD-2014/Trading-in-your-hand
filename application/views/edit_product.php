<html>
<head>
</head>
<body>
<div class="back">
  <div class = "container">
    <div col-md-12>
      <div>
        <div class="col-md-2"></div>
        <h3> Edit Product</h3>
      </div>
      <div class="col-md-2"></div>
      <form action="../../../../product/edit/<? echo $id; ?>" method="post" id="data" name="data" enctype="multipart/form-data">
        <div class="col-md-4"> <a class="thumbnail" > <img src="../../../productPic/<? echo $pic1; ?>.jpg"></a>
          <input type="file" name="userfile" class="text-center center-block well well-sm"/>
        </div>
        <div class="col-md-4">
          <label for="name" class="sr-only">name</label>
          <input type="name" name="name" id="name" class="form-control" placeholder="NameProduct" value="<? echo $name; ?>" readonly="readonly">
          <label for="cost" class="sr-only">cost</label>
          <input type="cost" name="price" id="price" class="form-control" placeholder="Cost" value="<? echo $price; ?>" required autofocus>
          <label for="Amount" class="sr-only">Amount</label>
          <input type="Amount" name="amount" id="amount" class="form-control" placeholder="Amount" value="<? echo $amount; ?>" required autofocus>
          <select class="form-control" id ="type" name="type">
            <?		// Show old type of this product
		if($type!="electronics")
			echo"<option value='electronics'>Electronics</option>";
		else
			echo"<option value='electronics' selected='selected'>Electronics</option>";
		if($type!="cloths")
        	echo"<option value='cloths'>Cloths</option>";
		else
			echo"<option value='cloths' selected='selected'>Cloths</option>";
		if($type!="others")
			echo"<option value='others'>Others</option>";
		else
        	echo"<option value='others' selected='selected'>Others</option>";
		?>
          </select>
          <div class="form-group">
            <textarea rows="8" class="form-control" id="detail" name="detail" placeholder="Detail" style="resize:none" required autofocus ><? echo $detail; ?></textarea>
          </div>
          <div class="form-group">
            <button type="submit" id="sub" class="btn btn-primary btn-block btn-lg pull-right" form = "data"> Submit </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>