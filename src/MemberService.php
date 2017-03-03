<?php 
namespace HeadingCardJcrm;

class MemberService extends Base{

	const OPENCARD_API = "/jcrm-server-card/rest/card/openCard";
	const QUERY_API = "/jcrm-server-card/rest/card/query";

	function __construct()
	{	
		parent::__construct();
	}

	/**
	 * 外部会员开卡
	 */
	
	public function openCard($request)
	{
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