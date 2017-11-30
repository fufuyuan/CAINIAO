<?php
/**
 * TOP API: taobao.nextone.logistics.warehouse.update request
 * 
 * @author auto create
 * @since 1.0, 2017.05.10
 */
class NextoneLogisticsWarehouseUpdateRequest
{
	/** 
	 * 退款编号
	 **/
	private $refundId;
	
	/** 
	 * 退货入仓状态 1.已入仓
	 **/
	private $warehouseStatus;
	
	private $apiParas = array();
	
	public function setRefundId($refundId)
	{
		$this->refundId = $refundId;
		$this->apiParas["refund_id"] = $refundId;
	}

	public function getRefundId()
	{
		return $this->refundId;
	}

	public function setWarehouseStatus($warehouseStatus)
	{
		$this->warehouseStatus = $warehouseStatus;
		$this->apiParas["warehouse_status"] = $warehouseStatus;
	}

	public function getWarehouseStatus()
	{
		return $this->warehouseStatus;
	}

	public function getApiMethodName()
	{
		return "taobao.nextone.logistics.warehouse.update";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->refundId,"refundId");
		RequestCheckUtil::checkNotNull($this->warehouseStatus,"warehouseStatus");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
