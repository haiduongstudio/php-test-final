<?php

class App
{
	public $controller = 'home';

	public $method = 'index';

	public $param = null ;

	public function __construct()
	{
		if(isset($_GET['ac']))
		{
			$this->controller = $_GET['ac'];
		}
		if(!file_exists('app/controller/'.$this->controller.'.php'))
		{
			$this->controller = 'notfound';
            require 'app/controller/'.$this->controller.'.php';
            $app = new $this->controller;die;
		}
		require 'app/controller/'.$this->controller.'.php';

		if(isset($_GET['mt']))
		{
			$this->method = $_GET['mt'];
			if(!method_exists($this->controller, $this->method))
			{
				$this->controller = 'notfound';
				$this->method = 'index';
				require 'app/controller/'.$this->controller.'.php';
                $app = new $this->controller;die;
			}
		}

		if(isset($_GET['pr']))
		{
			$this->param = $_GET['pr'];
		}
		$method =  $this->method;
		$app = new $this->controller;
		$app->$method($this->param);
	}
}