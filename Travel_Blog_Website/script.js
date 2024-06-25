document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const nameInput = document.getElementById("commentName");
    const emailInput = document.getElementById("commentEmail");
    const messageInput = document.getElementById("commentMessage");
    nameInput.addEventListener("input",function(){validateName();});
    emailInput.addEventListener("input",function(){validateEmail();});
    messageInput.addEventListener("input",function(){validateMessage();});
    nameInput.addEventListener("blur",function(){validateName();});
    emailInput.addEventListener("blur",function(){validateEmail();});
    messageInput.addEventListener("blur",function(){validateMessage();});
    form.addEventListener("submit",function(event){event.preventDefault();
        if (validateInputs()) {
            const formData = {
                name: nameInput.value,
                email: emailInput.value,
                message: messageInput.value
            };
            console.log(formData);
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Comment submitted successfully!',
                timer: 3000,
                timerProgressBar: true
            });
            form.reset(); 
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Please fill out all fields correctly.'
            });
        }
    });
    function validateInputs() {
        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isMessageValid = validateMessage();
        return isNameValid && isEmailValid && isMessageValid;
    }
    function validateName() {
        const name = nameInput.value.trim();
        const parentElement = nameInput.parentElement;
        let errorMessage = parentElement.querySelector(".error-message-name");
        if (!errorMessage) {
            errorMessage = document.createElement("div");
            errorMessage.classList.add("error-message-name");
            parentElement.appendChild(errorMessage);
        }
        if (!name) {
            errorMessage.textContent = "Name is required.";
            errorMessage.style.color = "red";
            return false;
        } else {
            errorMessage.textContent = "";
            return true;
        }
    }
    function validateEmail() {
        const email = emailInput.value.trim();
        const parentElement = emailInput.parentElement;
        let errorMessage = parentElement.querySelector(".error-message-email");
        const emailRegex = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
        if (!errorMessage) {
            errorMessage = document.createElement("div");
            errorMessage.classList.add("error-message-email");
            parentElement.appendChild(errorMessage);
        }
        if (!emailRegex.test(email)) {
            errorMessage.textContent = "Please enter a valid email address.";
            errorMessage.style.color = "red";
            return false;
        } else {
            errorMessage.textContent = "";
            return true;
        }
    }
    function validateMessage() {
        const message = messageInput.value.trim();
        const parentElement = messageInput.parentElement;
        let errorMessage = parentElement.querySelector(".error-message-message");
        if (!errorMessage) {
            errorMessage = document.createElement("div");
            errorMessage.classList.add("error-message-message");
            parentElement.appendChild(errorMessage);
        }
        if (!message) {
            errorMessage.textContent = "Message is required.";
            errorMessage.style.color = "red";
            return false;
        } else {
            errorMessage.textContent = "";
            return true;
        }
    }
});
window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');
    var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    if(window.scrollY > 10) { 
        navbar.classList.add('navbar-white');
        navLinks.forEach(function(link) {
            link.style.color = 'black';
        });
    } else {
        navbar.classList.remove('navbar-white');
        navLinks.forEach(function(link) {
            link.style.color = '';
        });
    }
});
var currentPage = location.pathname.split('/').pop();
var defaultPage = 'index.html';
if (!currentPage) {
  currentPage = defaultPage;
}
document.querySelectorAll('.navbar-nav .nav-link').forEach(function(link) {
  if (link.getAttribute('href') === currentPage) {
    link.classList.add('active');
  }
});
