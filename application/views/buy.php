<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<script>
  $(document).ready(function () {
   $("#amount").keyup(cal);
});
	function cal(){
		var amount = $("#amount").val();
		var price = <? echo $price; ?>;
		sum = amount*price;
		str = "";
		str = str.concat(sum);
		str = str.concat(" THB");
		$('#sum').text(str);
	}
	function buy(){
		var amount = $("#amount").val();
		var id = "<? echo $id; ?>";
		direct = id.concat("/".concat(amount));
		window.location.href = "../../../../product/buy/".concat(direct);
	}

</script>
<body>
<div class = "back">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel"><i class="text-muted fa fa-shopping-cart"></i> <strong><? echo $id; ?></strong> - <? echo $name; ?> </h3>
      </div>
      <div class="modal-body">
        <table class="pull-left col-md-8 ">					<!-- Show purchase history -->
          <tbody>
            <tr>
              <td class="h5"><strong>ID</strong></td>
              <td></td>
              <td><? echo $id; ?></td>
            </tr>
            <tr>
              <td class="h5"><strong>Name</strong></td>
              <td></td>
              <td><? echo $name; ?></td>
            </tr>
            <tr>
              <td class="h5"><strong>Owner</strong></td>
              <td></td>
              <td><? echo $username; ?></td>
            </tr>
            <tr>
              <td class="h5"><strong>Price</strong></td>
              <td></td>
              <td><? echo $price; ?></td>
            </tr>
            <tr>
              <td class="h5"><strong>Available</strong></td>
              <td></td>
              <td><? echo $amount; ?></td>
            </tr>
            <tr>
              <td >&nbsp;</td>
            </tr>
            <tr>
              <td class="h5"><strong>Detail</strong></td>
              <td></td>
              <td><? echo $detail; ?></td>
            </tr>
            <tr>
              <td >&nbsp;</td>
            </tr>
            <tr>
              <td class="h5"><strong>Amount</strong></td>
              <td></td>
              <td><label for="Amount" class="sr-only">Amount</label>
                <input type="Amount" name="amount" id="amount" class="form-control" placeholder="Amount" required="required" autofocus="autofocus" /></td>
            </tr>
            <tr>
              <td class="h5"></td>
            </tr>
          </tbody>
        </table>
        <div class="col-md-4"> <img src="../../../../productPic/<? echo $pic1; ?>.jpg" alt="teste" class="img-thumbnail" /> </div>
        <div class="clearfix"></div>
        <p class="open_info hide"></p>
      </div>
      <div class="modal-footer">
        <div class="text-right pull-right col-md-3">
          <input type="button" value="Buy" id="buy" class="btn btn-primary btn-block btn-lg" onclick="buy();" />
        </div>
        <div class="text-right pull-right col-md-3"> Summary: <br/>
          <strong><span class="availability sum" id="sum">0 THB</span></strong></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>