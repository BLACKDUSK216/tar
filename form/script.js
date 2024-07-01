document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('.form');
  const popup = document.getElementById('popup');

  const inputFields = form.querySelectorAll('.form-control');
  inputFields.forEach(input => {
    input.addEventListener('blur', function() {
      validateInput(input);
    });
  });

  const emailInput = document.getElementById('email');
  emailInput.addEventListener('input', function() {
    validateInput(emailInput);
  });

  const usernameInput = document.getElementById('username');
  usernameInput.addEventListener('input', function() {
    validateUsername(usernameInput);
  });

  const passwordInput = document.getElementById('password');
  passwordInput.addEventListener('input', function() {
    validatePassword(passwordInput);
  });

  const confirmPasswordInput = document.getElementById('confirmPassword');
  confirmPasswordInput.addEventListener('input', function() {
    validateConfirmPassword(confirmPasswordInput);
  });

  const phoneInputField = document.querySelector("#phone");
  const phoneInput = window.intlTelInput(phoneInputField, {
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });

  phoneInputField.addEventListener('input', function() {
    const isValidNumber = phoneInput.isValidNumber();
    const phoneError = document.getElementById('phone-error');
    if (!isValidNumber) {
      phoneError.textContent = 'Please enter a valid phone number.';
    } else {
      const formattedNumber = phoneInput.getNumber(intlTelInputUtils.numberFormat.NATIONAL);
      phoneInputField.value = formattedNumber;
      phoneError.textContent = '';
    }
  });

  form.addEventListener('submit', function(event) {
    event.preventDefault();

    let isValid = true;

    inputFields.forEach(input => {
      if (!validateInput(input)) {
        isValid = false;
      }
    });

    if (!phoneInput.isValidNumber()) {
      isValid = false;
      const phoneError = document.getElementById('phone-error');
      phoneError.textContent = 'Please enter a valid phone number.';
    } else {
      const phoneError = document.getElementById('phone-error');
      phoneError.textContent = '';
    }

    if (isValid) {
      const formData = {
        username: usernameInput.value.trim(),
        email: emailInput.value.trim(),
        password: passwordInput.value.trim(),
        dob: document.getElementById('dob').value.trim(),
        gender: document.querySelector('input[name="gender"]:checked').value,
        phone: phoneInput.getNumber()
      };

      console.log('Form data:', formData);

      const params = new URLSearchParams(formData).toString();
      window.location.href = `data.html?${params}`;
    }
  });


  function validateInput(input) {
    const inputValue = input.value.trim();
    const inputId = input.id;
    const errorElement = document.getElementById(`${inputId}-error`);

    if (inputValue === '') {
      errorElement.textContent = 'This field is required.';
      return false;
    }

    if (inputId === 'bio') {
      const sentences = inputValue.split('. ');
      for (let i = 0; i < sentences.length; i++) {
        const sentence = sentences[i].trim();
        if (!/^[A-Z]/.test(sentence)) {
          errorElement.textContent = 'Each sentence should start with a capital letter after a full stop.';
          return false;
        }
        if (sentence.includes(': ')) {
          errorElement.textContent = 'There should not be any space before colon ":" and there should be one space after colon.';
          return false;
        }
        if (sentence.includes(' (') || sentence.includes('( ') || sentence.includes(' )')) {
          errorElement.textContent = 'There should be always one space before an open bracket "(", no space after open bracket "(", and before close bracket ")".';
          return false;
        }
        if (sentence.includes(') ,')) {
          errorElement.textContent = 'There should not be a space after close bracket ")" and before comma ",".';
          return false;
        }
        if (sentence.includes(' .')) {
          errorElement.textContent = 'There should not be any space before full stop "." and there should be one space after full stop.';
          return false;
        }
        if (sentence.includes(', ')) {
          errorElement.textContent = 'There should not be any space before comma "," and there should be one space after comma.';
          return false;
        }
        if (sentence.includes(' ?')) {
          errorElement.textContent = 'There should not be a space before a question mark "?".';
          return false;
        }
        const words = sentence.split(', ');
        if (words.length > 1 && !/^[a-z]/.test(words[1])) {
          errorElement.textContent = 'The word after comma "," should start with a small letter.';
          return false;
        }
      }
    }
    
    errorElement.textContent = '';
    return true;
  }    

  function validateUsername(usernameInput) {
    const usernameValue = usernameInput.value.trim();
    const errorElement = document.getElementById('username-error');

    if (usernameValue.includes(' ')) {
      errorElement.textContent = 'Username cannot contain spaces.';
      return false;
    } else {
      errorElement.textContent = '';
      return true;
    }
  }

  function validatePassword(passwordInput) {
    const passwordValue = passwordInput.value.trim();
    const errorElement = document.getElementById('password-error');

    const errors = [];

    if (passwordValue.length < 8) {
      errors.push('Password must be at least 8 characters long.');
    }

    if (!/[A-Z]/.test(passwordValue)) {
      errors.push('Password must contain at least one uppercase letter.');
    }

    if (!/\d/.test(passwordValue)) {
      errors.push('Password must contain at least one number.');
    }

    if (!/[\W_]/.test(passwordValue)) {
      errors.push('Password must contain at least one special character.');
    }

    if (errors.length > 0) {
      errorElement.textContent = errors.join(' ');
      return false;
    } else {
      errorElement.textContent = '';
      return true;
    }
  }

  function validateConfirmPassword(confirmPasswordInput) {
    const confirmPasswordValue = confirmPasswordInput.value.trim();
    const passwordValue = document.getElementById('password').value.trim();
    const errorElement = document.getElementById('confirmPassword-error');

    if (confirmPasswordValue !== passwordValue) {
      errorElement.textContent = 'Passwords do not match.';
      return false;
    } else {
      errorElement.textContent = '';
      return true;
    }
  }

  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
});
