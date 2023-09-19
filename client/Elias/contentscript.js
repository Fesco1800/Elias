  chrome.runtime.onMessage.addListener(function(request, sender, sendResponse){
    if(request.type === "autofill"){
      // Get the list of input fields on the current tab
      var inputFields = document.getElementsByTagName('input');

      // Loop through the input fields and fill the ones that match the available data
      for(var i=0; i<inputFields.length; i++){
        var fieldName = inputFields[i].name || inputFields[i].id;
        if (fieldName) {
          if (fieldName === 'name' || fieldName === 'full_name' || (fieldName.match(/name/i) && !fieldName.match(/first|user|middle|last/i))) {
            // Fill in the name field with firstname + lastname
            var nameValue = request.data.firstname + ' ' + request.data.lastname;
            inputFields[i].value = nameValue;
          }
          else if (fieldName === 'first_name' || fieldName.match(/^(?=.*?(?:first\s*name|fname)).*$/i)) {
            // Fill in the firstname field with firstname
            inputFields[i].value = request.data.firstname;
          }
          else if (fieldName === 'last_name' || fieldName.match(/^(?=.*?(?:last\s*name|lname)).*$/i)) {
            // Fill in the lastname field with lastname
            inputFields[i].value = request.data.lastname;
          }
          else if (fieldName.match(/^(?=.*?(?:middle\s*name|mname)).*$/i)) {
            // Fill in the middlename field with middlename
            inputFields[i].value = request.data.middlename;
          }
          else if (inputFields[i].type == "text" && fieldName.match(/^(?=.*?(?:username|user_name|u|user-name|user\s*name)).*$/i)) {
            // Fill in the username field with username
            if (fieldName.includes('email') || fieldName.includes('Email')){
              inputFields[i].value = request.data.email;
            }else{
              inputFields[i].value = request.data.username;
            }
            
            
          }
          else if (inputFields[i].type == "email" || fieldName.match(/^(?=.*?(?:email|mail)).*$/i)) {
            // Fill in the email field with the email
            inputFields[i].value = request.data.email;
          }
          
          else if (inputFields[i].type == "password" || fieldName.match(/^(?=.*?(?:password|pass|pword|pwd)).*$/i)) {
            // Fill in the password field with the password
            inputFields[i].value = request.data.pwd;
          }
          else if (fieldName.match(/^(?=.*?(?:address|addr|add|street|city|state|zip|postal|country)).*$/i)) {
            // Fill in the address field with address
            inputFields[i].value = request.data.address;
          }
          else if (fieldName.match(/^(?=.*?(?:birth\s*date|birthdate|dob)).*$/i)) {
            // Fill in the birthdate field with birthdate
            inputFields[i].value = request.data.birthdate;
          }
          else if (fieldName.match(/^(?=.*?(?:telephone|phone|mobile|cel|tel|contact)).*$/i)) {
            // Fill in the telephone field with telephone
            inputFields[i].value = request.data.phone;
          }
        }
      }

      sendResponse({success: true});
    }
  });
