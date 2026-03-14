/* src/pages/auth/resetPassword.js */ 
import React, { useState } from 'react';
import  { useSearchParams, useNavigate } from 'react-router-dom';

function ResetPassword() {

    const [searchParams] = useSearchParams();
    const navigate = useNavigate();

    const token = searchParams.get('token'); // Get the token from the URL
    const email = searchParams.get('email'); // Get the email from the URL

    const [password, setPassword] = useState('');
    const [confirm_password, setConfirmPassword] = useState('');
    const [message, setMessage] = useState('');
    const [error, setError] = useState('');

    const handleSubmit = async (e) => {

        e.preventDefault();

        setMessage('');
        setError('');

        if (password !== confirm_password) {
            setError('Passwords do not match');
            return;
        }

        try {
            const response = await fetch('http://localhost:5000/api/auth/reset-password', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ token, email, password }),
            });
            const data = await response.json();
            if (response.ok) {
                setMessage(data.message);
                setTimeout(() => {
                    navigate('/login'); // Redirect to login page after successful password reset
                }, 2000);
            } else {
                setError(data.error);
            }
        } catch (err) {
            setError('An error occurred. Please try again later.');
        }
    };

    return (
        <div className="reset-password-container">
            <h2>Reset Password</h2>
            <form onSubmit={handleSubmit}>
                <div className="form-group">
                    <label htmlFor="password">New Password</label>
                    <input
                        type="password"
                        id="password"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                        required
                    />
                </div>
                <div className="form-group">
                    <label htmlFor="confirm_password">Confirm New Password</label>
                    <input
                        type="password"
                        id="confirm_password"
                        value={confirm_password}
                        onChange={(e) => setConfirmPassword(e.target.value)}
                        required
                    />
                </div>
                <button type="submit">Reset Password</button>
            </form>
            {message && <p className="success-message">{message}</p>}
            {error && <p className="error-message">{error}</p>}
        </div>
    );
}

export default ResetPassword;


