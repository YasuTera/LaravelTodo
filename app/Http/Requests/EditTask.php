<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Task;
use Illuminate\Validation\Rule;

class EditTask extends CreateTask
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     //親クラスCreateTaskのrulesメソッド結果と合体させ返却
    public function rules()
    {
        $rule = parent::rules();
        
        $status_rule = Rule::in(array_keys(Task::STATUS));
        
        return $rule + [
            'status' => 'required|'.$status_rule,
        ];
        
    }
        
        //親クラスCreateTaskのattributeメソッド結果と合体させ返却
        public function attributes(){
            
            $attributes = parent::attributes();
            
            return $attributes + [
                    'status' => '状態',
                ];
        }
        
        //親クラスCreateTaskのmessagesメソッド結果と合体させ返却
        public function messages(){
            
            $messages = parent::messages();
            
            //Task::STATUS各要素からlabelキー値取り出し、句読点でつなげる
            $status_labels = array_map(function($item) {
                
                return $item['label'];
            }, Task::STATUS);
            
            $status_labels = implode(', ', $status_labels);
            
            return $messages + [
                'status.in' => ':attributeには'.$status_labels.'のいずれかを指定してください。'
                ];
        }
}
