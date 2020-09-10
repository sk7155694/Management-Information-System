<!-- ===============================================
	**** A COMPLETE VALIDATE FORM WITH PHP ****
================================================ -->

<!-- ==============  PHP begin  =================-->
<?php
					$sname = "";
					$contact = "";
					$email = "";
					$address = "";
					$gender = "";
					$blgroup = "";
					$qualification ="";
					
					$esname = "";
					$econtact = "";
					$eemail = "";
					$eaddress = "";
					$egender = "";
					$eblgroup = "";
					$equalification ="";
					
					if(isset($_POST['submit']))
					{
					$sname = $_POST['sname'];
					$contact = $_POST['contact'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					$qualification = $_POST['qualification'];
					
						
					if(isset($_POST['gender']))
					$gender = $_POST['gender'];
						
					$blgroup = $_POST['blgroup'];
					
						
						$er = 0;
						
						if($sname == "")
						{
							$er++;
							$esname = "*Required";
						}
						else{
							$sname = test_input($sname);
							if(!preg_match("/^[a-zA-Z ]*$/",$sname)){
							$er++;
							$esname = "*Only letters and white space allowed";
						}
						}

						

						if($contact == "")
						{
							$er++;
							$econtact = "*Required";
						}
						else{
							$contact = test_input($contact);
							if(!preg_match("/^[+0-9]*$/",$contact)){
							$er++;
							$econtact = "*Only numbers are allowed";
							}
							
						}

						if($email == "")
						{
							$er++;
							$eemail = "*Required";
						}
						else
						{
							$email = test_input($email);
							if(!filter_var($email, FILTER_VALIDATE_EMAIL))
							{
								$er++;
								$eemail = "*Email format is invalid";
							}
							
						}

						if($address == "")
						{
							$er++;
							$eaddress = "*Required";
						}

						

						 if (empty($gender)) {
						 	$er++;
						    $egender = "*Gender is required";
						  } else {
						    $gender = test_input($gender);
						  }

						if($blgroup == "")
						{
							$er++;
							$eblgroup = "*Required";
                        }
                        elseif(strlen($blgroup) > 5)
                        {
                            $er++;
                            $eblgroup = "*Not more than 3 character";
                        }
                            
                        else
                        {
                            $blgroup = test_input($blgroup);
                            if(!preg_match("/^[a-zA-Z+-]*$/",$blgroup))
                            {
                                $er++;
                                $eblgroup = "*Blood group not valid";
                            }

						}
						
						if($qualification == "")
						{
							$er++;
							$equalification = "*Required";
						}

						
						if($er == 0)
						{
                            /* $cn = mysqli_connect("localhost", "root", "", "db_admission");*/
							
							$sql = "INSERT INTO faculty (sname,contact,email,address,gender,blgroup,qualification) VALUES (
							'".mysqli_real_escape_string($cn, strip_tags($sname))."',
							'".mysqli_real_escape_string($cn, strip_tags($contact))."',
							'".mysqli_real_escape_string($cn, strip_tags($email))."',
							'".mysqli_real_escape_string($cn, strip_tags($address))."',
							'".mysqli_real_escape_string($cn, strip_tags($gender))."',
							'".mysqli_real_escape_string($cn, strip_tags($blgroup))."',
							'".mysqli_real_escape_string($cn, strip_tags($qualification))."')";
							
							
							if(mysqli_query($cn , $sql))
							{
								print '<span class = "successMessage">Data saved into system.</span>';
								$sname = "";
								$contact = "";
								$email = "";
								$address = "";
								$gender = "";
								$blgroup = "";
								$qualification = "";
									
							}
							else
							{
								print '<span class= "errorMessage">'.mysqli_error($cn).'</span>';
							}
						}
						else
						{
							print '<span class = "errorMessage">Please fill all the required fields correctly.</span>';
						}
					}
					
					function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}
					
//================================ PHP End =============================	
?>

<div class="form-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3>Faculty form</h3>
				</div>

				<div class="row">
					<div class="col-md-12">
						<form action="" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="left-side-form">
										<h5><label for="sname">Faculty name</label>
										<span class="error"><?php print $esname; ?></span></h5>
										<p><input type="text" name="sname" value="<?php print $sname; ?>"></p>

										

										<h5><label for="contact">contact</label><span class="error">
												<?php print $econtact; ?></span></h5>
										<p><input type="text" name="contact" value="<?php print $contact; ?>"></p>

										<h5><label for="email">email</label><span class="error">
												<?php print $eemail; ?></span></h5>
										<p><input type="text" name="email" value="<?php print $email; ?>"></p>

										<h5><label for="address">address</label><span class="error">
												<?php print $eaddress; ?></span></h5>
										<p><textarea name="address"><?php print $address; ?></textarea></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="right-side-form">
										

										

										<h5><label for="gender">Gender</label></h5>
										<input type="radio" name="gender" value="male"><span>Male</span>
										<input type="radio" name="gender" value="female"><span>Female</span>
										<input type="radio" name="gender" value="others"><span>Others</span>
										<span class="error">
											<?php print $egender; ?></span>

											<h5><label for="qualification">qualification</label><span class="error">
												<?php print $equalification; ?></span></h5>
										<p><textarea name="qualification"><?php print $qualification; ?></textarea></p>	

										
	

										<h5><label for="blgroup">blood group</label><span class="error">
												<?php print $eblgroup; ?></span></h5>

										<p><input type="text" name="blgroup" value="<?php print $blgroup; ?>"></p>

										

										<p><input type="submit" name="submit" value="Submit"></p>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
