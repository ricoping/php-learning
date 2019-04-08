<?

$routerConfit = [
	'/phpinfo' => '/phpinfo',
];

$uriPath = parse_url($_SERVER['REQUEST_URI'])['path'];
/*
if(!isset($routerConfig[$uriPath])){
	header('HTTP/1.0 404 Not Found');
	return;
}

$basePath = __DIR__.'/../controller';

$ctrlPath = realpath($basePath.$routerConfig[$uriPath].'.php');
if($ctrlPath){
	require($ctrlPath);
}else{
	header('HTTP/1.0 500 Internal Server Error');
	return;
}*/


?>

<html>
<head>
<meta charset="utf-8">
<title>PHP Middle</title>
</head>
<body>
<hr>
<h1>PHPer</h1>
parse<br>
<? echo var_dump(parse_url($_SERVER['REQUEST_URI'])); ?>
<hr>
<? echo $uriPath; ?>
<pre>
<? echo var_dump($_SERVER); ?>
</pre>

<hr>

<?echo $basePath;?>

</body>
</html>