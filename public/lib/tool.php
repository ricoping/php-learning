<?
namespace lib;
date_default_timezone_set('Asia/Tokyo');

final class DateTime{
	public function example()
	{
		return "My DateTime Class";
	}
}

$datetime = new DateTime();
echo $datetime->example().PHP_EOL;

$datetime = new \lib\DateTime();
echo $datetime->example().PHP_EOL;

$original = new \DateTime();
echo $original->format('Y-m-d H:i:s').PHP_EOL;

?>