<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function(){
    
    /* Home */
    Route::get('/', 'HomeController@index')->name('home');
    
    /* フォルダ作成 */
    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');
    
    /**
    * can:以降から適切な認可処理を判定 コントローラメソッド前に適用
    * view,folder → folderモデル → FolderPolicy viewメソッド
    */
    Route::group(['middleware' => 'can:view, folder'], function(){
        
        /* タスク一覧 */
        Route::get('/folders/{folder}/tasks', 'TaskController@index')->name('tasks.index');
    
        /* タスク作成 */
        Route::get('/folder/{folder}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
        Route::post('/folder/{folder}/tasks/create', 'TaskController@create');
    
        /* タスク編集 */
        Route::get('/folders/{folder}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
        Route::post('/folders/{folder}/tasks/{task_id}/edit', 'TaskController@edit');
    });
    
});

Auth::routes();