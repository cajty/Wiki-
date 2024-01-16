

function validateForm() {
    var firstName = document.getElementById('firstName').value;
    var lastName = document.getElementById('lastName').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Check if any field is empty
    if (firstName == "" || lastName == "" || email == "" || password == "") {
        alert('Please fill in all fields');
        return false;
    }

    // Validate email format
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    // Validate password length
    if (password.length < 8) {
        alert('Password must be at least 8 characters long');
        return false;
    }

    return true;
}
