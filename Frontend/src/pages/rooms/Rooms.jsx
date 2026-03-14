/*  -- src/pages/rooms/Rooms.jsx --  
| -- Fetching rooms 
| -- search/filter
| -- Add/Edit Room Modal
| -- Search and filter
| -- RoomTable component to display rooms
| -- RoomForm component for add/edit
| -- API calls to backend for CRUD operations
*/
import React, { useState, useEffect } from 'react';
import RoomTable from './RoomTable';
import RoomForm from './RoomForm';

function Rooms() {
    const [rooms, setRooms] = useState([]);
    const [search, setSearch] = useState('');
    const [statusFilter, setStatusFilter] = useState('');
    const [showForm, setShowForm] = useState(false);
    const [editingRoom, setEditingRoom] = useState(null);

    const fetchRooms = async () => {
        const response = await fetch('http://localhost:8000/api/rooms');
        const data = await response.json();
        setRooms(data);
    }

    useEffect(() => {
        fetchRooms();
    }, []);

    const filteredRooms = rooms.filter(room => 
        room.room_number.includes(search) &&
        (statusFilter ? room.status === statusFilter : true)
    );

    const openAddForm = () => {
        setEditingRoom(null);
        setShowForm(true);
    };

    const openEditForm = (room) => {
        setEditingRoom(room);
        setShowForm(true);
    };

    const deleteRoom = async (id) => {
        await fetch(`http://localhost:8000/api/rooms/${id}`, { method: 'DELETE' });
        fetchRooms();
    };

    return (
        <div className="container mt-4">
            <h2>Room Management</h2>
            <div className="d-flex mb-3">
                <input 
                    type="text"
                    className="form-control me-2"
                    placeholder="Search by room number"
                    value={search}
                    onChange={(e) => setSearch(e.target.value)}
                />
                <select
                    className="form-select me-2"
                    value={statusFilter}
                    onChange={(e) => setStatusFilter(e.target.value)}
                >
                    <option value="">All Statuses</option>
                    <option value="available">Available</option>
                    <option value="occupied">Occupied</option>
                    <option value="maintenance">Maintenance</option>
                </select>
                <button className="btn btn-primary" onClick={openAddForm}>Add Room</button>
            </div>
            <RoomTable rooms={filteredRooms} onEdit={openEditForm} onDelete={deleteRoom} />
            {showForm && <RoomForm room={editingRoom} onSave={fetchRooms} onClose={() => setShowForm(false)} />}
        </div>
    );
};

export default Rooms;




