//username generate
// Get references to the HTML elements
const usernameInput = document.getElementById("username");
const usernameButton = document.getElementById("usernameBtn");

// Function to generate a random username
function generateUsername() {
  // Load the words file using fetch()
  fetch('resource/words.txt')
    .then(response => response.text())
    .then(text => {
      // Split the text into an array of words
      const words = text.split('\n');
      
      // Choose two random words
      const word1 = words[Math.floor(Math.random() * words.length)];
      const word2 = words[Math.floor(Math.random() * words.length)];

      // Generate a random number between 10000 and 99999
      const number = Math.floor(Math.random() * 90000) + 10000;

      // Combine the words and number into a username
      const username = `${word1}-${word2}${number}`;
      
      // Set the value of the input field
      usernameInput.value = username;
    })
    .catch(error => {
      console.error('Error loading words file:', error);
    });
}

// Add a click event listener to the button
usernameButton.addEventListener("click", generateUsername);




// password generate
const display = document.querySelector("#password-input");
button = document.querySelector("#passwordBtn");
let chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+~`|}{[]:;?><,./-=";
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


// firstname generate 

const firstNameDisplay = document.querySelector("#firstname");
const firstNameBtn = document.querySelector("#firstnameBtn");

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

// middlename generate 
const middleNameDisplay = document.querySelector("#middlename");
const middleNameBtn = document.querySelector("#middlenameBtn");

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

// lastname generate 
const lastNameDisplay = document.querySelector("#lastname");
const lastNameBtn = document.querySelector("#lastnameBtn");

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

//birthdate generate 

const birthdateDisplay = document.querySelector("#birthdate");
const birthdateBtn = document.querySelector("#birthdateBtn");

birthdateBtn.addEventListener("click", () => {
  const randomYear = Math.floor(Math.random() * (2003 - 1922)) + 1922;
  const randomMonth = Math.floor(Math.random() * 12) + 1;
  const randomDay = Math.floor(Math.random() * 31) + 1;

  const birthdate = new Date(randomYear, randomMonth, randomDay);
  const dateString = birthdate.toISOString().slice(0, 10);
  
  birthdateDisplay.value = dateString;
});

//address generate

const addressDisplay = document.querySelector("#address");
const addressBtn = document.querySelector("#addressBtn");

addressBtn.addEventListener("click", () => {
  fetch('https://fakerapi.it/api/v1/addresses')
    .then(response => response.json())
    .then(data => {
      const address = data.data[0];
      const randomAddress = ` ${address.city}, ${address.country}`;
      addressDisplay.value = randomAddress;
    });
});
