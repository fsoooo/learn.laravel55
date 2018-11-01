<?php
namespace App\Services;

use Carbon\Carbon;
use DB;

class LogHelper{
    /**
     * @param $data 日志内容
     * @param null $from 日志来源
     * @param null $type 日志类型
     * @param string $file_name 日志文件名称
     * 自定义日志辅助
     */
    static public function logs($data, $from=null, $type=null,$file_name='laravel_logs')
    {
        $log = "[" . $from . '] [' .$type . "] [" . Carbon::now() . "] \n" . json_encode($data, JSON_UNESCAPED_UNICODE) . "\n";
        $date = date('Y_m_d');
        $file_path = storage_path('logs/'.$file_name.'_'. $date .'.log');
        file_put_contents($file_path, $log, FILE_APPEND);
    }
}









