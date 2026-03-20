<!-- app/Services/PaymentService.php 
| -- 
-->
<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Booking;

class PaymentService
{
    /* 
    * This service handles the business logic related to payments, such as processing payments for bookings and retrieving payment history.
    * It interacts with the Payment and Booking models to perform these operations.
    */
    public function createPayment(array $data, $userId)
    {
        // Validate the booking exists
        $booking = Booking::find($data['booking_id']);
        if (!$booking) {
            throw new \Exception('Booking not found.');
        }

        // Create the payment
        $payment = new Payment();
        $payment->booking_id = $data['booking_id'];
        $payment->amount = $data['amount'];
        $payment->payment_method = $data['payment_method'];
        $payment->user_id = $userId;
        $payment->save();

        return $payment;
    }

    public function getPaymentHistory($userId)
    {
        return Payment::where('user_id', $userId)->with('booking')->get();
    }

    public function getPaymentById($id)
    {
        return Payment::find($id);
    }

    public function refundPayment($paymentId)
    {
        $payment = Payment::find($paymentId);
        if (!$payment) {
            throw new \Exception('Payment not found.');
        }

        // Implement refund logic here (e.g., interact with payment gateway)

        // For demonstration, we'll just mark the payment as refunded
        $payment->status = 'refunded';
        $payment->save();

        return $payment;
    }

    public function getTotalRevenue()
    {
        return Payment::where('status', 'completed')->sum('amount');
    }

    public function getPaymentsByBookingId($bookingId)
    {
        return Payment::where('booking_id', $bookingId)->get();
    }

}