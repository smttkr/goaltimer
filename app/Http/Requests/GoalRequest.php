<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'goal_name' =>'filled|string', // |unique:goals,goal_name
            'goal_time'=>'filled|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
        'goal_name.filled' =>'入力してください',
        'goal_name.filled' =>'入力してください',
        'goal_name.string' =>'文字を入力してください',
        // 'goal_name.unique' => '同じ目標が存在しています',
        'goal_time.integer' => '数字で入力してください',
        'goal_time.min' => '1以上の整数を入力してください'
        ];
    }
}
