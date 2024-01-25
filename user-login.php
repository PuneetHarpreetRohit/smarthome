<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
   <title>User Login | Smart Home Devices</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Smart Home Devices, Home Devices" name="keywords">
    <meta content="Buy Smart Home Devices" name="description">

   <?php include_once('header.php'); ?>


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight">User Login</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">User Login</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="img/login.png" alt="" style="max-height: 300px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->





    <!-- User Login Start -->
    <div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <div class="row justify-content-center">
                  <div class="col-lg-6">
				 
				
					<form>
					  <!-- Email input -->
					  <div class="form-outline mb-4">
						<input type="email" id="form2Example1" class="form-control" />
						<label class="form-label" for="form2Example1">Email address</label>
					  </div>

					  <!-- Password input -->
					  <div class="form-outline mb-4">
						<input type="password" id="form2Example2" class="form-control" />
						<label class="form-label" for="form2Example2">Password</label>
					  </div>

					  <!-- 2 column grid layout for inline styling -->
					  <div class="row mb-4">
						<div class="col d-flex justify-content-center">
						  <!-- Checkbox -->
						  <div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
							<label class="form-check-label" for="form2Example31"> Remember me </label>
						  </div>
						</div>

						<div class="col">
						  <!-- Simple link -->
						  <a href="#!">Forgot password?</a>
						</div>
					  </div>

					  <!-- Submit button -->
					  <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

					  <!-- Register buttons -->
					  <div class="text-center">
						<p>Not a member? <a href="signup.php">Register</a></p>
						 
					  </div>
				</form>
				 </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
        



   <?php include_once('footer.php'); ?>