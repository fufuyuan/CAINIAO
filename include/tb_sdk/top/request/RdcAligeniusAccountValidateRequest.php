<?php
/**
 * TOP API: taobao.rdc.aligenius.account.validate request
 * 
 * @author auto create
 * @since 1.0, 2017.08.28
 */
class RdcAligeniusAccountValidateRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.rdc.aligenius.account.validate";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
