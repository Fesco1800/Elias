// function showNotification(message) {
//   var notificationBanner = document.getElementById('notification-banner');
//   var notificationMessage = document.getElementById('notification-message');
//   notificationMessage.textContent = message;
//   notificationBanner.style.display = 'block';
// }

// function closeNotification() {
//   var notificationBanner = document.getElementById('notification-banner');
//   notificationBanner.style.display = 'none';
// }


var notificationVisible = false; // Variable to track if the notification is currently visible

  function showNotification(message) {
    var notificationBanner = document.getElementById('notification-banner');
    var notificationMessage = document.getElementById('notification-message');
    notificationMessage.textContent = message;
    notificationBanner.style.display = 'block';
    notificationVisible = true;
  }

  function closeNotification() {
    var notificationBanner = document.getElementById('notification-banner');
    notificationBanner.style.display = 'none';
    notificationVisible = false;
  }

  // Attach event listener to close button
  $('.close').click(function() {
    closeNotification();
  });

var passwordInput = document.getElementById("password-input");
  var togglePasswordBtn = document.getElementById("togglePasswordBtn");
  var togglePasswordIcon = document.getElementById("togglePasswordIcon");

  togglePasswordBtn.addEventListener("click", function () {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      togglePasswordIcon.classList.remove("bi-eye");
      togglePasswordIcon.classList.add("bi-eye-slash");
    } else {
      passwordInput.type = "password";
      togglePasswordIcon.classList.remove("bi-eye-slash");
      togglePasswordIcon.classList.add("bi-eye");
    }
  });

// Add an event listener to the "Use my Email" link
document.getElementById("useEmailLink").addEventListener("click", function(event) {
  event.preventDefault(); // Prevent the default link behavior
  
  // Make an AJAX request to the PHP script
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "http://localhost/Elias/client/Elias/extensionControllers/getEmail.php", true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = xhr.responseText; // The response is the email string
      var emailInput = document.getElementById("email");
      emailInput.value = response.replace(/"/g, '');
    }else{
      var useEmailLink = document.getElementById("useEmailLink");
      useEmailLink.disabled = true;
      useEmailLink.style.pointerEvents = "none";
      useEmailLink.style.color = "gray";
    }
  };
  xhr.send();
});



document.addEventListener('DOMContentLoaded', function() {

// Get references to the HTML elements
  const usernameInput = document.getElementById("username");
  const usernameButton = document.getElementById("usernameBtn");
  // Get the email input field and the "Generate" button
  const emailField = document.getElementById("email");
  const aliasBtn = document.getElementById("emailBtn");
  const display = document.querySelector("#password-input");
  let button = document.querySelector("#passwordBtn");
  const phoneNumberDisplay = document.querySelector("#phone");
  const phoneNumberBtn = document.querySelector("#phoneBtn");
  const firstNameDisplay = document.querySelector("#firstname");
  let firstNameBtn = document.querySelector("#firstnameBtn");
  const middleNameDisplay = document.querySelector("#middlename");
  const middleNameBtn = document.querySelector("#middlenameBtn");
  const lastNameDisplay = document.querySelector("#lastname");
  const lastNameBtn = document.querySelector("#lastnameBtn");
  const birthdateDisplay = document.querySelector("#birthdate");
  const birthdateBtn = document.querySelector("#birthdateBtn");
  const addressDisplay = document.querySelector("#address");
  const addressBtn = document.querySelector("#addressBtn");

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
      saveDataToBackground(
        { 
          username: username, 
          email: emailField.value, 
          password: display.value,
          phone: phoneNumberDisplay.value,
          firstname: firstNameDisplay.value,
          middlename: middleNameDisplay.value,
          lastname: lastNameDisplay.value,
          birthdate: birthdateDisplay.value,
          address: addressDisplay.value 
        });
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



// Add a click event listener to the "Generate" button
  if (aliasBtn) {
    aliasBtn.addEventListener("click", function() {
      emailField.value = generateRandomEmail();
       saveDataToBackground(
        { 
          username: usernameInput.value, 
          email: emailField.value, 
          password: display.value,
          phone: phoneNumberDisplay.value,
          firstname: firstNameDisplay.value,
          middlename: middleNameDisplay.value,
          lastname: lastNameDisplay.value,
          birthdate: birthdateDisplay.value,
          address: addressDisplay.value 
        });
    });
  }



// password generate
  // const display = document.querySelector("#password-input");
  // let button = document.querySelector("#passwordBtn");
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
      saveDataToBackground(
        { 
          username: usernameInput.value, 
          email: emailField.value, 
          password: display.value,
          phone: phoneNumberDisplay.value,
          firstname: firstNameDisplay.value,
          middlename: middleNameDisplay.value,
          lastname: lastNameDisplay.value,
          birthdate: birthdateDisplay.value,
          address: addressDisplay.value 
        });
    }
  }







// firstname generate 

  // const firstNameDisplay = document.querySelector("#firstname");
  // let firstNameBtn = document.querySelector("#firstnameBtn");

  if (firstNameBtn !== null) {
    firstNameBtn.addEventListener("click", () => {
      fetch("resource/firstnames.txt")
      .then(response => response.text())
      .then(text => {
        const firstNames = text.trim().split("\n");
        const randomIndex = Math.floor(Math.random() * firstNames.length);
        const randomFirstName = firstNames[randomIndex];
        firstNameDisplay.value = randomFirstName;
        saveDataToBackground(
        { 
          username: usernameInput.value, 
          email: emailField.value, 
          password: display.value,
          phone: phoneNumberDisplay.value,
          firstname: firstNameDisplay.value,
          middlename: middleNameDisplay.value,
          lastname: lastNameDisplay.value,
          birthdate: birthdateDisplay.value,
          address: addressDisplay.value 
        });
      });
    });
  }


// middlename generate 
  // const middleNameDisplay = document.querySelector("#middlename");
  // const middleNameBtn = document.querySelector("#middlenameBtn");

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
       saveDataToBackground(
        { 
          username: usernameInput.value, 
          email: emailField.value, 
          password: display.value,
          phone: phoneNumberDisplay.value,
          firstname: firstNameDisplay.value,
          middlename: middleNameDisplay.value,
          lastname: lastNameDisplay.value,
          birthdate: birthdateDisplay.value,
          address: addressDisplay.value 
        });
      });
    });
  }



// lastname generate 
  // const lastNameDisplay = document.querySelector("#lastname");
  // const lastNameBtn = document.querySelector("#lastnameBtn");

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
         saveDataToBackground(
        { 
          username: usernameInput.value, 
          email: emailField.value, 
          password: display.value,
          phone: phoneNumberDisplay.value,
          firstname: firstNameDisplay.value,
          middlename: middleNameDisplay.value,
          lastname: lastNameDisplay.value,
          birthdate: birthdateDisplay.value,
          address: addressDisplay.value 
        });
        });
    });
  }


//birthdate generate 

  // const birthdateDisplay = document.querySelector("#birthdate");
  // const birthdateBtn = document.querySelector("#birthdateBtn");

  if (birthdateBtn !== null) {
    birthdateBtn.addEventListener("click", () => {
      const randomYear = Math.floor(Math.random() * (2003 - 1923)) + 1922;
      const randomMonth = Math.floor(Math.random() * 12) + 1;
      const randomDay = Math.floor(Math.random() * 31) + 1;

      const birthdate = new Date(randomYear, randomMonth, randomDay);
      const dateString = birthdate.toISOString().slice(0, 10);

      birthdateDisplay.value = dateString;
      saveDataToBackground(
        { 
          username: usernameInput.value, 
          email: emailField.value, 
          password: display.value,
          phone: phoneNumberDisplay.value,
          firstname: firstNameDisplay.value,
          middlename: middleNameDisplay.value,
          lastname: lastNameDisplay.value,
          birthdate: birthdateDisplay.value,
          address: addressDisplay.value 
        });
    });
  }


//address generate

  // const addressDisplay = document.querySelector("#address");
  // const addressBtn = document.querySelector("#addressBtn");

  if (addressBtn !== null) {
    addressBtn.addEventListener("click", () => {
      fetch('https://fakerapi.it/api/v1/addresses')
      .then(response => response.json())
      .then(data => {
        const address = data.data[0];
        const randomAddress = ` ${address.city}, ${address.country}`;
        addressDisplay.value = randomAddress;
        saveDataToBackground(
        { 
          username: usernameInput.value, 
          email: emailField.value, 
          password: display.value,
          phone: phoneNumberDisplay.value,
          firstname: firstNameDisplay.value,
          middlename: middleNameDisplay.value,
          lastname: lastNameDisplay.value,
          birthdate: birthdateDisplay.value,
          address: addressDisplay.value 
        });
      });
    });
  }

//phone number generate 

  // const phoneNumberDisplay = document.querySelector("#phone");
  // const phoneNumberBtn = document.querySelector("#phoneBtn");

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
      saveDataToBackground(
        { 
          username: usernameInput.value, 
          email: emailField.value, 
          password: display.value,
          phone: phoneNumberDisplay.value,
          firstname: firstNameDisplay.value,
          middlename: middleNameDisplay.value,
          lastname: lastNameDisplay.value,
          birthdate: birthdateDisplay.value,
          address: addressDisplay.value 
        });
    });
  }


// Function to send a message to the background script
  function sendMessageToBackground(message, callback) {
    console.log('Sending message to background script:', message);
    chrome.runtime.sendMessage(message, function(response) {
        console.log('Received response from background script:', response);
        callback(response);
      
    });
  }

  // Function to update the input fields with data
  function updateInputFields(data) {
    console.log('Updating input fields with data:', data);
    usernameInput.value = data.username;
    emailField.value = data.email;
    display.value = data.password;
    phoneNumberDisplay.value = data.phone;
    firstNameDisplay.value = data.firstname;
    middleNameDisplay.value = data.middlename;
    lastNameDisplay.value = data.lastname;
    birthdateDisplay.value = data.birthdate;
    addressDisplay.value = data.address;
    // Update other input fields
  }

  // Function to retrieve data from the background script
  function retrieveDataFromBackground(callback) {
    sendMessageToBackground({ action: 'retrieveData' }, callback);
  }

  // Function to save data to the background script
  function saveDataToBackground(data) {
    sendMessageToBackground({ action: 'saveData', data: data }, function(response) {
      
    });
  }

  // Function to handle input changes
  function handleInputChange() {
    var username = usernameInput.value;
    var email = emailField.value;
    var password = display.value;
    var phone = phoneNumberDisplay.value;
    var firstname = firstNameDisplay.value;
    var middlename = middleNameDisplay.value;
    var lastname = lastNameDisplay.value;
    var birthdate = birthdateDisplay.value;
    var address = addressDisplay.value;
    var data = {
      username: username,
      email: email,
      password: password,
      phone: phone,
      firstname: firstname,
      middlename: middlename,
      lastname: lastname,
      birthdate: birthdate,
      address: address,
      // Other data fields
    };
    saveDataToBackground(data);
  }

  // Add input event listeners to the input fields
  usernameInput.addEventListener('input', handleInputChange);
  emailField.addEventListener('input', handleInputChange);
  display.addEventListener('input', handleInputChange);
  phoneNumberDisplay.addEventListener('input', handleInputChange);
  firstNameDisplay.addEventListener('input', handleInputChange);
  middleNameDisplay.addEventListener('input', handleInputChange);
  lastNameDisplay.addEventListener('input', handleInputChange);
  birthdateDisplay.addEventListener('input', handleInputChange);
  addressDisplay.addEventListener('input', handleInputChange);


  // Retrieve data from the background script and update the input fields
  retrieveDataFromBackground(function(data) {
    if (data) {
      updateInputFields(data);
    }
  });


  // refresh the input fields

// Get a reference to the refresh button
const refreshBtn = document.getElementById("refreshBtn");

// Function to clear all input fields
function clearInputFields() {
  usernameInput.value = "";
  emailField.value = "";
  display.value = "";
  phoneNumberDisplay.value = "";
  firstNameDisplay.value = "";
  middleNameDisplay.value = "";
  lastNameDisplay.value = "";
  birthdateDisplay.value = "";
  addressDisplay.value = "";

  // Update the background script with the cleared data
  saveDataToBackground({
    username: "",
    email: "",
    password: "",
    phone: "",
    firstname: "",
    middlename: "",
    lastname: "",
    birthdate: "",
    address: ""
    // Other data fields
  });
}

// Add a click event listener to the refresh button
refreshBtn.addEventListener("click", clearInputFields);



//generate all fields 

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


}); // end of document.addEventListener for generate functions.


// get current tab url 

chrome.tabs.query({active: true, currentWindow: true}, function(tabs) {
  var currentTab = tabs[0];
  var currentUrl = currentTab.url;
  document.getElementById("url").value = currentUrl;
});





//submit the data to save.php
$(document).ready(function() {
  var notificationVisible = false; // Variable to track if the notification is currently visible

  function showNotification(message) {
    var notificationBanner = document.getElementById('notification-banner');
    var notificationMessage = document.getElementById('notification-message');
    notificationMessage.textContent = message;
    notificationBanner.style.display = 'block';
    notificationVisible = true;
  }

  function closeNotification() {
    var notificationBanner = document.getElementById('notification-banner');
    notificationBanner.style.display = 'none';
    notificationVisible = false;
  }

  // Attach event listener to close button
  $('.close').click(function() {
    closeNotification();
  });

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

    if (!username || !email || !pwd || !firstname || !middlename || !lastname || !birthdate || !address || !url) {
      showNotification('Please fill all the required fields');
    } else {
      // submit the data
      $.ajax({
        type: "POST",
        url: "http://localhost/Elias/client/Elias/extensionControllers/aliasingController.php",
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
        dataType: "json",
        success: function(response) {
          if (response.result === 'success') {
            if (!notificationVisible) {
              showNotification('You have successfully created an alias!');
            }
          } 
          if (response.result === 'error') {
            if (!notificationVisible) {
              showNotification('There is an error');
            }
          }
          if (response.result === 'login first') {
            if (!notificationVisible) {
              showNotification('Please log in first before creating an alias');
            }
          }
          console.log(username, email, pwd, firstname, middlename, lastname, birthdate, address, url);
        },
        error: function(xhr, status, error) {
          if (!notificationVisible) {
            showNotification('An error occurred, try refreshing.');
          }
          console.log(error);
        }
      });
    }
  });
});




//autofill

$(document).ready(function(){
  $("#autofill").click(function(){
    var data = {
      username: $("#username").val(),
      email: $("#email").val(),
      phone: $("#phone").val(),
      pwd: $("#password-input").val(),
      firstname: $("#firstname").val(),
      middlename: $("#middlename").val(),
      lastname: $("#lastname").val(),
      birthdate: $("#birthdate").val(),
      address: $("#address").val(),
      url: $("#url").val()
    };

    console.log("Sending message to content script with data:", data);

// Send the data to the content script
    chrome.tabs.query({active: true, currentWindow: true}, function(tabs){
      chrome.tabs.sendMessage(tabs[0].id, {type: "autofill", data: data}, function(response){
        console.log(response);
      });
    });
  });
});










