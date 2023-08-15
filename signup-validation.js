document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');

    form.addEventListener('submit', function(event) {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm-password');
        const phone = document.getElementById('phone');
        const email = document.getElementById('email');

        if (password.value !== confirmPassword.value) {
            alert('Passwords do not match. Please check.');
            event.preventDefault();
        }

        // Phone number validation (10 digits)
        if (!/^\d{10}$/.test(phone.value)) {
            alert('Please enter a valid 10-digit phone number.');
            event.preventDefault();
        }

        // Email validation
        if (!/^\S+@\S+\.\S+$/.test(email.value)) {
            alert('Please enter a valid email address.');
            event.preventDefault();
        }
    });
});
