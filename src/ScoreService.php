<?php 
namespace HeadingCardJcrm;

class ScoreService extends Base{

	const ADJUST_SCORE_API = "/jcrm-server-card/rest/score/adjustScore";
	const TOTAL_SCORE_API = "/jcrm-server-card/rest/score/total";

	function __construct()
	{	
		parent::__construct();
	}

	/**
	 * 调整积分
	 */
	
	public function adjustScore($cardNum,$score,$scoreType,$remark)
	{
		$request['tranId'] = $request['xid'] = uniqid();
		$request['account'] = [
			'type' => 'cardNum',
			'id' => $cardNum
		];

		$request['scoreRec'] = [
			'scoreType'=>$scoreType,
			'scoreSubject'=>'调整',
			'score'=>$score
		];
		$request['scoreSource'] = '调整';
		$request['remark'] = $remark;
		$request['action'] = '调整';

		$post_data['request'] = $request;
		$post_data['operCtx'] = getOperCtx();

		$post = json_encode($post_data);
		$url = $this->global_config['domain'].self::ADJUST_SCORE_API;
		$result = $this->http_client->post($url,$post)->getBody();
		return($result);
	}

	/**
	 * 查询总积分
	 */

	public function getTotalScore($cardNum){
		$url = $this->global_config['domain'].self::TOTAL_SCORE_API."/$cardNum/cardNum";
		$result = $this->http_client->get($url)->getBody();
		return($result);
	}
		

		
}

 ?>