<?php 
namespace HeadingCardJcrm;

class MemberService extends Base{

	const QUERY_API = "/jcrm-server-card/rest/mbr/query";

	function __construct()
	{	
		parent::__construct();
	}

	
	/**
	 * 通过会员手机获取会员信息
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