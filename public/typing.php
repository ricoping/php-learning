<?

date_default_timezone_set('Asia/Tokyo');
define("PHP_EOL", "\n\n");

//強い型付け
//declare(strict_types=1)

final class Sample
{
	public static function echoUserId($userId)
	{
		echo "userId=".$userId.PHP_EOL;
	}

	//php7
	public static function echoUserIdType(int $userId)
	{
		echo "userId=".$userId.PHP_EOL;
	}

	public static function echoDate(DateTime $datetime)
	{
		echo $datetime->format('Y-m-d H:i:s').PHP_EOL;
	}

	public static function echoStrDate($strdate)
	{
		//$date_old = '23-5-2016 23:15:23'; 
		$date_for_database = date("Y-m-d H:i:s", strtotime($strdate));
		echo $date_for_database;
	}

	//php7
	/*
	public static function echoDateNullable(?DateTime $datetime)
	{
		if($datetime){
			echo $datetime->format('Y-m-d');
		}else{
			echo 'datetime is nul.';
		}

		echo PHP_EOL;
	}
	*/

}


Sample::echoUserId('abcdeeeee');
Sample::echoUserId(3884);
echo "<hr>";
Sample::echoDate(new DateTime());
echo "<hr>";
Sample::echoStrDate('2016-5-21 23:15:23');
//Sample::echoDateNullable(null);

//echo phpinfo();

echo "<hr>";
echo date("Y/m/d H:i:s", strtotime('-1 day')) . "\n"; 
echo date("Y/m/d", strtotime('last Saturday')) . "\n"; 
echo "<hr>";
/*
echo date("Y/m/d 10:00:00", strtotime('last Saturday', strtotime('2015-03-07')));
echo date("Y/m/d 10:00:00", strtotime('last Saturday', strtotime('2015-03-03') + 7 * 24 * 60 * 60)); 

*/

$a = 1;
function localscope()
{
	$str = "abcde";
	global $a;
	return $str.$a;
}

$str = "abaaaa";
//Global Scope 
//Not recommended

localscope();

echo isset($str) ? "str is alive." : "str is not alive";
echo "\n<hr>";
echo "<pre>";
echo var_dump($_ENV);
echo "</pre>";

//$username = $_GET['user'] ?? 'nobody';
//$username = $name ?: "名前がからです"
//echo 1 <=> 1; 0
//1 <=> -1;
//2 <=> 1;

/*
//無名クラス
class BaseBatchController
{
	public function __construct()
	{
		echo 'BaseBatchController__construct()'.PHP_EOL;

	}

	public function run()
	{
		echo 'BaseBatchController run()'.PHP_EOL;
	}
}

$controller = new class extends BaseBatchController
{
	public function __construct()
	{
		parent::__construct();
		echo 'AnonymousController __construct()'.PHP_EOL;
	}

	public function run()
	{
		parent::run();
		echo 'AnonymousController run()'.PHP_EOL;
	}
};

$controller->run();


define('FOO', [
	'program' => "php",
	'fruits' => "apple"
]);

echo FOO['program'].PHP_EOL;

class SampleConst{
	const FOO = [
		'program' => 'php',
		'fruits' => 'apple'
	];

	public const PROGRAM = 'php';
	private const FRUITS = 'apple';
}

echo SampleConst::FOO['fruits'].PHP_EOL;
*/


$a = "apple";
$b = "banana";
list($a, $b) = [$b, $a];

echo $a." ".$b;



?>


