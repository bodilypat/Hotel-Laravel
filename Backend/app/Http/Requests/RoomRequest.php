<!-- app/Http/Requests/RoomRequest.php 
| -- 
-->
<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
        ];
    }
}
