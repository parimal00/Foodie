<?php

namespace App\Http\Requests;

use App\Models\Order;
use App\Rules\DriverAuthorization;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class OrderUpdateRequest extends FormRequest
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


    public function prepareForValidation()
    {
        $this->merge([
            'status' => Str::slug($this->STATUS, '_')
        ]);

    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'STATUS' => ['required', Rule::in(Order::STATUS), 'exclude'],
            'status' => 'required',
            'driver_id' => ['required', 'exists:users,id', new DriverAuthorization()]
        ];
    }
}
