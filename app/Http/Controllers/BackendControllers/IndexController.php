<?php
/**
 * Created by PhpStorm.
 * Users: wangsl
 * Date: 2018/10/29
 * Time: 10:12
 *
 */

namespace App\Http\Controllers\BackendControllers;

use App\Services\LogHelper;
use Illuminate\Http\Request;
use App\Models\Users;
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
        $users = Users::get();
        return view('backend.index',compact('users'));
    }
}