<?php

namespace Tests\Feature;

use App\Http\Requests\CreateGoal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Carbon\Carbon;

class GoalTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() :void {
        parent::setUp();

        $this->seed('GoalsTableSeeder');
    }

    /**
     * 期限日が日付ではない場合はバリデーションエラー
     * @test
     */

    public function due_date_should_be_date() {

        $response = $this->post('/goals/create', [
            'title' => 'Sample goal',
            'due_date' => 123, // 不正なデータ（数値）
        ]); 

        $response->assertSessionHasErrors([
            'due_date' => '期限日 には日付を入力してください。',
        ]);
    }

    /**
     * 期限日が過去の日付の場合はバリデーションエラー
     * @test
     */

    public function due_date_should_not_be_past() {
        $response = $this->post('/goals/create', [
            'title' => 'Simple goal',
            'due_date' => Carbon::yesterday()->format('Y/m/d'), //現在より前の不正なデータ
        ]);

        $response->assertSessionHasErrors([
            'due_date' => '期限日 には今日以降の日付を入力してください。'
        ]);
    }
}
