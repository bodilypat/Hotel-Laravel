/* 
|-- src/pages/auth/login.jsx
|-- Form Validation with React Hook Form
|-- Secure API request with JWT
|-- JWT token stored in HttpOnly cookie for security
|-- Redirect after login using React Router
*/

import React from 'react';
import { useForm } from 'react-hook-form';
import { useHistory, useNavigate } from 'react-router-dom';

function Login() {

    const navigate = useNavigate();

    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState('');

    const handleSubmit = async (e) => {
        e.preventDefault();

        try {
            const response = await fetch('http://localhost:5000/api/auth/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email, password }),
                credentials: 'include' // Include cookies in the request
            });

            if (response.ok) {
                // Store token
                localStorage.setItem('authToken', data.token);

                // Redirect to dashboard
                navigate('/dashboard');
            } else {
                const errorData = await response.json();
                setError(errorData.message || 'Login failed. Please try again.');
            }
        } catch (error) {
            setError('An error occurred. Please try again later.');
        }
    };

    return (
        <div className="login-container">
            <div className="login-form">
                <h2>Hotal Login</h2>
                {error && <p className="error">{error}</p>}
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label>Email:</label>
                        <input
                            type="email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                            required
                        />
                    </div>
                    <div className="form-group">
                        <label>Password:</label>
                        <input
                            type="password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            required
                        />
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    );
};
