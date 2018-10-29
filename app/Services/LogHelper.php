<?php
namespace App\Helper;

use Carbon\Carbon;
use DB;

class LogHelper{
    //错误回调日志
    static public function logError($data, $error_msg, $from=null, $type=null)
    {
        $log = "[error] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
        $log .= "Error Message: " . $error_msg . "\n";
        $date = date('Y_m_d');
        $file_path = storage_path('logs/api_error_'. $date .'.log');
        file_put_contents($file_path, $log, FILE_APPEND);
    }
    //成功回掉日志
    static public function logSuccess($data, $from=null, $type=null)
    {
        $log = "[ SUCCESS ] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
        $date = date('Y_m_d');
        $file_path = storage_path('logs/api_success_'. $date .'.log');
        file_put_contents($file_path, $log, FILE_APPEND);
    }
    //渠道成功访问日志
    static public function logChannelSuccess($data, $from=null, $type=null)
    {
        $log = "[ SUCCESS ] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
        $date = date('Y_m_d');
        $file_path = storage_path('logs/channel_success_'. $date .'.log');
        file_put_contents($file_path, $log, FILE_APPEND);
    }
	//渠道成功投保日志
	static public function logChannelInsureSuccess($data, $from=null, $type=null)
	{
		$log = "[ SUCCESS ] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
		$date = date('Y_m_d');
		$file_path = storage_path('logs/channel_insure_success_'. $date .'.log');
		file_put_contents($file_path, $log, FILE_APPEND);
	}
    //渠道失败访问日志
    static public function logChannelError($data, $from=null, $type=null)
    {
        $log = "[ SUCCESS ] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
        $date = date('Y_m_d');
        $file_path = storage_path('logs/channel_error_'. $date .'.log');
        file_put_contents($file_path, $log, FILE_APPEND);
    }
    //yunda访问日志
    static public function logInsure($data, $from=null, $type=null)
    {
        $log = "[ Insure_info ] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
        $date = date('Y_m_d');
        $file_path = storage_path('logs/yunda/channel_error_'. $date .'.log');
        file_put_contents($file_path, $log, FILE_APPEND);
    }
    //渠道失败访问日志
    static public function logPay($data, $from=null, $type=null)
    {
        $log = "[ YD_PAY ] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
        $date = date('Y_m_d');
        $file_path = storage_path('logs/yunda_pay_'. $date .'.log');
        file_put_contents($file_path, $log, FILE_APPEND);
    }
    //日志
    static public function logs($data, $from=null, $type=null,$file_name='laravel_logs')
    {
        $log = "[ ".$file_name." ] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
        $date = date('Y_m_d');
        $file_path = storage_path('logs/'.$file_name.'_'. $date .'.log');
        file_put_contents($file_path, $log, FILE_APPEND);
    }
    //test分页数据
    static public function getPage($params){
        if(empty($params)){
            return false;
        }
        if(empty($params['table_name'])){
            return false;
        }
        $lastId = $params['lastId'] ?? 0;
        $offset = $params['offset'] ?? 10;
        $start = $params['start'] ?? 1;
        $page_key = $params['page_key'] ?? 'id';
        $table_name = $params['table_name'];
        $order = $params['order'] ?? 'desc';
        $table_name =env('DB_PREFIX').$table_name;
        $sql = "select * from {$table_name} ";
        if($lastId > 0){
            $where = "where {$page_key} >{$lastId}";
        }elseif($start>0){
            $where = "where {$page_key} >=(select {$page_key} from {$table_name} order by {$page_key} {$order}  limit {$start},1)";
        }else{
            $where = "1=1";
        }
        $sql .= $where."order by {$page_key} {$order} limit {$offset}";
        echo $sql;
        $res = DB::select($sql);
        return $res;
    }
	//推送成功日志
	static public function logCallBackYDSuccess($data, $from=null, $type=null)
	{
		$log = "[ SUCCESS ] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
		$date = date('Y_m_d');
		$file_path = storage_path('logs/Yd_callback_success_'. $date .'.log');
		file_put_contents($file_path, $log, FILE_APPEND);
	}
	//推送失败日志
	static public function logCallBackYDError($data, $from=null, $type=null)
	{
		$log = "[ SUCCESS ] [" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
		$date = date('Y_m_d');
		$file_path = storage_path('logs/Yd_callback_error_'. $date .'.log');
		file_put_contents($file_path, $log, FILE_APPEND);
	}
}









