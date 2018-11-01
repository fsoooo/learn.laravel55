<?php
/**
 * Created by PhpStorm.
 * Users: wangsl
 * Date: 2018/10/29
 * Time: 10:12
 *
 */

namespace App\Http\Controllers\ApiControllers;

use App\Services\LogHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    protected $request;

    protected $log_Services;

    protected $input;

    /**
     * 初始化
     * @access public
     *
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->log_Services = new LogHelper();
        $this->input = $this->request->all();
    }

    /**
     * @return string
     */
    public function index()
    {
        $arr = [];
        $arr['code'] = '200';
        $arr['message'] = '请求接口成功';
        $arr['data'] = [];
        $arr['data']['desc'] = '测试API路由';
        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
}