<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Doctor;
use Carbon\Carbon;

class ReservationRequest extends FormRequest
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
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    $start = '09:00';
                    $end = '17:00';
                    if ($value < $start || $value > $end) {
                        $fail('The ' . $attribute . ' must be between 09:00 AM and 5:00 PM.');
                    }
                },
                function ($attribute, $value, $fail) {
                    $doctor = Doctor::find($this->doctor_id);
                    if ($doctor && $doctor->isReserved($this->date, $value, $this->doctor_id)) {
                        $fail('The ' . $attribute . ' has already been reserved.');
                    }
                },
            ],
            'price' => 'required|exists:doctors,price',
            'name' => 'required|exists:users,name',
            'phone' => 'required|exists:users,phone',
            'email' => 'required|exists:users,email',
        ];
    }
}
