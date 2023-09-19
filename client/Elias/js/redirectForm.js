  var passwordInput = document.getElementById("re-password-input");
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

// Get the URL parameters
const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');
const username = urlParams.get('username');
const email = urlParams.get('email');
const phone = urlParams.get('phone');
const password = urlParams.get('password');
const url = urlParams.get('url');
const firstname = urlParams.get('firstname');
const middlename = urlParams.get('middlename');
const lastname = urlParams.get('lastname');
const birthdate = urlParams.get('birthdate');
const address = urlParams.get('address');

//get the host 

const origurl = url; // Replace with your URL variable or value
let host = "";

try {
  const urlWithProtocol = (origurl.startsWith("http://") || origurl.startsWith("https://")) ? origurl : `https://${origurl}`;
  const urlObject = new URL(urlWithProtocol);
  host = urlObject.host;
} catch (error) {
  console.error("Invalid URL:", error);
}

console.log('ID:', id);
console.log('Username:', username);
console.log('URL: ', host);
console.log('Phone: ', phone);

// Set the values of the form fields
const title = document.getElementById('title');

 
const reUsernameInput = document.getElementById('re-username');
const reEmailInput = document.getElementById('re-email');
const rePhoneInput = document.getElementById('re-phone');
const rePasswordInput = document.getElementById('re-password-input');
const reFirstnameInput = document.getElementById('re-firstname');
const reMiddlenameInput = document.getElementById('re-middlename');
const reLastnameInput = document.getElementById('re-lastname');
const reBirthdateInput = document.getElementById('re-birthdate');
const reAddressInput = document.getElementById('re-address');
const reUrlInput = document.getElementById('re-url');




console.log('reUsernameInput:', reUsernameInput);

if (reUsernameInput) {
  title.textContent = host;
  reUsernameInput.value = username;
  reEmailInput.value = email;
  rePhoneInput.value = phone;
  rePasswordInput.value = password;
  reFirstnameInput.value = firstname;
  reMiddlenameInput.value = middlename;
  reLastnameInput.value = lastname;
  reBirthdateInput.value = birthdate;
  reAddressInput.value = address;
  reUrlInput.value = url;
} else {
  console.log('reUsernameInput not found');
}


//to autofill

$(document).ready(function(){
	console.log('to autofill');
$("#re-autofill").click(function(){
  var data = {
    username: $("#re-username").val(),
    email: $("#re-email").val(),
    phone: $("#re-phone").val(),
    pwd: $("#re-password-input").val(),
    firstname: $("#re-firstname").val(),
    middlename: $("#re-middlename").val(),
    lastname: $("#re-lastname").val(),
    birthdate: $("#re-birthdate").val(),
    address: $("#re-address").val(),
    url: $("#re-url").val()
  };

  console.log("Sending message to content script with data:", data);

  // Send the data to the content script
  chrome.tabs.query({active: true, currentWindow: true}, function(tabs){
    chrome.tabs.sendMessage(tabs[0].id, {type: "re-autofill", data: data}, function(response){
      console.log(response);
    });
  });
});
});