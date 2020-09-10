<!-- ===============================================
	**** A COMPLETE VALIDATE FORM WITH PHP ****
================================================ -->

<!-- ==============  PHP begin  =================-->
<?php
					$regno = "";
					$sname = "";
					$gname = "";
					$contact = "";
					$email = "";
					$address = "";
					$year = "";
					$gender = "";
					$blgroup = "";
					$dept = "";

					$eregno = "";
					$esname = "";
					$egname = "";
					$econtact = "";
					$eemail = "";
					$eaddress = "";
					$eyear = "";
					$egender = "";
					$eblgroup = "";
					$edept = "";
					
					if(isset($_POST['submit']))
					{
					$regno = $_POST['regno'];
					$sname = $_POST['sname'];
					$gname = $_POST['gname'] ;
					$contact = $_POST['contact'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					$year = $_POST['year'];
					$blgroup = $_POST['blgroup'];
					if(isset($_POST['gender']))
					$gender = $_POST['gender'];
					if(isset($_POST['dept']))
					$dept = $_POST['dept'];
						
						$er = 0;
						
                        if($regno == "")
						{
							$er++;
							$eregno = "*Required";
						}
						else{
							$regno = test_input($regno);
							if(!preg_match("/^[+0-9]*$/",$regno)){
							$er++;
							$eregno = "*Only numbers are allowed";
							}
							
						}

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

						if($gname == "")
						{
							$er++;
							$egname = "*Required";
						}
						else{
							$gname = test_input($gname);
							if(!preg_match("/^[a-zA-Z ]*$/",$gname)){
							$er++;
							$egname = "*Only letters and white space allowed";
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

						if($year == "")
						{
							$er++;
							$eyear = "*Required";
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
                        elseif(strlen($blgroup) > 3)
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
                        
						if($dept == "")
						{
							$er++;
							$edept = "*Please select department";
						}
						
						
						if($er == 0)
						{
                            /* $cn = mysqli_connect("localhost", "root", "", "db_admission");*/
							
							$sql = "INSERT INTO student (regno,sname, gname, contact, email, address,year, gender, blgroup, dept) VALUES (
							'".mysqli_real_escape_string($cn, strip_tags($regno))."',
							'".mysqli_real_escape_string($cn, strip_tags($sname))."',
							'".mysqli_real_escape_string($cn, strip_tags($gname))."', 
							'".mysqli_real_escape_string($cn, strip_tags($contact))."', 
							'".mysqli_real_escape_string($cn, strip_tags($email))."', 
							'".mysqli_real_escape_string($cn, strip_tags($address))."', 
							".mysqli_real_escape_string($cn, strip_tags($year)).", 
							'".mysqli_real_escape_string($cn, strip_tags($gender))."', 
							'".mysqli_real_escape_string($cn, strip_tags($blgroup))."', 
							".mysqli_real_escape_string($cn, strip_tags($dept))."
							)";
							
							if(mysqli_query($cn , $sql))
							{
								print '<span class = "successMessage">Data saved into system.</span>';
								$regno = "";
								$sname = "";
								$gname = "";
								$contact = "";
								$email = "";
								$address = "";
								$year = "";
								$gender = "";
								$blgroup = "";
								$dept = "";
									
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
					<h3>Admission form</h3>
				</div>

				<div class="row">
					<div class="col-md-12">
						<form action="" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="left-side-form">
									    
										<h5><label for="regno">Reg no</label>
										<span class="error"><?php print $eregno; ?></span></h5>
										<p><input type="text" name="regno" value="<?php print $regno; ?>"></p>
										<h5><label for="sname">Student name</label>
										<span class="error"><?php print $esname; ?></span></h5>
										<p><input type="text" name="sname" value="<?php print $sname; ?>"></p>

										<h5><label for="gname">gurdian name</label><span class="error">
												<?php print $egname; ?></span></h5>
										<p><input type="text" name="gname" value="<?php print $gname; ?>"></p>

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
										<h5><label for="year">year</label></h5>
										<input type="radio" name="year" value="1"><span>I</span>
										<input type="radio" name="year" value="2"><span>II</span>
                                                                                <input type="radio" name="year" value="3"><span>III</span>
                                                                                <input type="radio" name="year" value="4"><span>IV</span>
										<span class="error">
											<?php print $eyear; ?></span>

										<h5><label for="gender">Gender</label></h5>
										<input type="radio" name="gender" value="male"><span>Male</span>
										<input type="radio" name="gender" value="female"><span>Female</span>
										<input type="radio" name="gender" value="others"><span>Others</span>
										<span class="error">
											<?php print $egender; ?></span>

										<h5><label for="blgroup">blood group</label><span class="error">
												<?php print $eblgroup; ?></span></h5>

										<p><input type="text" name="blgroup" value="<?php print $blgroup; ?>"></p>

										<h5><label for="dept">department</label></h5>
										<input type="radio" name="dept" value="information technology"><span>InformationTechnology</span>
										<span class="error">
											<?php print $eyear; ?></span>

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
