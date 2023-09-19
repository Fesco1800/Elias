<?php

define('TITLE', "Generate Aliases");
include '../assets/layouts/header.php';
include '../client/controllers/aliasingController.php';
check_verified();

?>



<main role="main" class="container col-12">

	<div class="row" >

		<div class="col-12">

			<div class="d-flex align-items-center p-3 mt-5 mb-3 text-white-50 bg-purple rounded box-shadow">
				<!-- <img class="mr-3" src="../assets/uploads/users/<?php echo $_SESSION['profile_image']; ?>" alt="" width="48" height="48" style=" border-radius: 50%; "> -->

				<div class="lh-100">
					<h6 class="mb-0 text-white lh-100">Hey there, <?php echo $_SESSION['username']; ?></h6>
					<small>Last logged in at <?php echo date("m-d-Y h:i a", strtotime($_SESSION['last_login_at'])); ?></small>
				</div>
			</div>

			
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			
		</div>
	</div>

</main>

<div class="my-3 p-3 rounded box-shadow col-md-12" id="extdiv" style="background: #0d1117; ">
				<div id="booking" class="section">
					<div class="section-center">
						<div class="container col-12" style="background: #161b22; padding-top: 4px ; border-radius: 6px; border: 1px solid #21262d;">
							<h4 class="my-3" style="color: #fff;"><i class="bi bi-arrow-repeat"></i> Generate Aliases
								<button type="button" class="btn btn-secondary" id="gotobtn"> 
									<a href="index.php" style="color: #fff; text-decoration: none;">
				                    Manage Aliases 
				                    <i class="bi bi-arrow-right"></i>    
				                	</a> 
				                </button>
							</h4>
							
							<div class="row">

								<div class="booking-form">

									<div class="row">
										
										
										
										<div class="col-md-6">
											<span class="form-label" for="username" >Username:</span>
											<div class="form-group d-flex">
												<!-- <form action="./controllers/aliasingController.php" method="post" style="color: #fff;"> -->
													<input type="number" value="1" name="num_aliases" id="num_aliases" min="1" max="1" required style="display: none;">

													
													<input class="form-control" type="text" name="username" id="username" value="" style="padding: 2px;" placeholder="Username">
													<button type="button" class="btn btn-primary btn-sm" id="usernameBtn"
													        style="float: right;
													        border-radius: 6px;
													        font-size: 20px;
													        background: none;
													        border: none;
													        margin-left: 5px;"
													        >
													    <i class="bi bi-arrow-repeat"></i>
													</button>

												    <div class="form-group" style="float: left; display: none;">
												    	<div class="form-checkbox">
												    		<label for="roundtrip">
												    			<input type="radio" id="roundtrip" name="flight-type">
												    			<span></span>With space
												    		</label>
												    		<label for="one-way">
												    			<input type="radio" id="one-way" name="flight-type">
												    			<span></span>Without space
												    		</label>
												    	</div>
												    </div>
												<!-- </form> -->

											</div>
										</div>
										<div class="col-md-6">
											<span class="form-label">Middlename</span>
											<div class="form-group d-flex">
												
												<input class="form-control" type="text" placeholder="Middlename" id="middlename" style="padding: 2px;">
												<button class="btn btn-primary btn-sm " id="middlenameBtn" type="button"style="float: right;
													        border-radius: 6px;

													       background: none;
													        border: none;
													        font-size: 20px;
													        margin-left: 5px;">
													<i class="bi bi-arrow-repeat"></i>
												</button>
											</div>
										</div>
										<div class="col-md-6">

											<span class="form-label">Password</span>
												<div class="form-group d-flex">
														<div style="position: relative;">
															<input class="form-control" type="text" name="password" placeholder="Password" id="password-input" style="padding: 2px; margin: 0px;
													            
													            width: 464px;
													            outline: none;
													            
													           ">
															<button class="btn btn-primary btn-sm" type="button" id="passwordBtn1" onclick="togglePass()" style="background: none; border: none; position: absolute;
													           
													            border-radius: 5px;
													            right: 5px;
													            z-index: 2;
													            border: none;
													            top: 5px;
													            
													            cursor: pointer;
													            color: white;
													            
													            transform: translateX(2px);">
													            <i class="bi bi-eye" id="passwordIcon1"></i>
													        </button >
														</div>
														
													
													
													<button class="btn btn-primary btn-sm " name="generate_password" type="submit" id="passwordBtn"
													style="float: right;
													        border-radius: 6px;
													        background: none;
													        border: none;
													        font-size: 20px;
													        margin-left: 5px;">
														<i class="bi bi-arrow-repeat" data-action="password"></i>
													</button>
												</div>
												<script>
													function togglePass() {
													    var passwordInput = document.getElementById("password-input");
													    var passwordIcon = document.getElementById("passwordIcon1");

													    if (passwordInput.type === "password") {
													        passwordInput.type = "text";
													        passwordIcon.classList.remove("bi-eye");
													        passwordIcon.classList.add("bi-eye-slash");
													    } else {
													        passwordInput.type = "password";
													        passwordIcon.classList.remove("bi-eye-slash");
													        passwordIcon.classList.add("bi-eye");
													    }
													}
												</script>
											
										</div>
										
										<div class="col-md-6">
											<span class="form-label">Lastname</span>
											<div class="form-group d-flex">
												
												<input class="form-control" type="text" placeholder="Lastname" id="lastname" value="" style="padding: 2px;">
												<button class="btn btn-primary btn-sm " id="lastnameBtn" type="button" style="float: right;
													        border-radius: 6px;

													       background: none;
													        border: none;
													        font-size: 20px;
													        margin-left: 5px;">
													<i class="bi bi-arrow-repeat"></i>
												</button>
											</div>
										</div>
										 <div class="col-md-6" >
										    <span class="form-label">Email</span>
										    <div class="form-group">
									        <div class="d-flex">
									            <input class="form-control" type="text" name="email" id="email" value="" style="padding: 2px;" placeholder="Email">
									            <button type="button" class="btn btn-primary btn-sm" id="emailBtn" style="float: right; border-radius: 6px; font-size: 20px; background: none; border: none; margin-left: 5px;">
									                <i class="bi bi-arrow-repeat"></i>
									            </button>
									        </div>
									        <div style="float: right; margin-right: 90px;">
									            <a href="#" id="fillEmailLink">Use my Email</a>
									        </div>
									    </div>

										    <script>
										    	document.getElementById("fillEmailLink").addEventListener("click", function(event) {
												    event.preventDefault(); // Prevent the default link behavior
												    var emailInput = document.getElementById("email");
												    emailInput.value = "<?php echo $_SESSION['email']; ?>";
												});
										    </script>
										</div>

						                <div class="col-md-6">
											<span class="form-label">Birthdate</span>
										  <div class="form-group d-flex">
										    
										    
										      <input class="form-control" type="date" id="birthdate" style="padding: 2px;">
										      <button class="btn btn-primary btn-sm" id="birthdateBtn" type="button" style="float: right;
													        border-radius: 6px;

													        background: none;
													        border: none;
													        font-size: 20px;
													        margin-left: 5px;">
										        <i class="bi bi-arrow-repeat"></i>
										      </button>
										   
										  </div>
										</div>
										<div class="col-md-6">
												<span class="form-label">Phone</span>
						                      <div class="form-group d-flex">
						                        
						                        <input class="form-control" type="text" name="phone" id="phone" value="" required style="padding: 2px;" placeholder="Phone">
						                        <button type="button" class="btn btn-primary btn-sm" id="phoneBtn"
						                                  style="float: right;
													        border-radius: 6px;

													        font-size: 20px;
													        background: none;
													        border: none;
													        margin-left: 5px;"
						                                  >
						                              <i class="bi bi-arrow-repeat"></i>
						                        </button>
						                      </div>
											
										</div> 
										
										
										<div class="col-md-6">
											<span class="form-label">Address</span>
											<div class="form-group d-flex">
												 
												<input class="form-control" type="text" placeholder="Address" id="address" style="padding: 2px;">
												<button class="btn btn-primary btn-sm " id="addressBtn" type="button" style="float: right;
													        /*border-radius: 6px;

													        background: purple !important;
													        border-color: purple;*/
													        background: none;
													        border: none;
													        font-size: 20px;
													        margin-left: 5px;">
													<i class="bi bi-arrow-repeat"></i>
												</button>
											</div>
										</div>
										<div class="col-md-6">
											<span class="form-label">Firstname</span>
											<div class="form-group d-flex">
												
												<input class="form-control" type="text" placeholder="Firstname" id="firstname" value="<?php echo $_SESSION['first_name']; ?>" style="padding: 2px;">
												<button class="btn btn-primary btn-sm" id="firstnameBtn" type="button" style="float: right;
													        border-radius: 6px;

													        background: none;
													        border: none;
													        font-size: 20px;
													        margin-left: 5px;">
													<i class="bi bi-arrow-repeat"></i>
												</button>
											</div>
									</div>
										<div class="col-md-6">
											<span class="form-label">URL</span>
											<div class="form-group d-flex">
												
												<input class="form-control" type="text" placeholder="URL" id="url" style="width: 85%; padding: 2px;" >
											</div>
										</div>
										
									</div>
									
										<!-- <div class="col-md-2" style="display: none;">
											<div class="form-group">
												<span class="form-label">Adults (18+)</span>
												<select class="form-control">
													<option>1</option>
													<option>2</option>
													<option>3</option>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>
										<div class="col-md-6"></div> -->
										
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-btn" >
												<button class="submit-btn" id="save"><i class="bi bi-save"></i> Save</button>

											</div>
											
										</div>
										<div class="col-md-6">
											
											<div class="form-btn">
												<button class="submit-btn" id="generateAllBtn"><i class="bi bi-lightning-fill"></i> Generate All</button>
											</div>
										</div>
									</div>
										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


	<?php
	include '../assets/layouts/footer.php'
?>


