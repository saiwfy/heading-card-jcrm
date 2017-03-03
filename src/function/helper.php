<?php 
	function getOperCtx(){
		$config = parse_ini_file(dirname(dirname(__FILE__))."/config/config.ini");

		$data['time'] = "";//date('c', time());
		$data['operator'] = [
			'namespace'=>'',
			'id'=>$config['operator_id'],
			'fullName'=>$config['operator_fullname']
		];
		$data['terminalId'] = $config['terminalId'];
		$data['store'] = $config['store'];

		return $data ;
	}

?>