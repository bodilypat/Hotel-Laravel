/* src/pages/booking/BookingPage.jsx 
| -- Select room from available options
| -- Choose check-in and check-out dates
| -- Select customer from dropdown (or add new customer)
| -- Validate form input (date logic, required fields)
| -- Submit booking request to backend
| -- Display confirmation message with booking details
*/
import React, { useState, useEffect } from 'react';
import { fetchAvailableRooms, fetchCustomers, createBooking } from '../../api'; // Assume these API functions are defined
import './BookingPage.css'; // Assume we have some basic styling

const BookingPage = () => {
    const [rooms, setRooms] = useState([]);
    const [customers, setCustomers] = useState([]);

    const [formData, setFormData] = useState({
        roomId: '',
        customerId: '',
        checkInDate: '',
        checkOutDate: ''
    });

    const [error, setError] = useState('');
    const [confirmation, setConfirmation] = useState(null);

    useEffect(() => {
        // Fetch available rooms and customers on component mount
        fetchAvailableRooms().then(setRooms).catch(err => setError('Failed to load rooms'));
        fetchCustomers().then(setCustomers).catch(err => setError('Failed to load customers'));
    }, []);

    const handleChange = (e) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value
        });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        setError('');
        setConfirmation(null);

        // Basic validation
        if (!formData.roomId || !formData.customerId || !formData.checkInDate || !formData.checkOutDate) {
            setError('All fields are required');
            return;
        }   
        if (new Date(formData.checkInDate) >= new Date(formData.checkOutDate)) {
            setError('Check-out date must be after check-in date');
            return;
        }

        // Submit booking request to backend
        createBooking(formData)
            .then(response => {
                setConfirmation(response.data); // Assume response contains booking details

            })
            .catch(err => setError('Failed to create booking'));
    };

    return (
        <div className="booking-page">
            <h1>Book a Room</h1>
            {error && <div className="error">{error}</div>}
            {confirmation && (
                <div className="confirmation">
                    <h2>Booking Confirmed!</h2>
                    <p>Room: {confirmation.roomName}</p>
                    <p>Customer: {confirmation.customerName}</p>
                    <p>Check-in: {confirmation.checkInDate}</p>
                    <p>Check-out: {confirmation.checkOutDate}</p>
                </div>
            )}
            <form onSubmit={handleSubmit}>
                <label>
                    Room:
                    <select name="roomId" value={formData.roomId} onChange={handleChange}>
                        <option value="">Select a room</option>
                        {rooms.map(room => (
                            <option key={room.id} value={room.id}>{room.name}</option>
                        ))}
                    </select>
                </label>
                <label>
                    Customer:
                    <select name="customerId" value={formData.customerId} onChange={handleChange}>
                        <option value="">Select a customer</option>
                        {customers.map(customer => (
                            <option key={customer.id} value={customer.id}>{customer.name}</option>
                        ))}
                    </select>
                </label>
                <label>
                    Check-in Date:
                    <input type="date" name="checkInDate" value={formData.checkInDate} onChange={handleChange} />
                </label>
                <label>
                    Check-out Date:
                    <input type="date" name="checkOutDate" value={formData.checkOutDate} onChange={handleChange} />
                </label>
                <button type="submit">Book Now</button>
            </form>
        </div>
    );
};

export default BookingPage;


