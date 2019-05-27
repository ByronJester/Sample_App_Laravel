<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="{{asset('css\app.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.all.min.js"></script>
	<title></title>

<style type="text/css">
	body {

	}

	.navbar {
		border-radius: 0% !important;
		background-color: #40739e;
	}

	a {
		color: white !important;
	}

	#mySidenav a {
	  position: absolute;
	  left: -170px;
	  transition: 0.3s;
	  padding-top: 15px;
	  padding-bottom: 15px;
	  padding-left: 10px;
	  width: 180px;
	  text-decoration: none;
	  font-size: 20px;
	  color: white;
	  border-radius: 0 5px 5px 0;
	}
	 
	#mySidenav a:hover {
	  left: -25px;
	}

	#home {
	  top: 0px;
	  background-color: #2bcbba;
	}
	#companies {
	  top: 70px;
	  background-color: #2d98da;
	}
	#profile {
	  top: 140px;
	  background-color: #eb4d4b;
	}

</style>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">LARAVEL APP</a>
	    </div>
	    
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="/logout"><span class="fa fa-door-open"></span> Logout</a></li>
	    </ul>
	  </div>
	</nav>

	<div class = "container-fluid">
		<div class="row">
			<div class="col-sm-12">

				<div class = "col-xs-2">
					<div id="mySidenav" class="sidenav">
						<a href="/users" id="home"><span class="fa fa-home"></span> HOME</a>
						<a href="#" id="companies"><span class="fas fa-building"></span> COMPANY</a>
					  <a href="/profile" id="profile"><span class="fa fa-users-cog"></span> PROFILE</a>
					</div>
				</div>

				<div class="col-md-10">
					@yield('body')
				</div>
			</div>
		</div>
	</div>

</body>
</html>