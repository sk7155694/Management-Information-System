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


    $sql = "select * from hostel where regno = ".$_GET['eid'];
    $table = mysqli_query($cn, $sql);
    $row = mysqli_fetch_assoc($table);
					
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
						
  

        if($er == 0)
        {
            $sql = "update hostel set regno = '".strip_tags($regno)."', 
            name = '".strip_tags(name)."',
            dept = '".strip_tags($dept)."',
            year = '".strip_tags($year)."',
            room = '".strip_tags($room)."',
            native = '".strip_tags($native)."',
            address = '".strip_tags($address)."',
            contact = '".strip_tags($contact)."'
            where regno = ".$_GET['eid'];
            
            if(mysqli_query($cn, $sql))
            {
                print '<span class = "successMessage">Data update successfully</span>';
                $row['regno'] = "";
                $row['dept'] = "";
                $row['year'] = "";
                $row['room'] = "";
                $row['native'] = "";
                $row['address'] = "";
                $row['contact'] = "";
                $row['contact'] = "";
  
                
            }
            else
            {
                print '<span>'.mysqli_error($cn).'</span>';
            }
        }
    }
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<div class="form-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 id="et">Edit the Details:
                        <?php print $_GET['eid'] ?>'s information</h3>
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
