<?php
namespace OrderDispatcher\Core;

class Router
{
	/**
	 * routes array - gets loaded in defineRoutes()
	 * @access protected
	 * @var array
	 */
	protected $routes = [];
	
	/**
	 * initialise routes
	 * @param array $routes 
	 * @return void
	 */
	public function defineRoutes($routes)
	{
		$this->routes = $routes
	}

	/**
	 * Accepts a file for routes
	 * @param file $routes 
	 * @return object
	 */
	public static function initialise($routesFile)
	{
		$router = new static;
		require $routes;
		return $router;
	}

	/**
	 * Accepts a file for routes
	 * @param string $uri 
	 * @return string
	 */
	public function direct($uri)
	{
		if(array_key_exists($uri, $this->routes)) {
			return dirname(__DIR__) . '/' . $this->routes[$uri];
		}

		throw new \Exception('No route defined for this URI');
	}
}