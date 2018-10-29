<?php
/**
 * Created by PhpStorm.
 * User: wangsl
 * Date: 2018/4/26
 * Time: 14:27
 */
namespace App\Helper;

use App\Helper\RsaSignHelp;
use \Illuminate\Support\Facades\Redis;

class TokenHelper
{
	/**
	 * 生成token
	 * @param insured_name  string|用户姓名
	 * @param insured_code  string|证件号
	 * @param insured_phone string|手机号
	 * TODO 有效期没做
	 * @return token
	 */
    static public function getToken($params)
	{
		if(!is_array($params)){
			$params = json_decode($params,true);
		}
		$msg = [];
		if(empty($params['insured_name']))
			$msg['insured_name'] = 'insured_name is empty';
		if(empty($params['insured_code']))
			$msg['insured_code'] = 'insured_code is empty';
		if(empty($params['insured_phone']))
			$msg['insured_phone'] = 'insured_phone is empty';
		if(!empty($msg)){
			$msg['default'] = '请求失败';
			return json_encode(['status'=>'500','msg'=>$msg],JSON_UNESCAPED_UNICODE);
		}
		$data = [
			'insured_name'=>$params['insured_name'],
			'insured_code'=>$params['insured_code'],
			'insured_phone'=>$params['insured_phone'],
			'time' => time(),
			'expiry_date'=>0,
		];
		$sign_help = new RsaSignHelp();
		$token = $sign_help->base64url_encode(json_encode($data));
		$key = sha1(md5($params['insured_code']));
		Redis::set($key,$token);
		return  (['status'=>'200','msg'=>'','token'=>$key]);
    }
	/**
	 * 生成token
	 * @param insured_name  string|用户姓名
	 * @param insured_code  string|证件号
	 * @param insured_phone string|手机号
	 * TODO 有效期没做
	 * @return token
	 */
    static public function getData($key)
	{
		$sign_help = new RsaSignHelp();
		$token = Redis::get($key);
		$data = json_decode($sign_help->base64url_decode($token),true);
		//判断token是否失效
		if($data['time']+$data['expiry_date']>time()){
			return json_encode(['status'=>'500','msg'=>'token Has expired '],JSON_UNESCAPED_UNICODE);
		}
		return $data;
	}
}








