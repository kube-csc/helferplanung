<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOperationalBookingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
          return [
            'Vorname'                   => ['required', 'min:3', 'max:255'],
            'Nachname'                  => ['required', 'min:3', 'max:255'],
            'event_id'                  => 'required',
            'user_id'                   => ['nullable' , 'numeric'],
            'operational_location_id'   => 'required',
            'timetabel_helper_lists_id' => 'required',
            'email'                     => ['required', 'min:5', 'max:255'],
            'datum'                     => 'required',
            'startZeit'                 => 'required',
            'endZeit'                   => 'required'
          ];

    }
}
