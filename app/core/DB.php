<?php
namespace Core;
use Illuminate\Database\Capsule\Manager as Capsule;

class DB
{	
	
	private $capsule = null;

	/**
	 * singleton constructor to trigger databse connection
	 * @return void
	 */
	function __construct()
	{
		if($this->capsule === null)
		{
			$this->connect();
		}
	}

	/**
	 * initialise database manage and boot eloquent
	 * @return void
	 */
	private function connect()
	{
		$this->capsule = new Capsule;

		$this->capsule->addConnection([
		    'driver'    => DBDRIVER,
		    'host'      => DBHOST,
		    'database'  => DBNAME,
		    'username'  => DBUSER,
		    'password'  => DBPASS,
		    'charset'   => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => '',
		]);

		$this->capsule->bootEloquent();
	}
}