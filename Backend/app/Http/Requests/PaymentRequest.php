<!-- app/Http/Controllers/PaymentRequest.php 
| -- T
-->
<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
        ];
    }
}

