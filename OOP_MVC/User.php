<?php
abstract class User
{
	protected $name;
	protected $age;
	private static $count;

	public function __construct($name,$age)
	{
		$this->name = $name;
		$this->age = $age;
		self::$count++;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		if(strlen($name)>=3){
			$this->name = $name;
		}
		
	}

	public function getAge()
	{
		return $this->age;
	}

	public function setAge($age)
	{
		if ($age >= 18) {
			$this->age = $age;
		}
	}

	public static function getCount()
	{
		return self::$count;
	}

	abstract public function increaseRevenue($value);
}

?>
