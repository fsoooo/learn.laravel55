<?php
/**
 * Created by PhpStorm.
 * Users: wangsl
 * Date: 2018/10/29
 * Time: 10:12
 *
 */

namespace App\Http\Controllers\FrontendControllers;

use App\Services\LogHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use \Illuminate\Support\Facades\Redis;

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
        $users = Users::get();
        return view('frontend.index',compact('users'));
    }

    /**
     * @return string
     */
    public function home()
    {
        $users = Users::get();
        return view('frontend.home',compact('users'));
    }

    public function redisLock(){
        Redis::set('test01  ','1111');
        dd(Redis::get('test'));
    }

    public function redisUnlock(){
        Redis::set('test02','1111');
        dd(Redis::get('test'));
    }
}