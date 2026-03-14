//src/pages/rooms/RoomTable.jsx

import React from 'react';

function RoomTable({ rooms, onEdit, onDelete }) {
    return (
        <table className="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Number</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>

            </thead>
            <tbody>
                {rooms.map(room => (
                    <tr key={room.id}>
                        <td>{room.id}</td>
                        <td>{room.room_number}</td>
                        <td>{room.type}</td>
                        <td>{room.price}</td>
                        <td>{room.status}</td>
                        <td>
                            <button className="btn btn-sm btn-primary me-2" onClick={() => onEdit(room)}>Edit</button>
                            <button className="btn btn-sm btn-danger" onClick={() => onDelete(room.id)}>Delete</button>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
};

export default RoomTable;

