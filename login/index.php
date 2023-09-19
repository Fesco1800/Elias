<?php

define('TITLE', "Login");
include '../assets/layouts/header.php';
check_logged_out();
?>


<div class="container" style="">
    <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4" >
             <div class="text-center" >
                    <img class="mb-1" src="../assets/images/eliaslogo.png" alt="" width="80" height="80">
                </div>
            <h1 class="h3 mb-3 font-weight-normal text-muted text-center" style="color: #e6edf3 !important; font-size: 24px; margin-top: 10%;" >Sign in to Elias</h1>
            <form class="form-auth" action="includes/login.inc.php" method="post" style="border: 1px solid #21262d; border-radius: 6px; background: #161b22   ;">

                <?php insert_csrf_token(); ?>

               <!--  <div class="text-center">
                    <img class="mb-1" src="../assets/images/eliaslogo.png" alt="" width="100" height="100">
                </div> -->


                

                <div class="text-center mb-3">
                    <small class="text-success font-weight-bold">
                        <?php
                            if (isset($_SESSION['STATUS']['loginstatus']))
                                echo $_SESSION['STATUS']['loginstatus'];

                        ?>
                    </small>
                </div>

                <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus style="border-radius: 2px; padding-left: 2px;">
                    <sub class="text-danger">
                        <?php
                            if (isset($_SESSION['ERRORS']['nouser']))
                                echo $_SESSION['ERRORS']['nouser'];
                        ?>
                    </sub>
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required style="border-radius: 2px; padding-left: 2px;">
                    <sub class="text-danger">
                        <?php
                            if (isset($_SESSION['ERRORS']['wrongpassword']))
                                echo $_SESSION['ERRORS']['wrongpassword'];
                        ?>
                    </sub>
                </div>

                <div class="col-auto my-1 mb-4">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme">
                        <label class="custom-control-label" for="rememberme" style="font-size: 13px;">Remember me</label>
                        

                    </div>

                </div>

                <!-- <ul style="text-align: center;">
                    <li class="nav-item" style="display: inline-block; text-decoration: none;">
                    <a class="nav-link" href="../login">Login</a>

                    </li>

                    <li class="nav-item" style="display: inline-block; text-decoration: none;">
                        <a class="nav-link" href="../register">Signup</a>
                    </li>
                </ul> -->

                

                <button class="btn btn-lg btn-primary btn-block" id="loginbtn" type="submit" value="loginsubmit" name="loginsubmit">Sign in</button>

                <p class="mt-3 text-muted text-center" style="font-size: 15px;"><a href="../reset-password/">forgot password?</a></p>

                
                
            </form>
            <p class="signUpL" style="">New to Elias? <a  href="../register" style=""> Signup here.</a></p>

            <p class="mt-4 mb-3 text-muted text-center">
                    <span >
                        Elias
                    </span> | 
                    <span >
                        2023
                    </span>
                </p>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
</div>



<?php

include '../assets/layouts/footer.php'

?>



