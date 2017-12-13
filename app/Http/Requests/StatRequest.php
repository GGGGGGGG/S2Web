<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatRequest extends FormRequest
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
            'user' => 'required|integer',
            'match' => 'required|integer',
            'team' => 'required|integer|max:1',
            'exp' => 'required|integer',
            'kills' => 'required|integer',
            'deaths' => 'required|integer',
            'assists' => 'required|integer',
            'souls' => 'required|integer',
            'razed' => 'required|integer',
            'pdmg' => 'required|integer',
            'bdmg' => 'required|integer',
            'npc' => 'required|integer',
            'hp_healed' => 'required|integer',
            'res' => 'required|integer',
            'gold' => 'required|integer',
            'hp_repaired' => 'required|integer',
            'secs' => 'required|integer',
            'ip' => 'required|ipv4'
        ];
    }
}
