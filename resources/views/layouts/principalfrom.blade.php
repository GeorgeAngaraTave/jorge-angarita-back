<html>
<head>
<title></title>

<!-- Latest compiled and minified CSS -->
{!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')!!}
<!-- Optional theme -->
{!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css')!!}

<!-- Latest compiled and minified JavaScript -->
{!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')!!}
<!--webfont-->

{!!Html::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800')!!}
{!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js')!!}

{!!Html::script('js/script.js')!!}
</head>
<body>
@yield('content')
</body>
</html>
