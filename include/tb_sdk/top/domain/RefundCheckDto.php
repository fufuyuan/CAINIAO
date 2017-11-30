<?php

/**
 * 入参
 * @author auto create
 */
class RefundCheckDto
{
	
	/** 
	 * 审核描述
	 **/
	public $msg;
	
	/** 
	 * 子订单ID
	 **/
	public $oid;
	
	/** 
	 * 审核操作时间
	 **/
	public $operate_time;
	
	/** 
	 * 退款金额
	 **/
	public $refund_fee;
	
	/** 
	 * 退款单ID
	 **/
	public $refund_id;
	
	/** 
	 * 审核状态 恒为 SUCCESS
	 **/
	public $status;
	
	/** 
	 * 主订单ID
	 **/
	public $tid;	
}
?>