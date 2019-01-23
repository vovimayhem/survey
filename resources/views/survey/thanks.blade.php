<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Thank you</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
</head>
<body>

	<div class="content-wrap" style="overflow:hidden;">
		<div class="footer-content flex justify-center align-center">
			<div class="logo">
				<img src="img/logo-big.png">
			</div>
		</div>
		<div class="box-center-thanks flex align-center justify-center"><h1>Thank You!</h1></div>
		<div class="box-background">
			<img src="img/9.jpg">
		</div>

		<div class="home"><a href="{{ route('welcome') }}"><div class="content-home"><img src="img/home.png"></div></a></div>
	</div>	
</body>
</html>