<?php

/**
 * 基类
 * author:jason
 * date:2017-08-18
 */
//header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC'); //设置中国时区

//use mysqli;

class Model
{
    protected static $logisticsDbInstance;

    public function __construct()
    {
        if (!self::$logisticsDbInstance) {
            //self::$logisticsDbInstance = new mysqli('rm-vy12uinfci570vvt9.mysql.rds.aliyuncs.com', 'bqiter_13', 'bqitpw_13', 'pgmtest');
            //self::$logisticsDbInstance = new mysqli('192.168.1.243', 'bqiter_13', 'bqitpw_13', 'pgmtest');
            self::$logisticsDbInstance = new mysqli('127.0.0.1', 'root', '', 'logistics');
            if (mysqli_connect_errno()) {
                echo '数据库连接失败，失败信息：' . mysqli_connect_error();
                exit;
            }
            self::$logisticsDbInstance->set_charset('utf8');
        }
    }


    //获取查询所有数据 jason
    public static function getAll($sql)
    {
        if (!self::$logisticsDbInstance) {
            new self();
        }
        $result = self::$logisticsDbInstance->query($sql);

        if ($result->num_rows == 0) {
            return '';
        }
        while ($row = $result->fetch_assoc()) {
            $res[] = $row;
        }

        return $res;
    }

    //获取查询一条数据 jason
    public static function getRow($sql)
    {
        if (!self::$logisticsDbInstance) {
            new self();
        }
        $result = self::$logisticsDbInstance->query($sql);

        if ($result->num_rows == 0) {
            return '';
        }
        $row = $result->fetch_assoc();

        return $row;
    }

    //jason
    public static function query($sql)
    {
        if (!self::$logisticsDbInstance) {
            new self();
        }
        $result = self::$logisticsDbInstance->query($sql);
        return $result;
    }


    //获取timestamp
    public static function currentTimeMillis()
    {
        list($t1, $t2) = explode(' ', microtime());
        return (float)(floatval($t1) + floatval($t2)) * 1000;
    }


    public function test()
    {
        echo 'this is a test';
        //var_dump(self::$logisticsDbInstance);
	}


}

//$obj = new Model();

//$obj->test();

