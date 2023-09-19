<?php

define('TITLE', "Logins");
include '../assets/layouts/header.php';
include '../client/controllers/loginsController.php';

check_verified();

?>

<main role="main" class="container col-12">

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
                <h4 class="mb-0" style="color: #fff; display: inline-block;">
                    <i class="fas fa-info-circle" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="right" title="This website keeps track of your aliases login and logout events."></i>
                    Logins:
                </h4>

                
                <br><br><br>
                <div class="table-responsive">
                    <table id="loginTable" class="table table-sm table-striped table-dark table-hover">
                        <thead>
                            <tr>
                                <th style="display: none;">Id </th>
                                <th style="display: none;">User ID</th>
                                <th>URL</th>
                                <th>Status</th>
                                <th>Username Used</th>
                                <th>Email Used</th>
                                <th style="display: none;">Password Used</th>
                                <th>created_at</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (!empty($logins)) {
                                foreach ($logins as $login) : ?>
                                <tr>
                                    <td style="display: none;"><?= $login['id']; ?></td>  
                                    <td style="display: none;"><?= $login['user_id']; ?></td>
                                    <td> 
                                        <a href="<?= $login['url'] ?>" target="_blank"> <?= $login['domain'] ?> </a>
                                    </td>

                                     
                                    <td>
                                        <?php if ($login['status'] === 'logout'): ?>
                                            <p class="text-warning" role="alert" style="font-size: 13px; padding: 5px; text-align: center; font-weight: bold;">
                                                logout
                                            </p>
                                        <?php elseif ($login['status'] === 'login'): ?>
                                            <p class="text-success" role="alert" style="font-size: 13px; padding: 5px; text-align: center; font-weight: bold;">
                                                login
                                            </p>
                                        <?php elseif ($login['status'] === 'login failed'): ?>
                                            <p class="text-danger" role="alert" style="font-size: 13px; padding: 5px; text-align: center; font-weight: bold;">
                                                login failed
                                            </p>
                                        <?php elseif ($login['status'] === 'register'): ?>
                                            <p class="text-info" role="alert" style="font-size: 13px; padding: 5px; text-align: center; font-weight: bold;">
                                                register
                                            </p>
                                        <?php endif; ?>
                                    </td>

                                    <td ><?= $login['username']; ?></td>
                                    <td ><?= $login['email']; ?></td>
                                    <td class="password-field" style="display: none;">
                                    <?php if ($login['status'] !== 'logout'): ?>
                                         <span class=""><?= str_repeat('*', strlen($login['password'])) ?></span>
                                        <span class="" style="display: none"><?= $login['password'] ?></span>
                                        <button id="password-btn" class="btn btn-small" type="button" onclick="" style="">
                                        <i class="bi bi-eye"></i>
                                        </button>   
                                    <?php endif; ?>
                                        
                                    </td>
                                    <td ><?= $login['created_at']; ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                           <?php } ?> 
                            
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</main>




    <?php

    include '../assets/layouts/footer.php'

    ?>