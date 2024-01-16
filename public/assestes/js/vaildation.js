

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

function validateForm(event) {

    event.preventDefault();

    var form = document.getElementById("wikiForm");
    var categorySelect = form.querySelector("#exampleFormControlSelect1");
    var tagsCheckbox = form.querySelectorAll("input[name='selectTag[]']");
    var titleInput = form.querySelector("input[name='title']");
    var contentTextarea = form.querySelector("textarea[name='content']");



    if (categorySelect.value === "") {
        alert("Please select a category");
        return;
    }

    var selectedTags = Array.from(tagsCheckbox).filter(function (checkbox) {
        return checkbox.checked;
    });
    if (selectedTags.length === 0) {
        alert("Please select at least one tag");
        return;
    }

    if (titleInput.value.trim() === "") {
        alert("Please enter the title");
        return;
    }


    if (contentTextarea.value.trim() === "") {
        alert("Please enter the content");
        return;
    }

    form.submit();
}