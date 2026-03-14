//src/components/RoomForm.jsx
import React, { useState, useEffect } from 'react';

function RoomForm({ room, onClose, onSave }) {

    const [form, setForm] = useState({
        room_number: '',
        type: '',
        price: '',
        status: 'available'
    });

    useEffect(() => {
        if (room) {
            setForm({
                room_number: room.room_number,
                type: room.type,
                price: room.price,
                status: room.status
            });
        }
    }, [room]);

    const handleChange = (e) => {
        setForm({ ...form, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        const method = room ? 'PUT' : 'POST';
        const url = room ? `http://localhost:8000/api/rooms/${room.id}` : 'http://localhost:8000/api/rooms';

        await fetch(url, {
            method,
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(form)
        });

        onSave();
        onClose();
    };

    return (
        <div className="modal show d-block" tabIndex="-1">
            <div className="modal-dialog">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title">{room ? 'Edit Room' : 'Add Room'}</h5>
                        <button type="button" className="btn-close" onClick={onClose}></button>
                    </div>
                    <form onSubmit={handleSubmit}>
                        <div className="modal-body">
                            <div className="mb-3">
                                <label className="form-label">Room Number</label>
                                <input
                                    type="text"
                                    className="form-control"
                                    name="room_number"
                                    value={form.room_number}
                                    onChange={handleChange}
                                    required
                                />
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Type</label>
                                <input
                                    type="text"
                                    className="form-control"
                                    name="type"
                                    value={form.type}
                                    onChange={handleChange}
                                    required
                                />
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Price</label>
                                <input
                                    type="number"
                                    className="form-control"
                                    name="price"
                                    value={form.price}
                                    onChange={handleChange}
                                    required
                                />
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Status</label>
                                <select
                                    className="form-control"
                                    name="status"
                                    value={form.status}
                                    onChange={handleChange}
                                >
                                    <option value="available">Available</option>
                                    <option value="occupied">Occupied</option>
                                    <option value="maintenance">Maintenance</option>
                                </select>
                            </div>
                        </div>
                        <div className="modal-footer">
                            <button type="button" className="btn btn-secondary" onClick={onClose}>Cancel</button>
                            <button type="submit" className="btn btn-primary">{room ? 'Update' : 'Add'}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
};

export default RoomForm;

