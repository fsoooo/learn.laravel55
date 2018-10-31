<?php
/**
 * Created by PhpStorm.
 * Users: wangsl
 * Date: 2018/10/29
 * Time: 10:12
 *
 */

namespace App\Http\Controllers\BackendControllers;

use App\Helper\LogHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    protected $request;

    protected $log_helper;

    protected $input;

    /**
     * 初始化
     * @access public
     *
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->log_helper = new LogHelper();
        $this->input = $this->request->all();
    }

    /**
     * @return string
     */
    public function login()
    {
        return view('backend.login');
    }
}