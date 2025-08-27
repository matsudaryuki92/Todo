<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contents' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'contents.required' => 'タスク内容を書いてください',
            'contents.max:255' => '文字数が多すぎます',
        ];
    }
}
