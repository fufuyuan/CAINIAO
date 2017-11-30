<?php
/**
 * TOP API: taobao.inventory.adjust.external request
 * 
 * @author auto create
 * @since 1.0, 2017.05.24
 */
class InventoryAdjustExternalRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.inventory.adjust.external";
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
