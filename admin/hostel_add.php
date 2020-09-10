<!-- ===============================================
	**** A COMPLETE VALIDATE FORM WITH PHP ****
================================================ -->

<!-- ==============  PHP begin  =================-->
<?php
					$regno = "";
					$name = "";
					$dept = "";
					$year = "";
					$room = "";
					$native = "";
					$address = "";
				        $contact = "";


					$eregno = "";
					$ename = "";
					$edept = "";
					$eyear = "";
					$eroom = "";
					$enative = "";
					$eaddress = "";
				        $econtact = "";
					
					if(isset($_POST['submit']))
					{
					$regno = $_POST['regno'];
					$name = $_POST['name'];
					$dept = $_POST['dept'];
					$year = $_POST['year'];
					$room = $_POST['room'];
					$native = $_POST['native'];
					$address = $_POST['address'];
					$contact = $_POST['contact'];
					
					
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

						if($name == "")
						{
							$er++;
							$ename = "*Required";
						}
						else{
							$name = test_input($name);
							if(!preg_match("/^[a-zA-Z ]*$/",$name)){
							$er++;
							$ename = "*Only letters and white space allowed";
						}
						}

						if($dept == 0)
						{
							$er++;
							$edept = "*Please select department";
						}

						if($year == "")
						{
							$er++;
							$eyear = "*Required";
						}

						if($room == "")
						{
							$er++;
							$eroom = "*Room no. is Required";
						}

						if($native == "")
						{
							$er++;
							$enative = "*Native is Required";
						}

						if($address == "")
						{
							$er++;
							$eaddress = "*Address is Required";
						}

						if($contact == "")
						{
							$er++;
							$econtact = "*Contact is Required";
						}
						else{
							$contact = test_input($contact);
							if(!preg_match("/^[+0-9]*$/",$contact)){
							$er++;
							$econtact = "*Only numbers are allowed";
							}
						}
					

					
              						
						if($er == 0)
						{
                                                 /* $cn = mysqli_connect("localhost", "root", "", "db_admission");*/
							
							$sql = "INSERT INTO hostel (regno,name,dept,year,room,native,address,contact) VALUES (
							'".mysqli_real_escape_string($cn, strip_tags($regno))."',
							'".mysqli_real_escape_string($cn, strip_tags($name))."',
							'".mysqli_real_escape_string($cn, strip_tags($dept))."',
							'".mysqli_real_escape_string($cn, strip_tags($year))."', 
							'".mysqli_real_escape_string($cn, strip_tags($room))."', 
							'".mysqli_real_escape_string($cn, strip_tags($native))."',  
							'".mysqli_real_escape_string($cn, strip_tags($address))."', 
							'".mysqli_real_escape_string($cn, strip_tags($contact))."'
							)";
							
							if(mysqli_query($cn , $sql))
							{
								print '<span class = "successMessage">Data saved into system.</span>';
						    $regno = "";
					            $name = "";
					            $dept = "";
					            $year = "";
					            $room = "";
					            $native = "";
					            $address = "";
				                    $contact = "";
									
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
					<h3>Hostellers Form</h3>
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
										<span class="error"><?php print $ename; ?></span></h5>
										<p><input type="text" name="name" value="<?php print $name; ?>"></p>

										<h5><label for="dept">department</label></h5>
										<p><select name="dept" id="">
												<option value="0">N/A</option>
												<option value="1">Civil Engineering</option>
												<option value="2">Computer Science And Engineering</option>
												<option value="3">Electronics And Communication Engineering</option>
												<option value="4">Electrical And Electronics Engineering</option>
												<option value="5">Information Technology</option>
												<option value="6">Mechanical Engineering</option>
												</select><span class="error">
												<?php print $edept; ?></span></p>

										<h5><label for="year">year</label></h5>
										<p><select name="year" id="">
												<option value="0">select</option>
												<option value="1">I </option>
												<option value="2">II </option>
												<option value="3">III </option>
												<option value="4">IV </option>
											</select><span class="error">
												<?php print $eyear; ?></span></p>
                                  </div>
								</div>
								<div class="col-md-6">
									<div class="right-side-form">
										
									<h5><label for="room">Room No.</label><span class="error">
												<?php print $eroom; ?></span></h5>
										<p><input type="text" name="room" value="<?php print $room; ?>"></p>

									<h5><label for="native">Native Place</label><span class="error">
												<?php print $enative; ?></span></h5>
										<p><input type="text" name="native" value="<?php print $native; ?>"></p>

									<h5><label for="address">Address</label><span class="error">
												<?php print $eaddress; ?></span></h5>
										<p><textarea name="address"><?php print $address; ?></textarea></p>

									<h5><label for="contact">Contact</label><span class="error">
												<?php print $econtact; ?></span></h5>
										<p><input type="text" name="contact" value="<?php print $contact; ?>"></p>
								

										<justify><p><input type="submit" name="submit" value="Submit"></p></justify>
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
