<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'premium' => ['sometimes', 'boolean'],
            'content' => ['required', 'string', 'max:65535'],
            'image' => ['required', 'image', 'dimensions:max_width=3840,max_height=2160'],
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
        ];
    }
}
