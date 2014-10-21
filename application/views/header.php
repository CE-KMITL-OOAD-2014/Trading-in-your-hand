<style>
body{background:#E1E1E1;
}
.top-menu{
	background:#666;
	border:thick solid;
	border-radius:5px;
	border-top:none;
	border-left:none;
	border-right:none;
	}
.top-menu ul{

	height:33px;
	background:#666;
	display:block;
	margin-top:0;
	list-style:none;
	margin-left:50%;
	margin-top:auto;
	margin-right:auto;
	border-left:thin;
	border-right:thin;
	color:white;
	}

.top-menu ul li a{
	padding-left:5%;
	padding-right:5%;
	padding-top:14px;
	padding-bottom:14px;
	float:left;
	text-decoration:none!important;
	color:inherit;
	border:1px solid;
	border-top:none;
	border-bottom:none;
	border-right:none;
	border-color:#CCC;
	}
.top-menu ul li a:hover{
	background:#999;
	color:#666;
	}
.top-menu ul li form{
	float:left;
	margin-top:2.2%;
	margin-left:5%;
	width:5%;	
	}
</style>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
        <div class="top-menu">
            <ul>
                <li><a href='<? echo"".$menuone; ?>'>Home</a></li>
                <li><a href='#'><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"></button>product</a></li>
                <li><a href='<? echo"".$menuthree; ?>'>About</a></li>
                
                <li><img src="Search.png" style="height:50%; width:auto; magin-top:2.2%"/></li>
            </ul>
        </div>
        
        
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
        </body>
</html>