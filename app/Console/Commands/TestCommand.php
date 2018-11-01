<?php

namespace App\Console\Commands;

use App\Models\Users;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * 1. 这里是命令行调用的名字, 如这里的: `topics:excerpt`,
     * 命令行调用的时候就是 `php artisan topics:excerpt`
     *
     * @var string
     */
    protected $signature = 'test:command';

    /**
     * 2. 这里填写命令行的描述, 当执行 `php artisan` 时
     *   可以看得见.
     *
     * @var string
     */
    protected $description = '测试命令行的描述';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 这里是放要执行的代码
     *
     * @return mixed
     */
    public function handle()
    {
        $users = Users::all();
        $count = 0;
        foreach ($users as $user) {
            if (empty($users->remember_token)) {
                $operate = Users::find($user['id']);
                $operate->remember_token = md5(time() . "abcAbc");
                $operate->save();
                $count++;
            }
        }
        $this->info("Saved remember_token count: " . $count);
        $this->info("It's Done, have a good day.");
    }
}






