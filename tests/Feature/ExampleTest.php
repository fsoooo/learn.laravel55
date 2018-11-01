<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->withHeaders([
            'X-Header' => 'LaravelAcademy',
        ])->json('get', '/api/index', ['name' => '测试API接口']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'code' => "200",
                'message' => "请求接口成功",
                'data' => ['desc'=>'测试API路由'],
            ]);
    }
}
