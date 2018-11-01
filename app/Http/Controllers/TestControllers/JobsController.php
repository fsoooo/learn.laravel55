<?php
/**
 * Created by PhpStorm.
 * User: wangsl
 * Date: 2018/11/1
 * Time: 15:12
 */

namespace App\Http\Controllers\TestControllers;

use App\Services\LogHelper;
use App\Http\Controllers\Controller;
use App\Jobs\Demo;
use Illuminate\Http\Request;

class JobsController extends Controller
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
        $this->log_Services::logs('测试异步操作:步骤1', 'Jobs', 'Test', 'queue_jobs_logs');
        Demo::dispatch('测试异步操作:步骤2');//异步
        return '测试异步队列';
    }
}