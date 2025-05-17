// Form validation function
function validateForm(form) {
    let inputs = form.querySelectorAll('input[required]');
    for (let input of inputs) {
        if (input.value.trim() === '') {
            alert('Please fill out the ' + input.name + ' field.');
            input.focus();
            return false;
        }
    }
    return true;
}

// Attach validation to forms
document.addEventListener('DOMContentLoaded', function() {
    let forms = document.querySelectorAll('form');
    for (let form of forms) {
        form.onsubmit = function(event) {
            if (!validateForm(form)) {
                event.preventDefault();
            }
        }
    }
});

// Toggle visibility of the password field
function togglePasswordVisibility(toggleButtonId, passwordFieldId) {
    let toggleButton = document.getElementById(toggleButtonId);
    let passwordField = document.getElementById(passwordFieldId);

    toggleButton.addEventListener('click', function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleButton.textContent = 'Hide';
        } else {
            passwordField.type = 'password';
            toggleButton.textContent = 'Show';
        }
    });
}

// Initialize password visibility toggles
document.addEventListener('DOMContentLoaded', function() {
    let passwordToggles = document.querySelectorAll('.password-toggle');
    for (let toggle of passwordToggles) {
        let toggleButtonId = toggle.getAttribute('data-toggle-button');
        let passwordFieldId = toggle.getAttribute('data-password-field');
        togglePasswordVisibility(toggleButtonId, passwordFieldId);
    }
});

// Example function to handle AJAX requests (if needed)
function sendAjaxRequest(url, method, data, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(xhr.responseText);
        }
    };

    xhr.send(data);
}

// Example usage of sendAjaxRequest
document.getElementById('exampleButton').addEventListener('click', function() {
    sendAjaxRequest('example.php', 'POST', 'param1=value1&param2=value2', function(response) {
        console.log('Server response:', response);
    });
});
