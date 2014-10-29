<style>
@import url(//fonts.googleapis.com/css?family=Lato:400,900);
 @import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
body {
	padding: 60px 0px;
}
.animate {
	-webkit-transition: all 0.3s ease-in-out;
	-moz-transition: all 0.3s ease-in-out;
	-o-transition: all 0.3s ease-in-out;
	-ms-transition: all 0.3s ease-in-out;
	transition: all 0.3s ease-in-out;
}
.info-card {
	width: 100%;
	border: 1px solid rgb(215, 215, 215);
	position: relative;
	font-family: 'Lato', sans-serif;
	margin-bottom: 20px;
	overflow: hidden;
}
.info-card > img {
	width: 100px;
	margin-bottom: 60px;
}
.info-card .info-card-details, .info-card .info-card-details .info-card-header {
	width: 100%;
	height: 100%;
	position: absolute;
	bottom: -100%;
	left: 0;
	padding: 0 15px;
	background: rgb(255, 255, 255);
	text-align: center;
}
 .info-card .info-card-details::-webkit-scrollbar {
 width: 8px;
}
 .info-card .info-card-details::-webkit-scrollbar-button {
 width: 8px;
 height: 0px;
}
 .info-card .info-card-details::-webkit-scrollbar-track {
 background: transparent;
}
 .info-card .info-card-details::-webkit-scrollbar-thumb {
 background: rgb(160, 160, 160);
}
 .info-card .info-card-details::-webkit-scrollbar-thumb:hover {
 background: rgb(130, 130, 130);
}
.info-card .info-card-details .info-card-header {
	height: auto;
	bottom: 100%;
	padding: 10px 5px;
}
.info-card:hover .info-card-details {
	bottom: 0px;
	overflow: auto;
	padding-bottom: 25px;
}
.info-card:hover .info-card-details .info-card-header {
	position: relative;
	bottom: 0px;
	padding-top: 45px;
	padding-bottom: 25px;
}
.info-card .info-card-details .info-card-header h1, .info-card .info-card-details .info-card-header h3 {
	color: rgb(62, 62, 62);
	font-size: 22px;
	font-weight: 900;
	text-transform: uppercase;
	margin: 0 !important;
	padding: 0 !important;
}
.info-card .info-card-details .info-card-header h3 {
	color: rgb(142, 182, 52);
	font-size: 15px;
	font-weight: 400;
	margin-top: 5px;
}
.info-card .info-card-details .info-card-detail .social {
	list-style: none;
	padding: 0px;
	margin-top: 25px;
	text-align: center;
}
.info-card .info-card-details .info-card-detail .social a {
	position: relative;
	display: inline-block;
	min-width: 40px;
	padding: 10px 0px;
	margin: 0px 5px;
	overflow: hidden;
	text-align: center;
	background-color: rgb(215, 215, 215);
	border-radius: 40px;
}
a.social-icon {
	text-decoration: none !important;
	box-shadow: 0px 0px 1px rgb(51, 51, 51);
	box-shadow: 0px 0px 1px rgba(51, 51, 51, 0.7);
}
a.social-icon:hover {
	color: rgb(255, 255, 255) !important;
}
a.facebook {
	color: rgb(59, 90, 154) !important;
}
a.facebook:hover {
	background-color: rgb(59, 90, 154) !important;
}
a.twitter {
	color: rgb(45, 168, 225) !important;
}
a.twitter:hover {
	background-color: rgb(45, 168, 225) !important;
}
a.github {
	color: rgb(51, 51, 51) !important;
}
a.github:hover {
	background-color: rgb(51, 51, 51) !important;
}
a.google-plus {
	color: rgb(244, 94, 75) !important;
}
a.google-plus:hover {
	background-color: rgb(244, 94, 75) !important;
}
a.linkedin {
	color: rgb(1, 116, 179) !important;
}
a.linkedin:hover {
	background-color: rgb(1, 116, 179) !important;
}

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
<html>
<head>
</head>
<body>
<div class="back">
  <div class="container">
    <div class="col-md-3">
      <div class="[ info-card ]"> <img style="width: 100%" src="https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-frc3/v/t1.0-9/943644_3168331383872_1982085005_n.jpg?oh=a5f8ef8e34d18e4e2279616d2f99a3ea&oe=54EA273F&__gda__=1420737788_fe56ec5b6a2987d60f1a199d77186d74" />
        <div class="[ info-card-details ] animate">
          <div class="[ info-card-header ]">
            <h1> Nitipat Suttirak </h1>
            <h3> aka PaelnwZa55x </h3>
          </div>
          <div class="[ info-card-detail ]"> 
            <!-- Description -->
            <p>About me not about you :P</p>
            <div class="social"> <a href="https://www.facebook.com/nitipat.suttirak" class="[ social-icon facebook ] animate"><span class="fa fa-facebook"></span></a> <a href="#" class="[ social-icon twitter ] animate"><span class="fa fa-twitter"></span></a> <a href="https://github.com/nitipatt" class="[ social-icon github ] animate"><span class="fa fa-github-alt"></span></a> <a href="#" class="[ social-icon google-plus ] animate"><span class="fa fa-google-plus"></span></a> <a href="#" class="[ social-icon linkedin ] animate"><span class="fa fa-linkedin"></span></a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="row carousel-row">
        <div class="slide-row">
          <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">             
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active"> <img src="http://lorempixel.com/150/150?rand=1" alt="Image"> </div>
            </div>
          </div>
          <div class="slide-content">
            <h4>Example product</h4>
            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
              sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat </p>
          </div>
          <div class="slide-footer"> <span class="pull-right buttons">
            <button class="btn btn-sm btn-default"><i class="fa fa-fw fa-eye"></i> Show</button>
            <button class="btn btn-sm btn-primary"><i class="fa fa-fw fa-shopping-cart"></i> Buy</button>
            </span> </div>
            
        </div>
        <div class="slide-row">
          <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">             
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active"> <img src="http://lorempixel.com/150/150?rand=1" alt="Image"> </div>
            </div>
          </div>
          <div class="slide-content">
            <h4>Example product</h4>
            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
              sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat </p>
          </div>
          <div class="slide-footer"> <span class="pull-right buttons">
            <button class="btn btn-sm btn-default"><i class="fa fa-fw fa-eye"></i> Show</button>
            <button class="btn btn-sm btn-primary"><i class="fa fa-fw fa-shopping-cart"></i> Buy</button>
            </span> </div>
            
        </div>
        <div class="slide-row">
          <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">             
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active"> <img src="http://lorempixel.com/150/150?rand=1" alt="Image"> </div>
            </div>
          </div>
          <div class="slide-content">
            <h4>Example product</h4>
            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
              sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat </p>
          </div>
          <div class="slide-footer"> <span class="pull-right buttons">
            <button class="btn btn-sm btn-default"><i class="fa fa-fw fa-eye"></i> Show</button>
            <button class="btn btn-sm btn-primary"><i class="fa fa-fw fa-shopping-cart"></i> Buy</button>
            </span> </div>
            
        </div>
        <!--class row--> 
      </div>
    </div>
  </div>
</div>
</body>
</html>