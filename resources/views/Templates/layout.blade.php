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
	background-size: 1400px 700px;
	/*background-repeat: no-repeat;*/
	background-image: url({{ URL::asset('assets/images/bg2.png') }});
}
</style>
</head>
<body>
	<div class = "container-fluid>
		<div class="row" >
			<div class="col-md-12">
				@yield('body')
			</div>
		</div>
	</div>
</body>
</html>