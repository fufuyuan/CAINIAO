<?php
/**
 * TOP API: taobao.rdc.aligenius.refunds.check request
 * 
 * @author auto create
 * @since 1.0, 2017.05.11
 */
class RdcAligeniusRefundsCheckRequest
{
	/** 
	 * 入参
	 **/
	private $param;
	
	private $apiParas = array();
	
	public function setParam($param)
	{
		$this->param = $param;
		$this->apiParas["param"] = $param;
	}

	public function getParam()
	{
		return $this->param;
	}

	public function getApiMethodName()
	{
		return "taobao.rdc.aligenius.refunds.check";
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
