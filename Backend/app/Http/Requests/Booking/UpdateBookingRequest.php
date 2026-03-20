<!-- app/Http/Requests/Booking/UpdateBookingRequest.php 
| --
 -->
<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;
class UpdateBookingRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'room_id' => 'sometimes|required|exists:rooms,id',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'sometimes|required|date|after:start_time',
        ];
    }
}
