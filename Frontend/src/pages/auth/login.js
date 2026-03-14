/* 
|-- src/pages/auth/login.js
|-- Login Form
|-- API authentication
|-- Redirect after login
|-- Basic error handling 
*/

// Wait for the DOM to load
document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const errorMessage = document.getElementById('errorMessage');
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        try {
            const response = await fetch('/api/auth/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ username, password })
            });
            if (response.ok) {
                const data = await response.json();
                // Store token in localStorage or cookie
                localStorage.setItem('authToken', data.token);
                // Redirect to dashboard
                window.location.href = '/dashboard.html';
            } else {
                const errorData = await response.json();
                errorMessage.textContent = errorData.message || 'Login failed. Please try again.';
                errorMessage.style.display = 'block';
            }
        } catch (error) {
            errorMessage.textContent = 'An error occurred. Please try again later.';
            errorMessage.style.display = 'block';
        }
    });
});

