$(document).ready(function() {

  // Function to show the notification banner with the specified message
  function showNotification(message) {
    var notificationBanner = document.getElementById('notification-banner');
    var notificationMessage = document.getElementById('notification-message');
    notificationMessage.textContent = message;
    notificationBanner.style.display = 'block';
  }
  // Fetch data from get-aliases.php file
  $.ajax({
    url: 'http://localhost/Elias/client/Elias/extensionControllers/getAliases.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      let aliasCards = document.getElementById('alias-cards');
      // Check if there are any aliases
      if (data.length === 0) {
        let message = document.createElement('p');
        message.classList.add('text-center');
        message.innerText = 'No aliases available.';
        aliasCards.appendChild(message);
      } else {
        // Create a new card column for every two aliases
        let cardsPerRow = 2;
        for (let i = 0; i < data.length; i += cardsPerRow) {
          let cardCol = document.createElement('div');
          cardCol.classList.add('card-col');
          aliasCards.appendChild(cardCol);
          // Add two aliases to the current card column
          for (let j = i; j < i + cardsPerRow && j < data.length; j++) {
            let alias = data[j];
            let card = document.createElement('div');
            card.classList.add('card');
            card.dataset.id = alias.id;
            card.dataset.url = alias.url;
            card.dataset.password = alias.password;
            card.dataset.email = alias.email;
            card.dataset.phone = alias.phone;
            card.dataset.username = alias.username;
            card.dataset.firstname = alias.firstname;
            card.dataset.middlename = alias.middlename;
            card.dataset.lastname = alias.lastname;
            card.dataset.birthdate = alias.birthdate;
            card.dataset.address = alias.address;
            card.addEventListener('click', function() {
              // Get the data from the clicked card
              const id = this.dataset.id;
              const username = this.dataset.username;
              const url = this.dataset.url;
              const password = this.dataset.password;
              const email = this.dataset.email;
              const phone = this.dataset.phone;
              const firstname = this.dataset.firstname;
              const middlename = this.dataset.middlename;
              const lastname  = this.dataset.lastname;
              const birthdate = this.dataset.birthdate;
              const address = this.dataset.address;

              // Redirect to form page and pass the data as URL parameters
              window.location.href = 'redirectForm.html?id=' + id + '&username=' + encodeURIComponent(username) + '&url=' + encodeURIComponent(url) + '&password=' + encodeURIComponent(password) + '&email=' + encodeURIComponent(email) + '&phone=' + encodeURIComponent(phone) + '&firstname=' + encodeURIComponent(firstname) + '&middlename=' + encodeURIComponent(middlename) + '&lastname=' + encodeURIComponent(lastname) + '&birthdate=' + encodeURIComponent(birthdate) + '&address=' + encodeURIComponent(address);

            });
            let cardBody = document.createElement('div');
            cardBody.classList.add('card-body');
            let cardTitle = document.createElement('div');
            cardTitle.classList.add('aclass');
            cardTitle.style.backgroundColor = '#161b22';
            cardTitle.style.border = 'none';
            let logo = document.createElement('img');
            logo.style.width = '20px';
            logo.style.height = '20px';
            logo.src = `https://logo.clearbit.com/${alias.url}`;
            logo.onerror = function() {
              // Set default image if the logo is not found
              logo.src = 'logos/defaultweb.png';
            };
            cardTitle.appendChild(logo);
            
            let linkInfo = document.createElement('p');
            linkInfo.classList.add('card-text', 'mb-0');
            linkInfo.style.marginLeft = '10px';

            // Get the host
            const origurl = alias.url; // Replace with your URL variable or value
            let host = "";

            try {
              const urlWithProtocol = (origurl.startsWith("http://") || origurl.startsWith("https://")) ? origurl : `https://${origurl}`;
              const urlObject = new URL(urlWithProtocol);
              host = urlObject.host;
            } catch (error) {
              console.error("Invalid URL:", error);
            }

            linkInfo.innerText = host;
            cardTitle.appendChild(linkInfo);

            
            let arrowIcon = document.createElement('a');
            arrowIcon.href = '#';
            arrowIcon.classList.add('btn', 'btn-primary');
            arrowIcon.style.backgroundColor = '#6f42c1';
            arrowIcon.style.border = '1px solid #6f42c1';
            let arrowIconIcon = document.createElement('i');
            arrowIconIcon.classList.add('bi', 'bi-box-arrow-up-right');
            arrowIcon.appendChild(arrowIconIcon);
            cardTitle.appendChild(arrowIcon);
            
            cardBody.appendChild(cardTitle);
            card.appendChild(cardBody);
            cardCol.appendChild(card);
          }
        }
      }
    },



    error: function(jqXHR, textStatus, errorThrown) {
      console.log(errorThrown);
      showNotification('Error: Please login first!');
    }
  });
});







