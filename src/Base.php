<?php 
namespace HeadingCardJcrm;

use HeadingCardJcrm\Http;

/**
 * 基础类
 */
class Base{

	public $global_config;
	public $http_client;

	function __construct()
	{	
		$this->global_config = parse_ini_file(dirname(__FILE__)."/config/config.ini");
		$this->http_client = new Http();
		$options = [
			'auth'=>[$this->global_config['auth_username'],$this->global_config['auth_password']],
			'headers'=>[
				'Content-Type' => 'application/json',
			]
		];
		$this->http_client->setDefaultOptions($options);
	}

}

 ?>