// Get references to the HTML elements
const usernameInput = document.getElementById("username");
const usernameButton = document.getElementById("usernameBtn");

// Function to remove special characters and spaces from a string
function removeSpecialCharactersAndSpaces(str) {
  return str.replace(/[^\w]/gi, '');
}

// Function to generate a random username
function generateUsername() {
  // Load the words file using fetch()
  fetch('resource/words.txt')
    .then(response => response.text())
    .then(text => {
      // Split the text into an array of words
      const words = text.split('\n');
      
      // Choose two random words
      const word1 = removeSpecialCharactersAndSpaces(words[Math.floor(Math.random() * words.length)]);
      const word2 = removeSpecialCharactersAndSpaces(words[Math.floor(Math.random() * words.length)]);

      // Generate a random number between 10000 and 99999
      const number = Math.floor(Math.random() * 90000) + 10000;

      // Combine the words and number into a username
      let username = `${word1}${word2}${number}`;

      // Remove any spaces from the username
      username = username.replace(/\s+/g, '');

      // Limit the username to 8-16 characters
      username = username.slice(0, 16);

      // Set the value of the input field
      usernameInput.value = username;
    })
    .catch(error => {
      console.error('Error loading words file:', error);
    });
}

// Add a click event listener to the button
if (usernameButton !== null) {
  usernameButton.addEventListener('click', generateUsername);
}


// email 


function generateRandomEmail() {
  const alphabet = "abcdefghijklmnopqrstuvwxyz0123456789";
  const emailHosts = ["gmail.com", "yahoo.com", "outlook.com", "rocketmail.com", "protonmail.com", "aol.com", "zohomail.com", "icloud.com", "gmx.com"];
  
  let email = "";
  
  // Generate a random string of 10 characters
  for (let i = 0; i < 10; i++) {
    email += alphabet.charAt(Math.floor(Math.random() * alphabet.length));
  }
  
  // Append a random email host
  const randomIndex = Math.floor(Math.random() * emailHosts.length);
  const randomHost = emailHosts[randomIndex];
  email += "@" + randomHost;
  
  return email;
}

// Get the email input field and the "Generate" button
const emailField = document.getElementById("email");
const aliasBtn = document.getElementById("emailBtn");

// Add a click event listener to the "Generate" button
if (aliasBtn) {
  aliasBtn.addEventListener("click", function() {
    emailField.value = generateRandomEmail();
  });
}

//phone generate 

const phoneNumberDisplay = document.querySelector("#phone");
const phoneNumberBtn = document.querySelector("#phoneBtn");

if (phoneNumberBtn !== null) {
  phoneNumberBtn.addEventListener("click", () => {
    // Generate a random 9-digit number
    const randomDigits = Math.floor(Math.random() * 1000000000).toString().padStart(9, "0");

    // Choose a random prefix between +63 and 09
    const prefixes = ["+639", "09"];
    const randomPrefix = prefixes[Math.floor(Math.random() * prefixes.length)];

    // Combine the prefix and the random digits to form the phone number
    const phoneNumber = `${randomPrefix}${randomDigits}`;

    // Update the display with the generated phone number
    phoneNumberDisplay.value = phoneNumber;
  });
}

// password generate
const display = document.querySelector("#password-input");
let button = document.querySelector("#passwordBtn");
let chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";

if (button !== null) {
  button.onclick = ()=>{
    let i,
    randomPassword = "";
    for (i = 0; i < 16; i++) {
      randomPassword = randomPassword + chars.charAt(
        Math.floor(Math.random() * chars.length)
        );
    }
    display.value = randomPassword;
  }
}



// firstname generate 

const firstNameDisplay = document.querySelector("#firstname");
let firstNameBtn = document.querySelector("#firstnameBtn");

if (firstNameBtn !== null) {
  firstNameBtn.addEventListener("click", () => {
    fetch("resource/firstnames.txt")
      .then(response => response.text())
      .then(text => {
        const firstNames = text.trim().split("\n");
        const randomIndex = Math.floor(Math.random() * firstNames.length);
        const randomFirstName = firstNames[randomIndex];
        firstNameDisplay.value = randomFirstName;
      });
  });
}


// middlename generate 
const middleNameDisplay = document.querySelector("#middlename");
const middleNameBtn = document.querySelector("#middlenameBtn");

if (middleNameBtn !== null) {
    middleNameBtn.addEventListener("click", () => {
    fetch("resource/lastnames.txt")
      .then(response => response.text())
      .then(text => {
        const middleNames = text.trim().split("\n");
        const randomIndex1 = Math.floor(Math.random() * middleNames.length);
        let randomMiddleName = middleNames[randomIndex1].toLowerCase(); // convert all to lowercase first
        randomMiddleName = randomMiddleName.charAt(0).toUpperCase() + randomMiddleName.slice(1); // capitalize first letter
        middleNameDisplay.value = randomMiddleName;
      });
  });
}



// lastname generate 
const lastNameDisplay = document.querySelector("#lastname");
const lastNameBtn = document.querySelector("#lastnameBtn");

if (lastNameBtn !== null) {
    lastNameBtn.addEventListener("click", () => {
    fetch("resource/lastnames.txt")
      .then(response => response.text())
      .then(text => {
        const lastNames = text.trim().split("\n");
        const randomIndex2 = Math.floor(Math.random() * lastNames.length);
        let randomLastName = lastNames[randomIndex2].toLowerCase(); // convert all to lowercase first
        randomLastName = randomLastName.charAt(0).toUpperCase() + randomLastName.slice(1); // capitalize first letter
        lastNameDisplay.value = randomLastName;
      });
  });
}


//birthdate generate 

const birthdateDisplay = document.querySelector("#birthdate");
const birthdateBtn = document.querySelector("#birthdateBtn");

if (birthdateBtn !== null) {
    birthdateBtn.addEventListener("click", () => {
    const randomYear = Math.floor(Math.random() * (2003 - 1923)) + 1922;
    const randomMonth = Math.floor(Math.random() * 12) + 1;
    const randomDay = Math.floor(Math.random() * 31) + 1;

    const birthdate = new Date(randomYear, randomMonth, randomDay);
    const dateString = birthdate.toISOString().slice(0, 10);
    
    birthdateDisplay.value = dateString;
  });
}


//address generate

const addressDisplay = document.querySelector("#address");
const addressBtn = document.querySelector("#addressBtn");

if (addressBtn !== null) {
    addressBtn.addEventListener("click", () => {
    fetch('https://fakerapi.it/api/v1/addresses')
      .then(response => response.json())
      .then(data => {
        const address = data.data[0];
        const randomAddress = ` ${address.city}, ${address.country}`;
        addressDisplay.value = randomAddress;
      });
  });
}


function generateAllFields() {
  generateUsername();
  emailField.value = generateRandomEmail();
  phoneNumberDisplay.value = generateRandomPhoneNumber(); // Generate random phone number
  display.value = generateRandomPassword();
  generateRandomFirstName().then(randomFirstName => {
    firstNameDisplay.value = randomFirstName;
  });
  generateRandomMiddleName().then(randomMiddleName => {
    middleNameDisplay.value = randomMiddleName;
  });
  generateRandomLastName().then(randomLastName => {
    lastNameDisplay.value = randomLastName;
  });
  birthdateDisplay.value = generateRandomBirthdate();
  generateRandomAddress().then(randomAddress => {
    addressDisplay.value = randomAddress;
  });
}


// Function to generate a random phone number
function generateRandomPhoneNumber() {
  const randomDigits = Math.floor(Math.random() * 1000000000).toString().padStart(9, "0");
  const prefixes = ["+639", "09"];
  const randomPrefix = prefixes[Math.floor(Math.random() * prefixes.length)];
  const phoneNumber = `${randomPrefix}${randomDigits}`;
  return phoneNumber;
}

// Function to generate a random password
function generateRandomPassword() {
  let chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";
  let randomPassword = "";
  for (let i = 0; i < 16; i++) {
    randomPassword += chars.charAt(Math.floor(Math.random() * chars.length));
  }
  return randomPassword;
}

// Function to generate a random first name
function generateRandomFirstName() {
  return new Promise((resolve, reject) => {
    fetch("resource/firstnames.txt")
      .then(response => response.text())
      .then(text => {
        const firstNames = text.trim().split("\n");
        const randomIndex = Math.floor(Math.random() * firstNames.length);
        const randomFirstName = firstNames[randomIndex];
        resolve(randomFirstName);
      })
      .catch(error => {
        reject(error);
      });
  });
}

// Function to generate a random middle name
function generateRandomMiddleName() {
  return new Promise((resolve, reject) => {
    fetch("resource/lastnames.txt")
      .then(response => response.text())
      .then(text => {
        const middleNames = text.trim().split("\n");
        const randomIndex = Math.floor(Math.random() * middleNames.length);
        let randomMiddleName = middleNames[randomIndex].toLowerCase();
        randomMiddleName = randomMiddleName.charAt(0).toUpperCase() + randomMiddleName.slice(1);
        resolve(randomMiddleName);
      })
      .catch(error => {
        reject(error);
      });
  });
}

// Function to generate a random last name
function generateRandomLastName() {
  return new Promise((resolve, reject) => {
    fetch("resource/lastnames.txt")
      .then(response => response.text())
      .then(text => {
        const lastNames = text.trim().split("\n");
        const randomIndex = Math.floor(Math.random() * lastNames.length);
        let randomLastName = lastNames[randomIndex].toLowerCase();
        randomLastName = randomLastName.charAt(0).toUpperCase() + randomLastName.slice(1);
        resolve(randomLastName);
      })
      .catch(error => {
        reject(error);
      });
  });
}


// Function to generate a random birthdate
function generateRandomBirthdate() {
  const birthdate = new Date();
  birthdate.setFullYear(
    Math.floor(Math.random() * (2003 - 1923)) + 1922,
    Math.floor(Math.random() * 12),
    Math.floor(Math.random() * 31) + 1
  );
  const dateString = birthdate.toISOString().slice(0, 10);
  return dateString;
}

// Function to generate a random address
function generateRandomAddress() {
  return new Promise((resolve, reject) => {
    fetch('https://fakerapi.it/api/v1/addresses')
      .then(response => response.json())
      .then(data => {
        const address = data.data[0];
        const randomAddress = `${address.city}, ${address.country}`;
        resolve(randomAddress);
      })
      .catch(error => {
        reject(error);
      });
  });
}


// Add a click event listener to the "Generate All" button
const generateAllButton = document.getElementById("generateAllBtn");
if (generateAllButton) {
  generateAllButton.addEventListener("click", generateAllFields);
}







// Submit the data to save.php
$(document).ready(function() {
  $("#save").click(function() {
    var username = $("#username").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var pwd = $("#password-input").val();
    var firstname = $("#firstname").val();
    var middlename = $("#middlename").val();
    var lastname = $("#lastname").val();
    var birthdate = $("#birthdate").val();
    var address = $("#address").val();
    var url = $("#url").val();

    $.ajax({
      type: "POST",
      url: "../client/controllers/save.php",
      data: {
        username: username,
        email: email,
        phone: phone,
        pwd: pwd,
        firstname: firstname,
        middlename: middlename,
        lastname: lastname,
        birthdate: birthdate,
        address: address,
        url: url
      },
      dataType: "json", // Specify the expected data type as JSON
      success: function(response) {
            if (response.result === "success") {
                alert('You have successfully created an alias!');
                window.location.reload();
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown, response) {
            console.log('An error occurred: ' + textStatus + ' - ' + errorThrown);
            console.log(jqXHR.responseText);
            if (response && response.result === "error") {
                alert('Error: ' + response.message);
            }
        }
    });
  });
});



