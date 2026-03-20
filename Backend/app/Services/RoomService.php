<!-- app/Services/RoomService.php 
| -- 
-->
<?php

namespace App\Services;

use App\Models\Room;
class RoomService
{
    /* 
    * This service handles the business logic related to rooms, such as retrieving available rooms and creating new rooms.
    * It interacts with the Room model to perform these operations.
    */
    public function getAllRooms()
    {
        return Room::all();
    }

    public function createRoom(array $data)
    {
        $room = new Room();
        $room->name = $data['name'];
        $room->capacity = $data['capacity'];
        $room->save();

        return $room;
    }

    public function getAvailableRooms($startTime, $endTime)
    {
        // Get all rooms that are not booked during the specified time slot
        $bookedRoomIds = Booking::where(function ($query) use ($startTime, $endTime) {
            $query->whereBetween('start_time', [$startTime, $endTime])
                ->orWhereBetween('end_time', [$startTime, $endTime])
                ->orWhere(function ($query) use ($startTime, $endTime) {
                    $query->where('start_time', '<=', $startTime)
                        ->where('end_time', '>=', $endTime);
                });
        })->pluck('room_id')->toArray();

        return Room::whereNotIn('id', $bookedRoomIds)->get();
    }

    public function getRoomById($id)
    {
        return Room::find($id);
    }

    public function updateRoom($id, array $data)
    {
        $room = Room::find($id);
        if ($room) {
            $room->name = $data['name'] ?? $room->name;
            $room->capacity = $data['capacity'] ?? $room->capacity;
            $room->save();
            return $room;
        }
        return null;
    }

    public function deleteRoom($id)
    {
        $room = Room::find($id);
        if ($room) {
            $room->delete();
            return true;
        }
        return false;
    }

}