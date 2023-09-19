    <?php if (!isset($_SESSION['auth'])) { ?>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">

        <?php } else { ?>

            <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm p-2">


            <?php } ?>


            <div class="container col-lg" style="padding-right: 70px; padding-left: 80px; ">
                <a class="navbar-brand" href="../home/index.php">

                     <?php if (!isset($_SESSION['auth'])) { ?>
                        
                    <?php } else { ?>
                        <img src="../assets/images/eliaslogo.png" alt="" width="60" height="60" class="mr-3">
                        <?php echo strtoupper(APP_NAME);   ?> 
                    <?php } ?>

                    

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <?php
                      $currentURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                    $path = parse_url($currentURL, PHP_URL_PATH);
                    $segments = explode('/', rtrim($path, '/'));

                    // Retrieve the desired segments, for example, "client/logins.php"
                    $desiredSegments = implode('/', array_slice($segments, 2));
                    ?>

                    <ul class="navbar-nav ml-auto nav-links">

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="../welcome">Welcome</a>
                        </li> -->

                        <?php if (!isset($_SESSION['auth'])) { ?>

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="../contact">Contact Us</a>
                            </li> -->
                            
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="../login">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../register">Signup</a>
                            </li> -->

                        <?php } else { ?>

                            <li class="nav-item <?php echo ($desiredSegments === 'home/index.php' ) ? 'active' : ''; ?>">
                              <a class="nav-link" href="../home/index.php"><i class="bi bi-house"></i> Home</a>
                            </li>

                            <li class="nav-item <?php echo ($desiredSegments === 'client/index.php') ? 'active' : ''; ?>">
                              <a class="nav-link" href="../client/index.php"><i class="bi bi-person-gear"></i> Client</a>
                            </li>



                            <li class="nav-item <?php echo ($desiredSegments === 'client/logins.php') ? 'active' : ''; ?>">
                              <a class="nav-link" href="../client/logins.php"><i class="bi bi-box-arrow-in-right"></i> Activities</a>
                            </li>


                            <!-- <li class="nav-item">
                                <a class="nav-link" href="../contact">Contact Us</a>
                            </li> -->

                            <div class="dropdown" style="margin-left: 65px; ">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="imgdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: none; border: none;">
                                    <img class="navbar-img" src="../assets/uploads/users/<?php echo $_SESSION['profile_image'] ?>">
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="imgdropdown" style="background: #0d1117; ">
                                    <a class="dropdown-item text-muted" href="../profile"><i class="fa fa-user pr-2" ></i> Profile</a>
                                    <a class="dropdown-item text-muted" href="../profile-edit"><i class="fa fa-pencil-alt pr-2"></i> Edit Profile</a>
                                    <a class="dropdown-item text-muted" href="../logout"><i class="fa fa-running pr-2"></i> Logout</a>
                                </div>
                            </div>

                        <?php } ?>

                    </ul>
                </div>
            </div>
            </nav>

<script>
  // Add 'active' class to the current page's navigation link
  var currentLink = document.querySelector('.nav-links li.active');
  if (currentLink) {
    currentLink.classList.remove('active');
  }
  var desiredSegments = '<?php echo $desiredSegments; ?>';
  var currentNavLink = document.querySelector('.nav-links li a[href$="' + desiredSegments + '"]');
  if (currentNavLink) {
    currentNavLink.parentNode.classList.add('active');
  }
</script>