<?php
/**
 * TOP API: taobao.rdc.aligenius.order.returngoods.notify request
 * 
 * @author auto create
 * @since 1.0, 2017.08.18
 */
class RdcAligeniusOrderReturngoodsNotifyRequest
{
	/** 
	 * 主订单号
	 **/
	private $parentOrderId;
	
	/** 
	 * 退货单创建结果列表
	 **/
	private $refundReturnNotes;
	
	private $apiParas = array();
	
	public function setParentOrderId($parentOrderId)
	{
		$this->parentOrderId = $parentOrderId;
		$this->apiParas["parent_order_id"] = $parentOrderId;
	}

	public function getParentOrderId()
	{
		return $this->parentOrderId;
	}

	public function setRefundReturnNotes($refundReturnNotes)
	{
		$this->refundReturnNotes = $refundReturnNotes;
		$this->apiParas["refund_return_notes"] = $refundReturnNotes;
	}

	public function getRefundReturnNotes()
	{
		return $this->refundReturnNotes;
	}

	public function getApiMethodName()
	{
		return "taobao.rdc.aligenius.order.returngoods.notify";
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
