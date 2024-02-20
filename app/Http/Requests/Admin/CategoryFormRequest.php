<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function rules(Request $request): array
    {
        $table = $request->query('table');

        return [
            'newItem' => [
                'string', 'between:2,100', 'required',
                Rule::unique($table, 'name')->ignore($this->id),
            ],
            'table' => 'alpha_dash|max:30|required',
        ];
    }

    /**
     * [Method description].
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'newItem' => '«Новый элемент»',
        ];
    }
}
