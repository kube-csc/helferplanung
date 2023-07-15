<?php

namespace App\Http\Requests;

use App\Models\OperationalBooking;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreHelperListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //$OperationalBookings=OperationalBooking::where('email' , Str::lower($Request->loginEmail))->get();
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
          return [
            'loginEmail' => ['required', 'min:5', 'max:255'],
          ];

    }
}
