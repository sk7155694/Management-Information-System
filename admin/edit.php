<?php
    $sname = "";
    $gname = "";
    $contact = "";
    $email = "";
    $address = "";
    $dept= "";
    $year = "";
    $gender = "";
    $blgroup = "";
    
					
    $esname = "";
    $egname = "";
    $econtact = "";
    $eemail = "";
    $eaddress = "";
    $edept = "";
    $eyear = "";
    $egender = "";
    $eblgroup = "";
    


    $sql = "select * from student where regno = ".$_GET['eregno'];
    $table = mysqli_query($cn, $sql);
    $row = mysqli_fetch_assoc($table);
					
	if(isset($_POST['submit']))
	{
	$sname = $_POST['sname'];
	$gname = $_POST['gname'] ;
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$class = $_POST['dept'];
	$shift = $_POST['year'];
						
	if(isset($_POST['gender']))
	$gender = $_POST['gender'];
						
	$blgroup = $_POST['blgroup'];
	
						
    $er = 0;
						
  

        if($er == 0)
        {
            $sql = "update student set sname = '".strip_tags($sname)."', 
            gname = '".strip_tags($gname)."',
            contact = '".strip_tags($contact)."',
            email = '".strip_tags($email)."',
            address = '".strip_tags($address)."',
            year = '".strip_tags($year)."',
            dept = '".strip_tags($dept)."' ,
            gender = '".strip_tags($gender)."'
            where regno = ".$_GET['eregno'];
            
            if(mysqli_query($cn, $sql))
            {
                print '<span class = "successMessage">Data update successfully</span>';
                $row['sname'] = "";
                $row['gname'] = "";
                $row['contact'] = "";
                $row['email'] = "";
                $row['address'] = "";
                $row['dept'] = "";
                $row['year'] = "";
                $row['gender'] = "";
                $row['blgroup'] = "";
                
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
					<h3 id="et">Edit the ID:
                        <?php print $_GET['eregno'].', Name: '.$row["sname"]; ?>'s information</h3>
				</div>

				<div class="row">
					<div class="col-md-12">
						<form action="" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="left-side-form">
									    
										
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
										<p><select name="year" id="">
												<option value="0">select</option>
												<option value="1">I </option>
												<option value="2">II </option>
												<option value="3">III </option>
												<option value="4">IV </option>
											</select><span class="error">
												<?php print $eyear; ?></span></p>


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
										<p><select name="dept" id="">
												<option value="0">N/A</option>
												<option value="1">Information Technology</option>
											</select><span class="error">
												<?php print $edept; ?></span></p>

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
