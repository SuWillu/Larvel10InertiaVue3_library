<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'isbn' => 'required|max:17',
			'title' => 'required|max:300',
			'author' => 'required|max:300',
			'description' => 'required|max:1000',
			'cover_img' => 'required|max:300',
			'publisher' => 'required|max:300',
			'publication_date' => 'required|date', 
			'category' => 'required|max:250',
			'page_count' => 'required|numeric'
        ];
    }
}
