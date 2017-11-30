CREATE TABLE `logistics` (
  `tid` varchar(50) NOT NULL COMMENT '订单号',
  `out_sid` varchar(50) NOT NULL COMMENT '运单号',
  `company_name` varchar(20) NOT NULL COMMENT '物流公司名称',
  `status` varchar(30) NOT NULL COMMENT '订单的物流状态',
  `action` varchar(20) NOT NULL COMMENT '节点说明',
  `status_desc` varchar(200) DEFAULT NULL COMMENT '状态描述',
  `status_time` datetime NOT NULL COMMENT '状态发生的时间',
  `company_label` tinyint(2) DEFAULT NULL COMMENT '物流公司标签',
  `shop_db` varchar(30) DEFAULT NULL COMMENT '店铺数据库名称',
  `add_time` datetime DEFAULT NULL COMMENT '物流信息获取时间',
  PRIMARY KEY (`tid`,`out_sid`,`status_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='天猫店铺快递物流信息表'
