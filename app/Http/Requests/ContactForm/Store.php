<?php

namespace App\Http\Requests\ContactForm;

use App\Rules\DomainId;
use App\Rules\MinimumWords;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name' => ['required', new MinimumWords()],
            'email' => ['required', 'email', new DomainId()],
            'phone' => ['numeric'],
            'kategori' => [],
            'message' => ['required', 'min:20'],
        ];
    }
}
