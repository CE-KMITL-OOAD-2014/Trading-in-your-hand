<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="back"> <br/>
  <br/>
  <section class="section-white">
    <div class="container">
      <div class="col-md-12 col-xs-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          <!-- Indicators --> 
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active"> <a href="#"><img src="../../images/promotion1.jpg" alt="..."/></a>
              <div class="carousel-caption">
                <h2></h2>
              </div>
            </div>
            <div class="item"> <a href="#"><img src="../../images/promotion2.jpg" alt="..."></a>
              <div class="carousel-caption">
                <h2></h2>
              </div>
            </div>
            <div class="item"> <a href="#"><img src="../../images/promotion3.jpg" alt="..."></a>
              <div class="carousel-caption">
                <h2></h2>
              </div>
            </div>
          </div>
          
          <!-- Controls --> 
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
      </div>
      <!-->   <div class="col-md-2"></div><!--> 
    </div>
  </section>
  <br/>
  <br/>
  <div class="container">
    <h2>New arrival.</h2>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Include all compiled plugins (below), or include individual files as needed --> 
  <script src="js/bootstrap.min.js"></script>
  <div class="container" id="tourpackages-carousel">
    <div class="row">
      <div class="col-xs-18 col-sm-6 col-md-3">
        <div class="thumbnail"> <img src="../../productPic/<? echo"".$data[1]['pic1']; ?>.jpg" alt="">		<!--> Display New arrival product  <-->
          <div class="caption">
            <h4><? echo"".$data[1]['name']; ?></h4>
            <p><? echo"".$data[1]['detail']; ?></p>
            <p><? echo"<b>Owner :</b>&nbsp;<a href='pages/member/".$data[1]['username']."'>".$data[1]['username']; ?></a></p>
            <p><? echo"<b>Price :</b>&nbsp;".$data[1]['price']; ?></p>
            <p><? echo"<b>Amount :</b>&nbsp;".$data[1]['amount']; ?></p>
            <p><? echo"<a class='btn btn-sm btn-primary' href='../../../../pages/buy/".$data[1]['id']."'><i class='fa fa-fw fa-shopping-cart'></i>Buy</a>"; ?></p>
          </div>
        </div>
      </div>
      <div class="col-xs-18 col-sm-6 col-md-3">
        <div class="thumbnail"> <img src="../../productPic/<? echo"".$data[2]['pic1']; ?>.jpg" alt="">
          <div class="caption">
            <h4><? echo"".$data[2]['name']; ?></h4>
            <p><? echo"".$data[2]['detail']; ?></p>
            <p><? echo"<b>Owner :</b>&nbsp;<a href='pages/member/".$data[2]['username']."'>".$data[2]['username']; ?></a></p>
            <p><? echo"<b>Price :</b>&nbsp;".$data[2]['price']; ?></p>
            <p><? echo"<b>Amount :</b>&nbsp;".$data[2]['amount']; ?></p>
            <p><? echo"<a class='btn btn-sm btn-primary' href='../../../../pages/buy/".$data[2]['id']."'><i class='fa fa-fw fa-shopping-cart'></i>Buy</a>"; ?></p>
          </div>
        </div>
      </div>
      <div class="col-xs-18 col-sm-6 col-md-3">
        <div class="thumbnail"> <img src="../../productPic/<? echo"".$data[3]['pic1']; ?>.jpg" alt="">
          <div class="caption">
            <h4><? echo"".$data[3]['name']; ?></h4>
            <p><? echo"".$data[3]['detail']; ?></p>
            <p><? echo"<b>Owner :</b>&nbsp;<a href='pages/member/".$data[3]['username']."'>".$data[3]['username']; ?></a></p>
            <p><? echo"<b>Price :</b>&nbsp;".$data[3]['price']; ?></p>
            <p><? echo"<b>Amount :</b>&nbsp;".$data[3]['amount']; ?></p>
            <p><? echo"<a class='btn btn-sm btn-primary' href='../../../../pages/buy/".$data[3]['id']."'><i class='fa fa-fw fa-shopping-cart'></i>Buy</a>"; ?></p>
          </div>
        </div>
      </div>
      <div class="col-xs-18 col-sm-6 col-md-3">
        <div class="thumbnail"> <img src="../../productPic/<? echo"".$data[4]['pic1']; ?>.jpg" alt="">
          <div class="caption">
            <h4><? echo"".$data[4]['name']; ?></h4>
            <p><? echo"".$data[4]['detail']; ?></p>
            <p><? echo"<b>Owner :</b>&nbsp;<a href='pages/member/".$data[4]['username']."'>".$data[4]['username']; ?></a></p>
            <p><? echo"<b>Price :</b>&nbsp;".$data[4]['price']; ?></p>
            <p><? echo"<b>Amount :</b>&nbsp;".$data[4]['amount']; ?></p>
            <p><? echo"<a class='btn btn-sm btn-primary' href='../../../../pages/buy/".$data[4]['id']."'><i class='fa fa-fw fa-shopping-cart'></i>Buy</a>"; ?></p>
          </div>
        </div>
      </div>
    </div>
    <!-- End row --> 
    
  </div>
  <!-- End container --> 
</div>
</body>
</html>