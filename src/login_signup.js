 document.addEventListener('DOMContentLoaded', function() {
    const loginContainer = document.querySelector('.login-container');
    const registrationContainer = document.querySelector('.registration-container');
    const registerLink = document.getElementById('register-link');
    const loginForm = document.querySelector('#login-form');
    const registrationForm = document.getElementById('registration-form');
    const errorPopup = document.getElementById('error-popup');

    // Function to toggle between login and registration forms
    function toggleForms(event) {
        event.preventDefault();
        if (loginContainer.style.display === 'block') {
            loginContainer.style.display = 'none';
            registrationContainer.style.display = 'block';
        } else {
            loginContainer.style.display = 'block';
            registrationContainer.style.display = 'none';
        }
        // Clear any previous error messages when toggling forms
        errorPopup.style.display = 'none';
        errorPopup.textContent = '';
    }
    registerLink.addEventListener('click', toggleForms);

    // Function to show error messages
    function showError(message) {
        errorPopup.textContent = message;
        errorPopup.style.display = 'block';
    }
    loginForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(loginForm);
        fetch('login.php', {  // Update this URL to match your login.php endpoint
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to a new page upon successful login
                window.location.href = 'dashboard.html';
            } else {
                showError(data.message); 
            }
        })
        .catch(error => {
            showError('An error occurred. Please try again.');
        });
    });

    registrationForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(registrationForm);

        fetch('register.php', {  // Update this URL to match your register.php endpoint
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Registration successful!');
                window.location.href = 'login.html'; // Redirect after successful registration
            } else {
                showError(data.message); 
            }
        })
        .catch(error => {
            showError('An error occurred. Please try again.');
        });
    });    
});