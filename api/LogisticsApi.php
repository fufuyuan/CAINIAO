<?php
/**
 * 菜鸟物流接口封装
 * Author:Jason
 * date:2017-11-21 
 */
require_once dirname(dirname(__FILE__)).'/include/tb_sdk/TopSdk.php';
class LogisticsApi
{
	function __construct()
	{
		$this->appkey = "21534044";
		$this->secret = "4a389e054f22b97bcb781d2d0546639c";
	}

	public function index($tid, $sellerNick)
	{
		$c = new TopClient;
		$c->appkey = $this->appkey;
		$c->secretKey = $this->secret;
		$req = new LogisticsTraceSearchRequest;
		$req->setTid($tid);			// 86536099402535228  94323470255840370  86565023263268618
		$req->setSellerNick($sellerNick);
		//$req->setIsSplit("1");
		//$req->setSubTid("1,2,3");
		$resp = $c->execute($req);
		$resJson = json_encode($resp);
		//var_dump($resp);
		echo '<hr>';
		print_r(json_decode($resJson,true));
	}
}

$tid = "94323470255840370";
$sellerNick = "kipling官方旗舰店";

$obj = new LogisticsApi();

$obj->index($tid, $sellerNick);