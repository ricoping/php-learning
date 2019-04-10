<?

require implode(DIRECTORY_SEPARATOR, [__DIR__,  "..", "vendor", 'autoload.php']);


header('Content-Type: text/html; charset=UTF-8');


ini_set('mbstring.internal_encoding' , 'UTF-8');

echo "2*倍返しだ = ".NaokiHanzawa::baigaeshida(10000).PHP_EOL;

echo "<hr>";
$arr = array(1, 2, "hello");
$arr2 = [1, 3, 5, 7, 8];

var_dump($arr);
echo "<br>";
foreach($arr as $v){
	echo $v."<br>";
}

var_dump($arr + $arr2);
echo "<hr>";
var_dump(array_merge($arr, $arr2));//dictionaryでも可能

$arr3 = ['fruits' => 'apple', 'code' => 'php'];
$arr4 = ['fruits' =>'orange', 'drink' => 'beer'];

echo "<hr>";
var_dump($arr3 + $arr4);
echo "<hr>";
var_dump(array_merge($arr3, $arr4));
echo "<hr>";
var_dump(array_map(function($v){return $v*10;}, [1, 2, 3]));

try{
	$result = 5 % 0;
}catch(\Error $e){
	echo get_class($e).PHP_EOL;
	echo "<br>";
	echo $e->getMessage().PHP_EOL;
}

echo "Hello";

$smarty = new Smarty();
$smarty->escape_html = true;

$smarty->setTemplateDir(__DIR__.DIRECTORY_SEPARATOR.'template');
$smarty->assign('hello', 'Hello, World!!');

$smarty->assign('demo', [
	'This',
	'is',
	'Smarty.', '<script>alert(1);</script>']);

$smarty->display('index.tpl');

?>



