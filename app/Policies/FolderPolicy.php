<?php

namespace App\Policies;

use App\User;
use App\Folder;
//use Illuminate\Auth\Access\HandlesAuthorization;

class FolderPolicy
{
    /* フォルダ閲覧権限(403)
    * @param User $user
    * @param Folder $folder
    * @return bool
    */
    public function view(User $user, Folder $folder){
        
        //userとfolderが紐づいている場合のみ
        return $user->id === $folder->user_id;
    }
    
}
