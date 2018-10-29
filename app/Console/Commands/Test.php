<?php
/**
 * Created by PhpStorm.
 * User: wangsl
 * Date: 2017/10/29
 * Time: 15:07
 * 测试定时任务
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test Command description';

    /**
     * test the crond service
     *
     * @var string
     */
    public function handle()
    {
        $log = "定时任务开始了" . date('Y_m_d H_m_s') . "\n";
        Log::info($log);
    }

}
