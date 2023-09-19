<?php

define('TITLE', "Home");
include '../assets/layouts/header.php';
check_verified();

?>

<head>
    <link rel="stylesheet" type="text/css" href="custom.css">
</head>

<main role="main" class="container col-12" >

    <div class="row">
        
        <div class="col-12">

            <div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-purple rounded box-shadow" >
                <!-- <img class="mr-3" src="../assets/uploads/users/<?php echo $_SESSION['profile_image']; ?>" alt="" width="48" height="48" style=" border-radius: 50%; "> -->

                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">Hey there, <?php echo $_SESSION['username']; ?></h6>
                    <small>Last logged in at <?php echo date("m-d-Y h:i a", strtotime($_SESSION['last_login_at'])); ?></small>
                </div>
            </div>

            <div class="my-3 p-3  rounded box-shadow scrollable-div" style="background: #161b22; color: #e6edf3 !important; border: 1px solid #21262d; ">
                <h6 class="mb-0" style="font-size: 18px;">Welcome to <strong> ELIAS </strong></h6>
                <sub class=" border-bottom border-gray pb-2 mb-0" style="font-size: 13px;">[  A Personal Aliasing Management System  ]</sub>

                
                
                <!-- <small class="d-block text-right mt-3">
                    <a href="#">All updates</a>
                </small> -->
                <div class="row">
        <div class="col-4">
                    <div class="text-center" style="margin-top: 30px; font-size: 45px; "><img src="../assets/icons/repeat.png" alt="Repeat">
                    </div>
                <div class="media  pt-3">

                    <p class="media-body pb-3 mb-0 small lh-125 text-justify">
                        <strong class="d-block text-gray-dark text-center" style="margin-bottom: 10px;">@Generate Random Aliases</strong>
                        
                        &#8594; The Alias Generation feature generates unique and random information for users, including a username, password, email, phone number, first name, middle name, last name, address, and birthdate. This feature provides users with a convenient way to quickly create realistic and unique identities for various purposes, such as online registrations or form filling. By generating this diverse set of information, users can ensure privacy, protect their personal data, and maintain security while engaging in various online activities.
                    </p>
                </div>
        </div>

        <div class="col-4">
            <div class="text-center" style="margin-top: 30px; font-size: 45px; "><img src="../assets/icons/table.png" alt="Repeat">
                    </div>
                <div class="media pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 text-justify ">
                        <strong class="d-block text-gray-dark text-center" style="margin-bottom: 10px;">@Alias Management</strong>
                        &#8594; The Alias Management feature simplifies the organization and control of generated aliases. Users can easily view, edit, and delete aliases, allowing efficient management of multiple identities. The feature provides a centralized interface for accessing and controlling alias information, ensuring convenient tracking and maintenance of aliases. With search, filter, and secure storage capabilities, users can effectively manage their aliases, enhancing privacy and security.
                    </p>
                </div>
        </div>

        <div class="col-4">
            <div class="text-center" style="margin-top: 30px; font-size: 45px; "><img src="../assets/icons/logins.png" alt="Repeat">
                    </div>
                <div class="media pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 text-justify">
                        <strong class="d-block text-gray-dark text-center" style="margin-bottom: 10px;">@Logins Feature</strong>
                        &#8594; The Logins feature in Elias allows you to monitor the usage of your saved aliases. With this feature, you can easily track where your aliases are being used across different platforms and websites. Gain insights into your online presence and maintain control over your personal information. Stay informed about the websites and services that have access to your aliases, ensuring the security and privacy of your online identity. Take charge of your digital identity with Elias's simple and powerful monitoring system for your saved aliases.
                    </p>
                </div>
        </div>
    </div><!-- end of row-->

    <div class="row">
        
        <div class="col-4"> 
       <div class="text-center" style="margin-top: 30px; font-size: 45px; "><img src="../assets/icons/puzzle.png" alt="Repeat">
                    </div>               
            <div class="media  pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 text-justify">
                      <strong class="d-block text-gray-dark text-center" style="margin-bottom: 10px; ">@Elias Browser Extension</strong>
                      
                        &#8594; 
                         The Elias Browser Extension empowers users to effortlessly generate unique aliases, utilize them across various platforms, and conveniently autofill their alias information on websites. With Elias, you can enhance your online identity management and protect your personal information.
                      
                      
                        &#8594; Please note that the Elias system is currently available exclusively for Windows desktop users using the Chrome browser. The browser extension provides seamless integration and functionality for a streamlined experience.
                      
                      
                    </p>
                </div>
        </div>

        <div class="col-4">
            <div class="text-center" style="margin-top: 30px; font-size: 45px; "><img src="../assets/icons/bulb.png" alt="Repeat">
                    </div>
            <div class="media-body pb-3 mb-0 small lh-125 text-justify">
            <p style="margin-top: 13px;">
                        <strong class="d-block text-gray-dark text-center">To install the Elias Browser Extension:</strong>
                      </p>
                      <ol>
                        <li>Download the extension folder from this Google Drive link: <a href="#" target="_blank">[Insert your Google Drive link here]</a></li>
                        <li>Open Google Chrome and go to: <code>chrome://extensions</code></li>
                        <li>Enable Developer Mode by toggling the switch at the top right corner.</li>
                        <li>Click on "Load unpacked" and select the Elias extension folder you downloaded.</li>
                        <li>The Elias Browser Extension is now installed and ready to use!</li>
                      </ol>
                      <p style="margin-left: 25px;">
                        &#8594; Take control of your online identity with Elias and experience the convenience and security of alias management.
                      </p>
            </div>
        </div>
        <div class="col-4">
            <div class="text-center" style="margin-top: 30px; font-size: 45px; "><img src="../assets/icons/disclaimer.png" alt="Repeat">
                    </div>
            <div class="media-body pb-3 mb-0 small lh-125 text-justify">
            <p style="margin-top: 1px;">
                        <strong class="d-block text-gray-dark text-center">DISCLAIMER</strong>
                      </p>
                       &#8594; 
                         The Elias system is provided as-is and the developers hold no responsibility or control over how users choose to utilize the system. Users are solely responsible for their actions and usage of Elias. The developers cannot be held liable for any consequences, damages, or losses resulting from the use or misuse of the Elias system. Users are advised to exercise caution, adhere to applicable laws and regulations, and use Elias responsibly and ethically.
                      </p>
                     
            </div>
        </div>

        
    </div><!-- end of row -->
        </div>
    </div>
            </div>
            



</main>

<?php require '../assets/layouts/footer.php'; ?>