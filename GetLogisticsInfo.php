<?php
/**
 * 获取订单物流信息
 * Author: Jason
 * Date: 2017/11/21 0021
 * Time: 上午 10:59
 */
ini_set('max_execution_time', '600');
set_time_limit(600);

require_once dirname(__FILE__).'/model/Model.php';
require_once dirname(__FILE__).'/Cainiao.php';
//use Model;

class GetLogisticsInfo extends Model
{
    public function __construct()
    {

    }

    public function index()
    {
        $dbShop = require_once dirname(__FILE__).'/conf/DbShop.php';
        $cainiao = new Cainiao();
        foreach ($dbShop as $db=>$value){

            $orderInfo = $this->getOrderInfo($db);
            if (empty($orderInfo)){
                //return false;
                continue;
            }
            //print_r($orderInfo);
            //exit();

            foreach ($orderInfo as $v){
                //$tid = "94323470255840370";
                //$sellerNick = "kipling官方旗舰店";


                $resArr = $cainiao->index($v['deal_code'], $value);
                //print_r($resArr);

                if (isset($resArr['code'])){//物流订单不存在等意外情况
                    continue;
                }

                $trace_list = $resArr['trace_list'];
                $transit_step_info = $trace_list['transit_step_info'];
                if (empty($transit_step_info)){//物流信息不存在
                    continue;
                }

                $tid = isset($resArr['tid'])?$resArr['tid']:$v['deal_code'];
                $out_sid = $resArr['out_sid'];
                $company_name = $resArr['company_name'];
                $status = $resArr['status'];



                if (!isset($transit_step_info[0])){
                    $transit_step_info_rep = $transit_step_info;
                    $transit_step_info = array();
                    $transit_step_info[0] = $transit_step_info_rep;
                }

                $sql = "insert ignore into logistics(`tid`,`out_sid`,`company_name`,`status`,`action`,`status_desc`,`status_time`,`shop_db`,`add_time`) VALUES ";
                //$sql = "insert ignore into logistics(`tid`,`out_sid`,`company_name`,`status`,`action`,`status_desc`,`status_time`,`add_time`) VALUES ('{$tid}','{$out_sid}','{$company_name}','{$status}','','','','','','','','','',)";
                $add_time = date('Y-m-d H:i:s',time());
                foreach ($transit_step_info as $kk=>$vv){
                    $action = isset($vv['action'])?$vv['action']:'';
                    $status_desc = isset($vv['status_desc'])?$vv['status_desc']:'';
                    $status_time = isset($vv['status_time'])?$vv['status_time']:'1970-01-01 00:00:00';

                    $sql .= "('{$tid}','{$out_sid}','{$company_name}','{$status}','{$action}','{$status_desc}','{$status_time}','{$db}','{$add_time}'),";
                }
                $sql = trim($sql,',');
                //echo $sql;
                try{
                    $ins = self::query($sql);
                }catch (Exception $e){
                    echo $e->getMessage();
                }
                continue;

                //var_dump($ins);
            }

        }

        //print_r($dbShop);
    }

    protected function getOrderInfo($dbName)
    {
        if ($dbName == 'sandro'){
            $dbName = 'smcp';
            $sd_id = 1;
        }
        if ($dbName == 'maje'){
            $dbName = 'smcp';
            $sd_id = 2;
        }

        if ($dbName == 'kipling'){
            $sd_id = 1;
        }

        if ($dbName == 'smcp' || $dbName == 'kipling'){//SMCP特殊处理
            $sql = "select deal_code from ".$dbName.".order_info where invoice_no<>'' and sd_id='{$sd_id}' and deal_code not in(select tid from logistics where (status='对方已签收' or action='SIGNED') and shop_db='{$dbName}') limit 200";

        }else{
            $sql = "select deal_code from ".$dbName.".order_info where invoice_no<>'' and deal_code not in(select tid from logistics where (status='对方已签收' or action='SIGNED') and shop_db='{$dbName}') limit 200";

        }

        $res = self::getAll($sql);
        return $res;
    }
}


$obj = new GetLogisticsInfo();
$obj->index();
