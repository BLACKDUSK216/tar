var sampleNames = ['John Doe', 'Alice Smith', 'Bob Johnson', 'Emily Brown', 'Michael Wilson'];
var sampleEmails = ['john@example.com', 'alice@example.com', 'bob@example.com', 'emily@example.com', 'michael@example.com'];
var sampleMessages = ['Hello, this is a test message.', 'Hi there!', 'How are you?', 'This is just a demo.', 'Lorem ipsum dolor sit amet.'];

function fillForm() {
    var nameInput = document.getElementById('name');
    var emailInput = document.getElementById('email');
    var messageInput = document.getElementById('message');

    var randomName = sampleNames[Math.floor(Math.random() * sampleNames.length)];
    var randomEmail = sampleEmails[Math.floor(Math.random() * sampleEmails.length)];
    var randomMessage = sampleMessages[Math.floor(Math.random() * sampleMessages.length)];

    nameInput.value = randomName;
    emailInput.value = randomEmail;
    messageInput.value = randomMessage;
}

document.getElementById('fillButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default form submission
    fillForm();
});
