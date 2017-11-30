<?php

/**
 * 请求参数
 * @author auto create
 */
class CancelGoodsDto
{
	
	/** 
	 * 商品ID
	 **/
	public $auction_id;
	
	/** 
	 * 商品数量
	 **/
	public $auction_num;
	
	/** 
	 * 描述
	 **/
	public $msg;
	
	/** 
	 * 子订单ID
	 **/
	public $oid;
	
	/** 
	 * 操作时间
	 **/
	public $operate_time;
	
	/** 
	 * 商家商品ID
	 **/
	public $outer_id;
	
	/** 
	 * 退款金额 单位 分
	 **/
	public $refund_fee;
	
	/** 
	 * 退款单ID
	 **/
	public $refund_id;
	
	/** 
	 * 状态SUCCESS、FAIL
	 **/
	public $status;
	
	/** 
	 * 主订单ID
	 **/
	public $tid;	
}
?>