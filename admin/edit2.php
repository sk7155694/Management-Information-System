<?php
    $sname = "";
    $gname = "";
    $contact = "";
    $email = "";
    $address = "";
    $gender = "";
    $blgroup = "";
    $qualification = "";
   
					
    $esname = "";
    $egname = "";
    $econtact = "";
    $eemail = "";
    $eaddress = "";
    $egender = "";
    $eblgroup = "";
    $equalification = "";


    $sql = "select * from faculty where contact = ".$_GET['econ'];
    $table = mysqli_query($cn, $sql);
    $row = mysqli_fetch_assoc($table);
					
	if(isset($_POST['submit']))
	{
	$sname = $_POST['sname'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	if(isset($_POST['gender']))
	$gender = $_POST['gender'];
	$blgroup = $_POST['blgroup'];
	$qualification = $_POST['qualification'];
						
        $er = 0;
						
  

        if($er == 0)
        {
            $sql = "update faculty set sname = '".strip_tags($sname)."', 
            contact = '".strip_tags($contact)."',
            email = '".strip_tags($email)."',
            address = '".strip_tags($address)."',
            gender = '".strip_tags($gender)."',
            blgroup = '".strip_tags($blgroup)."',
            qualification = '".strip_tags($qualification)."'
            where contact = ".$_GET['econ'];
            
            if(mysqli_query($cn, $sql))
            {
                print '<span class = "successMessage">Data update successfully</span>';
                $row['sname'] = "";
                $row['contact'] = "";
                $row['email'] = "";
                $row['address'] = "";
                $row['dept'] = "";
                $row['blgroup'] = "";
                $row['qualification'] = "";
                
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
					<h3 id="et">Edit the Faculty:
                        <?php print $_GET['econ'].', Name: '.$row["sname"]; ?>'s information</h3>
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
