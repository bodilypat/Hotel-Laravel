<!-- app/Http/Controllers/PaymentController.php 
| -- This controller manages payment-related actions for bookings. 
| -- It includes methods for processing payments, viewing payment history, and handling payment confirmations.
-->
<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('booking')->get();
        return view('payments.index', compact('payments'));
    }

    public function create(Booking $booking)
    {
        return view('payments.create', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        Payment::create([
            'booking_id' => $booking->id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment processed successfully.');
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }
}
