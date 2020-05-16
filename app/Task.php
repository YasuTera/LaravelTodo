<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    /* Status 定義 */
    const STATUS = [
        1 => ['label' => 'Waiting', 'class' => 'label-danger'],
        2 => ['label' => 'Working', 'class' => 'label-info'],
        3 => ['label' => 'Completed', 'class' => '']
        ];
    
    /*状態ラベル*/
    
    public function getStatusLabelAttribute(){
        
        $status = $this->attributes['status'];
        
        /* 状態値が定義されていない場合空白 */
        if(!isset(self::STATUS[$status])){
            
            return '';
        }
        return self::STATUS[$status]['label'];
    }
    
    /* 期限日表示整形 */
    public function getFormattedDueDateAttribute(){
        
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}
