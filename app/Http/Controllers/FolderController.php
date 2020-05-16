<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm(){
        
        return view('folders/create');
    }
    
    public function create(CreateFolder $request){
        
        $folder = new Folder();
        
        /* タイトルに入力値代入 */
        $folder->title = $request->title;
        
        /* ユーザーに紐づけて保存 */
        Auth::user()->folders()->save($folder);
        
        $folder->save();
        
        return redirect()->route('tasks.index', [
            
            'folder' => $folder->id,
            ]);
    }
}
