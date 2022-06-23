<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'patient_id' => 'required',
            'dentist_id' => 'required',
            'appointment_date' => 'required|date|after:appointment_date',
            'appointment_hour' => 'required|date_format:H:i|after:8:59|before:16:59',
            'service_id' => 'required'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'patient_id.required' => 'Pacjent nie został wybrany',
            'dentist_id.required'  => 'Wybranie Dentysty jest wymagane',
            'appointment_date.required' => 'Pole data wizyty jest wymagane',
            'appointment_date.after' => 'Wybrano niepoprawną datę',
            'appointment_hour.required' => 'Pole godzina wizyty jest wymagane',
            'appointment_hour.after' => 'Przychodnia przyjmuje pacjentów w godzinach 09:00 - 17:00',
            'appointment_hour.before' => 'Przychodnia przyjmuje pacjentów w godzinach 09:00 - 17:00',
            'service_id.required' => 'Należy wybrać jakąś usługę',
        ];
    }
}
