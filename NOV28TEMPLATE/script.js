// script.js

// Function to validate email address
function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Function to handle the form submission
function subscribeToNewsletter(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get the email input value
    var emailInput = document.getElementById('emailInput');
    var emailAddress = emailInput.value;

    // Validate the email address
    if (isValidEmail(emailAddress)) {
        // Perform your subscription logic here (e.g., send the email to your server)
        alert('Subscribed successfully!'); // Replace with your actual subscription logic
        emailInput.value = ''; // Clear the input field
    } else {
        alert('Invalid email address. Please enter a valid email.'); // Replace with your validation logic
    }
}

// Add an event listener to the form
document.addEventListener('DOMContentLoaded', function() {
    var newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', subscribeToNewsletter);
    }
});
