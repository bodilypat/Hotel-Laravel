<!-- app/Http/Requests/BookingRequest.php 
| -- 
-->
<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
            'room_id' => 'required|exists:rooms,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ];
    }
}

