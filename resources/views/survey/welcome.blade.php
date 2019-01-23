<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Welcome Survey</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body class="welcome-app">	

	<div class="content-wrap">
		<div class="header-content flex justify-center align-center">
			<div class="logo">
				<img src="/img/logo-big.png">
			</div>
		</div>
		<div class="body-content">
			<div class="box-img-1">
				<img src="/img/38.jpg">
			</div>
			<div class="box-textInfo">
				<div><h1 class="CUSTOMER_EXPERIENCE_SURVEY">@lang('survey.customer')<br />@lang('survey.experience')<br />@lang('survey.survey')</h1></div>
				<div class="box-last"><a href="{{ route('survey') }}" class="CLICK_HERE_TO_BEGIN">@lang('survey.begin') ></a></div>
			</div>
			<div class="box-img-2">
				<img src="/img/CT_Mockup2.png">
			</div>
		</div>
	</div>
</body>
</html>