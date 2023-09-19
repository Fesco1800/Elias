<?php

define('TITLE', "Home");
include '../assets/layouts/header.php';
include '../client/controllers/aliasesManagerController.php';
check_verified();

$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);
?>

<head>
    <style>
        .form-control {
            background: #0d1117 !important;
            color: #e6edf3 !important;
            padding-left: 2px;
            border-radius: 2px;
        }
        input[readonly] {
          cursor: not-allowed;
          color: #888888 !important;
        }

        .saveBtn:hover {
            background: rgba(128, 0, 128, 0.75) !important;
        }

         .not-matching {
            font-weight: bold;
            
          }
          
          .old-value.not-matching  {
            background: rgba(255, 0, 0, 0.25);
           
          }
          
          .new-value.not-matching  {
            background: rgba(0, 128, 0, 0.25);
            
          }

    </style>
</head>

<main role="main" class="container col-12" >
    <div class="row">
        <div class="col-sm-12">
           
            <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-purple rounded box-shadow">
                <!-- <img class="mr-3" src="../assets/uploads/users/<?php echo $_SESSION['profile_image']; ?>" alt="" width="48" height="48" style=" border-radius: 50%; "> -->

                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">Hey there, <?php echo $_SESSION['username']; ?></h6>
                    <small>Last logged in at <?php echo date("m-d-Y h:i a", strtotime($_SESSION['last_login_at'])); ?></small>
                </div>
            </div>


            <div class="my-3 p-3 rounded box-shadow" style="background: #161b22; border: 1px solid #21262d;">
                <h4 class="mb-0" style="color: #fff; display: inline-block;"><i class="bi bi-card-list"></i> Your Aliases: </h4>
                <button type="button" class="btn btn-secondary" id="gotobtn"> <a href="aliasing.php" style="color: #fff; text-decoration: none;">
                    Generate Aliases <i class="bi bi-arrow-right"></i>    
                </a> 
                </button>
                <br><br><br>
                <div id="modalMessage" class="alert <?php echo !empty($message) ? ($message === "Alias updated successfully." ? 'alert-success' : ($message === "You have successfully deleted an alias" ? 'alert-success' : 'alert-danger')) : 'alert-warning'; ?>" role="alert" style="<?php echo !empty($message) ? 'display: block;' : 'display: none;'; ?>">
                    <?php
                    if (!empty($message)) {
                        if ($message === "Alias updated successfully." || $message === "You have successfully deleted an alias") {
                            echo $message;
                        } else {
                            echo $message;
                        }
                    } else {
                        echo "There is nothing to update.";
                    }
                    ?>
                </div>

                    <div class="">
                    <table id="aliasTable" class="table table-responsive table-sm table-striped table-dark table-hover" style="font-size: 11px;">
                        <thead>
                            <tr >
                                <th style="display: none;">Id </th>
                                <th style="display: none;">User ID</th>
                                
                                <th></th>
                                <th></th>
                                <th></th> 
                                <th>URL</th>
                                <th>Username</th>
                                <th style="padding-right: 120px;">Password</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Lastname</th>   
                                <th>Birthdate</th> 
                                <th>Address</th> 
                                <th>created</th>
                                  
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (!empty($aliases)) {
                                foreach ($aliases as $alias) : ?>
                                <tr>
                                    <td style="display: none;"><?= $alias['id']; ?></td>  
                                    <td style="display: none;"><?= $alias['user_id']; ?></td>
                                    
                                    <td> 
                                        <a 
                                        href="#" data-toggle="modal" data-target="#editModal<?= $alias['id']; ?>">
                                        <i class="bi bi-wrench" id="editDeleteIcon"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="controllers/delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this alias?')">
                                            <input type="hidden" name="alias_id" value="<?= $alias['id']; ?>">
                                            <button type="submit" class="delete-button" name="delete_alias" style="background: none; border: none;">
                                                <i class="bi bi-trash text-danger" id="editDeleteIcon"></i>
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                      <a href="#" class="history" data-toggle="modal" data-target="#historyModal" data-id="<?= $alias['id']; ?>">
                                        <i class="bi bi-clock-history" id="editDeleteIcon"></i>
                                      </a>


                                    </td>


                                    <td > 
                                      <a href="<?= $alias['url'] ?>" target="_blank"> <?= $alias['domain'] ?> </a>
                                    </td>
                                    <td ><?= $alias['username']; ?></td>
                                    <td class="password-field custom-width" >
                                      <div style=" display: flex; align-items: center;">
                                        <input type="password" value="<?= $alias['password'] ?>" class="form-control password-input" style="font-size: 12px; flex: 1;" readonly>
                                        <button class="btn btn-small" onclick="togglePassword1(this)" style="font-size: 9px; background: #6f42c1; color: #fff; margin-left: 5px;">
                                          <i class="bi bi-eye"></i>
                                        </button>
                                      </div>
                                      <script>
                                        function togglePassword1(button) {
                                          var td = button.parentNode;
                                          var passwordInput = td.querySelector(".password-input");

                                          if (passwordInput.type === "password") {
                                            passwordInput.type = "text";
                                            button.innerHTML = '<i class="bi bi-eye-slash"></i>';
                                          } else {
                                            passwordInput.type = "password";
                                            button.innerHTML = '<i class="bi bi-eye"></i>';
                                          }
                                        }
                                      </script>
                                    </td>
                                    <td ><?= $alias['email']; ?></td>
                                    <td ><?= $alias['phone']; ?></td>
                                    <td ><?= $alias['firstname']; ?></td>
                                    <td ><?= $alias['middlename']; ?></td>
                                    <td ><?= $alias['lastname']; ?></td>
                                    <td ><?= $alias['birthdate']; ?></td>
                                    <td ><?= $alias['address']; ?></td>
                                    <td ><?= $alias['created_at']; ?></td>
                                    
                                </tr>

                                <!-- //edit modal -->
                                <div class="modal fade" id="editModal<?= $alias['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog" role="document" >
                                      <div class="modal-content" style="background-color: #161b22; color: white;">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="editModalLabel"><i class="bi bi-pencil"></i> Edit your alias</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                           
                                          <form id="editForm1" method="POST" action="controllers/edit.php">
                                            <input type="hidden" name="alias_id" value="<?= $alias['id']; ?>">
                                            <!-- Editable input fields -->
                                            
                                            <div class="form-group">
                                              <label for="username<?= $alias['id']; ?>">Username</label>
                                              <input type="text" class="form-control" id="username<?= $alias['id']; ?>" name="username" value="<?= $alias['username']; ?>">
                                            </div>
                                            <div class="form-group">
                                              <label for="password<?= $alias['id']; ?>">Password</label>
                                              <div class="input-group">
                                                <input type="password" class="form-control password-field" id="password<?= $alias['id']; ?>" name="password" value="<?= $alias['password']; ?>" >
                                                <div class="input-group-append">
                                                  <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordFieldVisibility(this)" style="border: 2.5px solid; ">
                                                    <i class="bi bi-eye" style="color: #e6edf3;"></i>
                                                  </button>
                                                </div>
                                              </div>
                                              <script>
                                                  function togglePasswordFieldVisibility(button) {
                                                    var passwordField = button.parentElement.previousElementSibling;
                                                    var isPasswordFieldVisible = passwordField.getAttribute('type') === 'text';

                                                    if (isPasswordFieldVisible) {
                                                      passwordField.setAttribute('type', 'password');
                                                      button.innerHTML = '<i class="bi bi-eye"></i>';
                                                    } else {
                                                      passwordField.setAttribute('type', 'text');
                                                      button.innerHTML = '<i class="bi bi-eye-slash"></i>';
                                                    }
                                                  }
                                              </script>
                                            </div>
                                            <div class="form-group">
                                              <label for="email<?= $alias['id']; ?>">Email</label>
                                              <input type="text" class="form-control" id="email<?= $alias['id']; ?>" name="email" value="<?= $alias['email']; ?>">
                                            </div>
                                            
                                            <div class="form-group">
                                              <label for="username<?= $alias['id']; ?>">Phone</label>
                                              <input type="text" class="form-control" id="phone<?= $alias['id']; ?>" name="phone" value="<?= $alias['phone']; ?>">
                                            </div>
                                            <div class="form-group">
                                              <label for="firstname<?= $alias['id']; ?>">Firstname</label>
                                              <input type="text" class="form-control" id="firstname<?= $alias['id']; ?>" name="firstname" value="<?= $alias['firstname']; ?>">
                                            </div>
                                            <div class="form-group">
                                              <label for="middlename<?= $alias['id']; ?>">Middlename</label>
                                              <input type="text" class="form-control" id="middlename<?= $alias['id']; ?>" name="middlename" value="<?= $alias['middlename']; ?>">
                                            </div>
                                            <div class="form-group">
                                              <label for="lastname<?= $alias['id']; ?>">Lastname</label>
                                              <input type="text" class="form-control" id="lastname<?= $alias['id']; ?>" name="lastname" value="<?= $alias['lastname']; ?>">
                                            </div>
                                            <div class="form-group">
                                              <label for="birthdate<?= $alias['id']; ?>">Birthdate</label>
                                              <input type="date" class="form-control custom-date-input" id="birthdate<?= $alias['id']; ?>" name="birthdate" value="<?= $alias['birthdate']; ?>">
                                            </div>
                                            <div class="form-group">
                                              <label for="address<?= $alias['id']; ?>">Address</label>
                                              <input type="text" class="form-control" id="address<?= $alias['id']; ?>" name="address" value="<?= $alias['address']; ?>">
                                            </div>
                                            <div class="form-group">
                                              <label for="url<?= $alias['id']; ?>">Url</label>
                                              <input type="url" class="form-control" id="url<?= $alias['id']; ?>" name="url" value="<?= $alias['url']; ?>" readonly>
                                            </div>

                                            
                                            <!-- Add more input fields for other columns as needed -->
                                            <button type="submit" class="btn btn-primary saveBtn" style="background: #6f42c1; border: #6f42c1;">Save</button>
                                          </form>
                                          
                                          <script>
                                            $(document).ready(function() {
                                            //     // Edit form submission
                                            //     $('#editForm1').submit(function(event) {
                                            //         event.preventDefault(); // Prevent the form from submitting normally

                                            //         $.ajax({
                                            //             url: 'controllers/edit.php',
                                            //             type: 'POST',
                                            //             data: $(this).serialize(),
                                            //             dataType: 'json',
                                            //             async: true
                                            //                                                                 });
                                            //     });


                                                // // Delete link click event
                                                // $('.delete-link').click(function() {
                                                //     var aliasId = $(this).data('id');

                                                //     // Store a reference to the current delete link element
                                                //     var deleteLink = $(this);

                                                //     // Send AJAX request to delete.php with the alias ID
                                                //     $.ajax({
                                                //         url: 'controllers/delete.php',
                                                //         type: 'POST',
                                                //         data: { alias_id: aliasId },
                                                //         dataType: 'json',
                                                //         async: true
                                                //         // Add success/error handling as needed
                                                //     });
                                                // });



                                            });
                                            </script>
                                            

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  

                            <?php endforeach; ?>
                           <?php } ?> 
                            
                        </tbody>
                    </table>

                    <!-- //history -->
                                 <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true" style="width: 100%;">
                                    <div class="modal-dialog modal-xl" style="max-width: 100%; z-index: 2;" >
                                        <div class="modal-content" style="background-color: #28282b; color: white;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="historyModalLabel"><i class="bi bi-clock-history"></i> History <small style="font-size: 12px;"> (The highlighted columns indicate the fields that have been updated)</small></h5>  
                                            </div>
                                            <div class="modal-body" style="width: 100%; padding: 0;">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg" style="max-height: 80vh; width: 100%; padding: 0;">
                                                            <div class="table-responsive table-sm" >
                                                                <table id="historyTable" class="table" style="font-size: 10px;  ">
                                                                <thead>
                                                                    <tr >
                                                                         <th style="display: none;">History ID</th>
                                                                          <th style="display: none;">Edited By</th>
                                                                          <th style="font-weight: normal;">Edit Timestamp</th>
                                                                          <!-- <th>Old URL</th> -->
                                                                          <th style="display: none; font-weight: normal;">URL</th>
                                                                          <th class="usernameOldTh" style=" font-weight: normal;">Old Username</th>
                                                                          <th class="usernameNewTh" style=" font-weight: normal;">New Username</th>
                                                                          <th class="passwordOldTh" style=" font-weight: normal;">Old Password</th>
                                                                          <th class="passwordNewTh" style=" font-weight: normal;">New Password</th>
                                                                          <th class="emailOldTh" style=" font-weight: normal;">Old Email</th>
                                                                          <th class="emailNewTh" style=" font-weight: normal;">New Email</th>
                                                                          <th class="phoneOldTh" style=" font-weight: normal;">Old Phone</th>
                                                                          <th class="phoneNewTh" style=" font-weight: normal;">New Phone</th>
                                                                          <th class="firstnameOldTh" style=" font-weight: normal;">Old Firstname</th>
                                                                          <th class="firstnameNewTh" style=" font-weight: normal;">New Firstname</th>
                                                                          <th class="middlenameOldTh" style=" font-weight: normal;">Old Middlename</th>
                                                                          <th class="middlenameNewTh" style=" font-weight: normal;">New Middlename</th>
                                                                          <th class="lastnameOldTh" style=" font-weight: normal;">Old Lastname</th>
                                                                          <th class="lastnameNewTh" style=" font-weight: normal;">New Lastname</th>
                                                                          <th class="birthdateOldTh" style=" font-weight: normal;">Old Birthdate</th>
                                                                          <th class="birthdateNewTh" style=" font-weight: normal;">New Birthdate</th>
                                                                          <th class="addressOldTh" style=" font-weight: normal;">Old Address</th>
                                                                          <th class="addressNewTh" style=" font-weight: normal;">New Address</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- History records will be dynamically populated here -->
                                                                </tbody>
                                                            </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                               <script>
                                                  $(document).ready(function() {
                                                    // Handler for clicking the history link
                                                    $(".history").click(function(e) {
                                                      e.preventDefault();

                                                      // Get the alias ID from the clicked link
                                                      var aliasId = $(this).data("id");

                                                      // Fetch the history data for the alias ID via AJAX
                                                      $.ajax({
                                                        url: "controllers/history.php", // Change to the URL of your PHP script to fetch history data
                                                        type: "POST",
                                                        data: { alias_id: aliasId },
                                                        dataType: "json",
                                                        async: true,
                                                        success: function(response) {
                                                          // Populate the alias records in the table
                                                          var aliasTableBody = $("#historyTable tbody");
                                                          aliasTableBody.empty();

                                                          if (response.length > 0) {
                                                            $.each(response, function(index, record) {
                                                              var historyId = record.id;
                                                              var editedBy = record.edited_by;
                                                              var editTimestamp = record.edit_timestamp;
                                                              var oldUrl = record.old_url;
                                                              var newUrl = record.new_url;
                                                              var oldUsername = record.old_username;
                                                              var newUsername = record.new_username;
                                                              var oldPassword = record.old_password;
                                                              var newPassword = record.new_password;
                                                              var oldEmail = record.old_email;
                                                              var newEmail = record.new_email;
                                                              var oldPhone = record.old_phone;
                                                              var newPhone = record.new_phone;
                                                              var oldFirstname = record.old_firstname;
                                                              var newFirstname = record.new_firstname;
                                                              var oldMiddlename = record.old_middlename;
                                                              var newMiddlename = record.new_middlename;
                                                              var oldLastname = record.old_lastname;
                                                              var newLastname = record.new_lastname;
                                                              var oldBirthdate = record.old_birthdate;
                                                              var newBirthdate = record.new_birthdate;
                                                              var oldAddress = record.old_address;
                                                              var newAddress = record.new_address;

                                                              // Append a new row to the alias table body
                                                              var newRow = $("<tr></tr>");
                                                              newRow.append("<td style='display: none;'>" + historyId + "</td>");
                                                              newRow.append("<td style='display: none;'>" + editedBy + "</td>");
                                                              newRow.append("<td>" + editTimestamp + "</td>");
                                                              // newRow.append("<td>" + oldUrl + "</td>");
                                                              // newRow.append("<td>" + newUrl + "</td>");

                                                              // Username fields
                                                              

                                                              if (oldUsername !== newUsername) {
                                                                var thElementu = document.querySelector(".usernameOldTh");
                                                                var thElementu1 = document.querySelector(".usernameNewTh");
                                                                thElementu.style.display = "table-cell";
                                                                thElementu1.style.display = "table-cell";

                                                                var oldUsernameCell = $("<td></td>").addClass("old-value");
                                                                var newUsernameCell = $("<td></td>").addClass("new-value");
                                                                oldUsernameCell.addClass("not-matching");
                                                                newUsernameCell.addClass("not-matching");
                                                                oldUsernameCell.text(oldUsername);
                                                                newUsernameCell.text(newUsername);

                                                                newRow.append(oldUsernameCell);
                                                                newRow.append(newUsernameCell);
                                                              } else{
                                                                newRow.append("<td></td>");
                                                                newRow.append("<td></td>");
                                                              }

                                                              

                                                              // Password fields
                                                                

                                                                // Compare old and new password values
                                                                if (oldPassword !== newPassword) {
                                                                  var thElement = document.querySelector(".passwordOldTh");
                                                                  var thElement1 = document.querySelector(".passwordNewTh");
                                                                thElement.style.display = "table-cell";
                                                                thElement1.style.display = "table-cell";

                                                                  var oldPasswordField = $("<td></td>").addClass("old-value password-field");
                                                                var newPasswordField = $("<td></td>").addClass("new-value password-field");

                                                                var oldPasswordHidden = $("<span></span>")
                                                                  .addClass("password-hidden")
                                                                  .text("*".repeat(oldPassword.length));
                                                                var oldPasswordVisible = $("<span></span>")
                                                                  .addClass("password-visible")
                                                                  .hide()
                                                                  .text(oldPassword);

                                                                var newPasswordHidden = $("<span></span>")
                                                                  .addClass("password-hidden")
                                                                  .text("*".repeat(newPassword.length));
                                                                var newPasswordVisible = $("<span></span>")
                                                                  .addClass("password-visible")
                                                                  .hide()
                                                                  .text(newPassword);

                                                                var oldToggleBtn = $("<button></button>")
                                                                  .addClass("btn btn-small")
                                                                  .attr("type", "button")
                                                                  .click(function() {
                                                                    togglePassword(this);
                                                                  })
                                                                  .append('<i class="bi bi-eye"></i>');

                                                                var newToggleBtn = $("<button></button>")
                                                                  .addClass("btn btn-small")
                                                                  .attr("type", "button")
                                                                  .click(function() {
                                                                    togglePassword(this);
                                                                  })
                                                                  .append('<i class="bi bi-eye"></i>');

                                                                oldPasswordField.append(oldPasswordHidden, oldPasswordVisible, oldToggleBtn);
                                                                newPasswordField.append(newPasswordHidden, newPasswordVisible, newToggleBtn);
                                                                  oldPasswordField.addClass("not-matching");
                                                                  newPasswordField.addClass("not-matching");
                                                                  newRow.append(oldPasswordField);
                                                                  newRow.append(newPasswordField);
                                                                } else{
                                                                newRow.append("<td></td>");
                                                                newRow.append("<td></td>");
                                                              }

                                                                


                                                              // Email fields
                                                              

                                                              if (oldEmail !== newEmail) {
                                                                var thElement = document.querySelector(".emailOldTh");
                                                                var thElement1 = document.querySelector(".emailNewTh");
                                                                thElement.style.display = "table-cell";
                                                                thElement1.style.display = "table-cell";
                                                                var oldEmailCell = $("<td></td>").addClass("old-value");
                                                                var newEmailCell = $("<td></td>").addClass("new-value");
                                                                oldEmailCell.addClass("not-matching");
                                                                newEmailCell.addClass("not-matching");
                                                                oldEmailCell.text(oldEmail);
                                                                newEmailCell.text(newEmail);

                                                                newRow.append(oldEmailCell);
                                                                newRow.append(newEmailCell);
                                                              } else{
                                                                newRow.append("<td></td>");
                                                                newRow.append("<td></td>");
                                                              }

                                                              

                                                              // Phone fields
                                                              

                                                              if (oldPhone !== newPhone) {
                                                                var thElement = document.querySelector(".phoneOldTh");
                                                                var thElement1 = document.querySelector(".phoneNewTh");
                                                                thElement.style.display = "table-cell";
                                                                thElement1.style.display = "table-cell";
                                                                var oldPhoneCell = $("<td></td>").addClass("old-value");
                                                                var newPhoneCell = $("<td></td>").addClass("new-value");
                                                                oldPhoneCell.addClass("not-matching");
                                                                newPhoneCell.addClass("not-matching");
                                                                oldPhoneCell.text(oldPhone);
                                                                newPhoneCell.text(newPhone);

                                                                newRow.append(oldPhoneCell);
                                                                newRow.append(newPhoneCell);
                                                              } else{
                                                                newRow.append("<td></td>");
                                                                newRow.append("<td></td>");
                                                              }

                                                              

                                                              // Firstname fields
                                                              

                                                              if (oldFirstname !== newFirstname) {
                                                                var thElement = document.querySelector(".firstnameOldTh");
                                                                var thElement1 = document.querySelector(".firstnameNewTh");
                                                                thElement.style.display = "table-cell";
                                                                thElement1.style.display = "table-cell";
                                                                var oldFirstnameCell = $("<td></td>").addClass("old-value");
                                                                var newFirstnameCell = $("<td></td>").addClass("new-value");
                                                                oldFirstnameCell.addClass("not-matching");
                                                                newFirstnameCell.addClass("not-matching");
                                                                oldFirstnameCell.text(oldFirstname);
                                                                newFirstnameCell.text(newFirstname);

                                                                newRow.append(oldFirstnameCell);
                                                                newRow.append(newFirstnameCell);
                                                              } else{
                                                                newRow.append("<td></td>");
                                                                newRow.append("<td></td>");
                                                              }

                                                              

                                                              // Middlename fields
                                                              

                                                              if (oldMiddlename !== newMiddlename) {
                                                                var thElement = document.querySelector(".middlenameOldTh");
                                                                var thElement1 = document.querySelector(".middlenameNewTh");
                                                                thElement.style.display = "table-cell";
                                                                thElement1.style.display = "table-cell";
                                                                var oldMiddlenameCell = $("<td></td>").addClass("old-value");
                                                               var newMiddlenameCell = $("<td></td>").addClass("new-value");
                                                                oldMiddlenameCell.addClass("not-matching");
                                                                newMiddlenameCell.addClass("not-matching");
                                                                oldMiddlenameCell.text(oldMiddlename);
                                                                newMiddlenameCell.text(newMiddlename);

                                                                newRow.append(oldMiddlenameCell);
                                                                newRow.append(newMiddlenameCell);
                                                              } else{
                                                                newRow.append("<td></td>");
                                                                newRow.append("<td></td>");
                                                              }

                                                              

                                                              // Lastname fields
                                                              

                                                              if (oldLastname !== newLastname) {
                                                                var thElement = document.querySelector(".lastnameOldTh");
                                                                var thElement1 = document.querySelector(".lastnameNewTh");
                                                                thElement.style.display = "table-cell";
                                                                thElement1.style.display = "table-cell";
                                                                var oldLastnameCell = $("<td></td>").addClass("old-value");
                                                                var newLastnameCell = $("<td></td>").addClass("new-value");
                                                                oldLastnameCell.addClass("not-matching");
                                                                newLastnameCell.addClass("not-matching");
                                                                
                                                                oldLastnameCell.text(oldLastname);
                                                                newLastnameCell.text(newLastname);

                                                                newRow.append(oldLastnameCell);
                                                                newRow.append(newLastnameCell);
                                                              } else{
                                                                newRow.append("<td></td>");
                                                                newRow.append("<td></td>");
                                                              }

                                                              

                                                              // Birthdate fields
                                                              

                                                              if (oldBirthdate !== newBirthdate) {

                                                                var thElement = document.querySelector(".birthdateOldTh");
                                                                var thElement1 = document.querySelector(".birthdateNewTh");
                                                                thElement.style.display = "table-cell";
                                                                thElement1.style.display = "table-cell";
                                                                var oldBirthdateCell = $("<td></td>").addClass("old-value");
                                                                var newBirthdateCell = $("<td></td>").addClass("new-value");
                                                                oldBirthdateCell.addClass("not-matching");
                                                                newBirthdateCell.addClass("not-matching");
                                                                oldBirthdateCell.text(oldBirthdate);
                                                                newBirthdateCell.text(newBirthdate);

                                                                newRow.append(oldBirthdateCell);
                                                                newRow.append(newBirthdateCell);
                                                              } else{
                                                                newRow.append("<td></td>");
                                                                newRow.append("<td></td>");
                                                              }

                                                              

                                                              // Address fields
                                                              

                                                              if (oldAddress !== newAddress) {
                                                                var thElement = document.querySelector(".addressOldTh");
                                                                var thElement1 = document.querySelector(".addressNewTh");
                                                                thElement.style.display = "table-cell";
                                                                thElement1.style.display = "table-cell";
                                                                var oldAddressCell = $("<td></td>").addClass("old-value");
                                                                var newAddressCell = $("<td></td>").addClass("new-value");
                                                                oldAddressCell.addClass("not-matching");
                                                                newAddressCell.addClass("not-matching");
                                                                
                                                                 oldAddressCell.text(oldAddress);
                                                                newAddressCell.text(newAddress);

                                                                 newRow.append(oldAddressCell);
                                                                newRow.append(newAddressCell);
                                                              } else{
                                                                newRow.append("<td></td>");
                                                                newRow.append("<td></td>");
                                                              }

                                                              // Append other columns as needed

                                                              aliasTableBody.append(newRow);
                                                            });
                                                          } else {
                                                            // Display a message if no alias records found
                                                            var newRow = $("<tr></tr>");
                                                            newRow.append("<td colspan='25'>No alias records found.</td>");
                                                            aliasTableBody.append(newRow);
                                                          }

                                                          // Show the modal
                                                          $("#historyModal").modal("show");
                                                        },
                                                        error: function(xhr, status, error) {
                                                          // Handle error
                                                          console.error(xhr.responseText);
                                                        }
                                                      });
                                                    });
                                                  });
                                                </script>

                                            </div>
                                            
                                            

                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
    </div>
</main>





    <?php

    include '../assets/layouts/footer.php'

    ?>