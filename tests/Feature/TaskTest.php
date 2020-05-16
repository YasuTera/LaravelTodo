<?php

namespace Tests\Feature;

use App\Http\Requests\CreateTask;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    
    use RefreshDatabase; //テストケースごとにDBリフレッシュ マイグレーション再実行 
    
    /* 各テストメソッドの実行前に呼ばれる */
    public function setUp(): void{
        
        parent::setUp();
        
        //テストケース実行前にフォルダデータ作成
        $this->seed('FoldersTableSeeder');
        
    }
    
    //期限日が日付でない場合のバリデーションエラー
    public function should_be_date(){
        
        $response = $this->post('/folders/1/tasks/create',[
            
                'title' => 'Sample task',
                'due_date' => 123 //エラー値(不正な数値)
                ]);
        
        $response->assertSessionHasErrors([        
                'due_date' => '期限日には日付を入力してください。'
            ]);
    }
    
    //期限日が過去の日付である場合のバリデーションエラー
    public function should_not_be_past(){
        
        $response = $this->post('/folders/1/tasks/create', [

            'title'=> 'Sample task',
            'due_date' => Carbon::yesterday()->format('Y/m/d'), //エラー値(昨日の日付)
            ]);
            
        $response->assertSessionHasErrors([
                'due_date' => '期限日には今日以降の日付を入力してください。',
            ]);
    }
}
