<?php
/**
 * Created by PhpStorm.
 * User: wangsl
 * Date: 2018/10/29
 * Time: 10:12
 *
 */

namespace App\Http\Controllers\FrontendControllers;

use App\Helper\LogHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
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
    public function index()
    {
        $users = User::get();
        return view('frontend.index',compact('users'));
    }

    /**
     * @return string
     */
    public function home()
    {
        $users = User::get();
        return view('frontend.home',compact('users'));
    }
}