<!-- app/Http/Requests/AuthRequest.php 
| -- This request class handles validation for authentication-related actions. 
| -->
<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }
}
