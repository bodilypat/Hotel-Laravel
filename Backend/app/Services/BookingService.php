<!-- app/Services/RoomService.php
| -- Businness logic for room-related operations
 -->
<?php
namespace App\Services;

use App\Models\Booking;
use App\Models\Room;
class BookingService
{
    /* 
    * This service handles the business logic related to bookings, such as creating a booking and checking room availability.
    * It interacts with the Booking and Room models to perform these operations.
    */
    public function getAllBookings()
    {
        return Booking::with('room')->get();
    }

    /**
     * Create a new booking for a room.
     *
     * @param array $data
     * @return Booking
     */
    public function createBooking(array $data, $userId)
    {
        // Prevent overlapping bookings
        $overlappingBooking = Booking::where('room_id', $data['room_id'])
            ->where(function ($query) use ($data) {
                $query->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                    ->orWhereBetween('end_time', [$data['start_time'], $data['end_time']])
                    ->orWhere(function ($query) use ($data) {
                        $query->where('start_time', '<=', $data['start_time'])
                            ->where('end_time', '>=', $data['end_time']);
                    });
            })
            ->first();
        if ($overlappingBooking) {
            throw new \Exception('The room is already booked for the selected time slot.');
        }
        // Create the booking
        $booking = new Booking();
        $booking->room_id = $data['room_id'];
        $booking->start_time = $data['start_time'];
        $booking->end_time = $data['end_time'];
        $booking->user_id = $userId;
        $booking->save();

        return $booking;
    }

    /**
     * Check if a room is available for a given time slot.
     *
     * @param int $roomId
     * @param string $startTime
     * @param string $endTime
     * @return bool
     */
    public function isRoomAvailable($roomId, $startTime, $endTime)
    {
        $overlappingBooking = Booking::where('room_id', $roomId)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                    ->orWhereBetween('end_time', [$startTime, $endTime])
                    ->orWhere(function ($query) use ($startTime, $endTime) {
                        $query->where('start_time', '<=', $startTime)
                            ->where('end_time', '>=', $endTime);
                    });
            })
            ->first();

        return !$overlappingBooking;
    }

    public function getBookingById($id)
    {
        return Booking::with('room')->findOrFail($id);
    }

    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
    }

    public function updateBooking($id, array $data)
    {
        $booking = Booking::findOrFail($id);
        // Check for overlapping bookings if the room or time has changed
        if ($booking->room_id != $data['room_id'] || $booking->start_time != $data['start_time'] || $booking->end_time != $data['end_time']) {
            $overlappingBooking = Booking::where('room_id', $data['room_id'])
                ->where(function ($query) use ($data) {
                    $query->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                        ->orWhereBetween('end_time', [$data['start_time'], $data['end_time']])
                        ->orWhere(function ($query) use ($data) {
                            $query->where('start_time', '<=', $data['start_time'])
                                ->where('end_time', '>=', $data['end_time']);
                        });
                })
                ->where('id', '!=', $id)
                ->first();
            if ($overlappingBooking) {
                throw new \Exception('The room is already booked for the selected time slot.');
            }
        }
        // Update the booking
        $booking->room_id = $data['room_id'];
        $booking->start_time = $data['start_time'];
        $booking->end_time = $data['end_time'];
        $booking->save();

        return $booking;
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
    }

}
