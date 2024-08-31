
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form');
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const email = document.getElementById('email');
    const phoneNumber = document.getElementById('phoneNumber');
    const message = document.getElementById('message');
    const checkbox = document.getElementById('check');

    // Function to validate inputs
    function validateInput(input, errorId, validateFn) {
        const errorDiv = document.getElementById(errorId);
        if (!validateFn(input.value.trim())) {
            errorDiv.textContent = getErrorMessage(errorId);
        } else {
            errorDiv.textContent = '';
        }
    }

    // Function to get error messages
    function getErrorMessage(errorId) {
        switch (errorId) {
            case 'firstNameError':
                return 'First Name is required';
            case 'lastNameError':
                return 'Last Name is required';
            case 'emailError':
                return email.value.trim() === '' ? 'Email is required' : 'Invalid email format';
            case 'phoneNumberError':
                return phoneNumber.value.trim() === '' ? 'Phone Number is required' : 'Phone Number can only contain numbers';
            case 'messageError':
                return 'Message is required';
            case 'checkError':
                return 'You must agree to our friendly privacy policy';
            default:
                return '';
        }
    }

    // Validation functions
    function isValidFirstName(value) {
        return value !== '';
    }

    function isValidLastName(value) {
        return value !== '';
    }

    function isValidEmail(value) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(value);
    }

    function isValidPhoneNumber(value) {
        const re = /^[0-9]+$/;
        return re.test(value);
    }

    function isValidMessage(value) {
        return value !== '';
    }

    function isCheckboxChecked(value) {
        return value === 'on';
    }

    // Add blur event listeners for validation
    firstName.addEventListener('blur', () => validateInput(firstName, 'firstNameError', isValidFirstName));
    lastName.addEventListener('blur', () => validateInput(lastName, 'lastNameError', isValidLastName));
    email.addEventListener('blur', () => validateInput(email, 'emailError', isValidEmail));
    phoneNumber.addEventListener('blur', () => validateInput(phoneNumber, 'phoneNumberError', isValidPhoneNumber));
    message.addEventListener('blur', () => validateInput(message, 'messageError', isValidMessage));
    checkbox.addEventListener('change', () => validateInput(checkbox, 'checkError', isCheckboxChecked));

    // Add input event listeners to clear error messages as user types
    firstName.addEventListener('input', () => validateInput(firstName, 'firstNameError', isValidFirstName));
    lastName.addEventListener('input', () => validateInput(lastName, 'lastNameError', isValidLastName));
    email.addEventListener('input', () => validateInput(email, 'emailError', isValidEmail));
    phoneNumber.addEventListener('input', () => validateInput(phoneNumber, 'phoneNumberError', isValidPhoneNumber));
    message.addEventListener('input', () => validateInput(message, 'messageError', isValidMessage));
    checkbox.addEventListener('change', () => validateInput(checkbox, 'checkError', isCheckboxChecked));

    // Form submission handler
    form.addEventListener('submit', function (event) {
        let valid = true;


        [firstName, lastName, email, phoneNumber, message, checkbox].forEach(input => {
            const errorId = `${input.id}Error`;
            validateInput(input, errorId, getValidationFunction(input.id));
            if (document.getElementById(errorId).textContent !== '') {
                valid = false;
            }
        });

        if (!valid) {
            event.preventDefault();
        }
    });

    function getValidationFunction(id) {
        switch (id) {
            case 'firstName':
                return isValidFirstName;
            case 'lastName':
                return isValidLastName;
            case 'email':
                return isValidEmail;
            case 'phoneNumber':
                return isValidPhoneNumber;
            case 'message':
                return isValidMessage;
            case 'check':
                return isCheckboxChecked;
            default:
                return () => true;
        }
    }
});
