<?

require_once("./lib/tool.php");

echo "<hr>";
$datetime = new \lib\DateTime();
echo $datetime->example().PHP_EOL;

use \lib\DateTime as Dtm;

$datetime = new Dtm();
echo $datetime->example().PHP_EOL;


require_once "vendor/autoload.php";

$shinjuku = new myapp\japan\tokyo\Shinjuku();

echo $shinjuku->hello();
?>