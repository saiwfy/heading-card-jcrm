<?php 
namespace HeadingCardJcrm;

class CardService extends Base{

	const OPENCARD_API = "/jcrm-server-card/rest/card/openCard";
	const QUERY_API = "/jcrm-server-card/rest/card/query";

	function __construct()
	{	
		parent::__construct();
	}

	/**
	 * 外部会员开卡

	$data必填项
	$data['mobile'] = '13660701111';
	$data['name'] = '大数据';
	$data['gender'] = 'male';
	$data['birth_year'] = '1990';
	$data['birth_month'] = '11';
	$data['birth_day'] = '11';
		 */
	

	public function openCard($data)
	{	

		$request['extMember'] = [
			'openId'=>$data['mobile'],
			'cardId'=>1
		];
		$request['member'] = [
			'name'=>$data['name'],
			'gender'=>$data['gender'],
			'birthday'=>[
				'year'=>$data['birth_year'],
				'month'=>$data['birth_month'],
				'day'=>$data['birth_day'],
			],
			'cellphone'=>$data['mobile'],

		];
		$post_data['operCtx'] = getOperCtx();
		$post_data['request'] = $request;
		$post = json_encode($post_data);
		$url = $this->global_config['domain'].self::OPENCARD_API;
		$result = $this->http_client->post($url,$post)->getBody();
		return($result);
	}

	/**
	 * 获取卡状态
	 */
	public function query($mobile){
		$post_data['conditions'] = [
			[
				'operation'=>'cellphoneEquals',
				'parameters'=>[$mobile]
			]
		];
		$post = json_encode($post_data);
		//echo $post;exit();
		$url = $this->global_config['domain'].self::QUERY_API;
		$result = $this->http_client->post($url,$post)->getBody();
		return($result);
	}

		
}

 ?>