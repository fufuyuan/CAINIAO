<?php
/**
 * 菜鸟物流查询对接
 * date:2017-11-20
 */ 
//require_once dirname(__FILE__).'/include/tb_sdk/top/TopClient.php';
require_once dirname(__FILE__).'/include/tb_sdk/TopSdk.php';
class Cainiao
{
	
	function __construct()
	{
		$this->appkey = "yourappkey";
		$this->secret = "yoursecret";
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
        return json_decode($resJson,true);
		//var_dump($resp);
		//echo '<hr>';
		//print_r(json_decode($resJson,true));
	}
}

/*$tid = "94323470255840370";
$sellerNick = "kipling官方旗舰店";
$obj = new Cainiao();

$obj->index($tid, $sellerNick);*/