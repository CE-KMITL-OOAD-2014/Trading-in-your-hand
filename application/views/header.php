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

	height:5%;
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
	padding-top:2.2%;
	padding-bottom:2.2%;
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
<meta charset="utf-8"/>
<title>Home</title>
</head>
<body>
<div class="top-menu">
	<ul>
		<li><a href='<? echo"".$menuone; ?>'>Home</a></li>
		<li><a href='<? echo"".$menutwo; ?>'>Product</a></li>
		<li><a href='<? echo"".$menuthree; ?>'>About</a></li>
		
        <li><img src="Search.png" style="height:50%; width:auto; magin-top:2.2%"/></li>
	</ul>
</div>
</body>
</html>