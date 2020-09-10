<?php
    $year = "";
    $std_in = "";
    $counselling = "";
    $management = "";
    $late_entry = "";
    $total = "";
    
   
					
    $eyear = "";
    $estd_in = "";
    $ecounselling = "";
    $emanagement = "";
    $elate_entry = "";
    $etotal = "";
   


    $sql = "select * from department where year = ".$_GET['eyearr'];
    $table = mysqli_query($cn, $sql);
    $row = mysqli_fetch_assoc($table);
					
	if(isset($_POST['submit']))
	{
	$year = $_POST['year'];
	$std_in = $_POST['std_in'];
	$counselling = $_POST['counselling'];
        $management = $_POST['management'];
	$late_entry = $_POST['late_entry'];
	$total = $_POST['total'];
						
        $er = 0;
						
  

        if($er == 0)
        {
            $sql = "update department set year = '".strip_tags($year)."', 
            std_in = '".strip_tags($std_in)."',
            counselling = '".strip_tags($counselling)."',
            management = '".strip_tags($management)."',
            late_entry = '".strip_tags($late_entry)."',
            total = '".strip_tags($total)."'
            where year = ".$_GET['eyearr'];
            
            if(mysqli_query($cn, $sql))
            {
                print '<span class = "successMessage">Data update successfully</span>';
                $row['year'] = "";
                $row['std_in'] = "";
                $row['counselling'] = "";
                $row['management'] = "";
                $row['late_entry'] = "";
                $row['total'] = "";
                
                
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
                        <?php print $_GET['eyearr'] ?>'s information</h3>
				</div>

				<div class="row">
					<div class="col-md-12">
						<form action="" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="left-side-form">
										<h5><label for="year">Year</label>
										<span class="error"><?php print $eyear; ?></span></h5>
										<p><input type="text" name="year" value="<?php print $year; ?>"></p>

										

										<h5><label for="std_in">Standared intake</label><span class="error">
												<?php print $estd_in; ?></span></h5>
										<p><input type="text" name="std_in" value="<?php print $std_in; ?>"></p>

										<h5><label for="counselling">Counselling</label><span class="error">
												<?php print $ecounselling; ?></span></h5>
										<p><input type="text" name="counselling" value="<?php print $counselling; ?>"></p>

										<h5><label for="management">Management</label><span class="error">
												<?php print $emanagement; ?></span></h5>
										<p><textarea name="management"><?php print $management; ?></textarea></p>

                                        <h5><label for="late_entry">Late Entry</label><span class="error">
												<?php print $elate_entry; ?></span></h5>
										<p><textarea name="late_entry"><?php print $late_entry; ?></textarea></p>

                                        <h5><label for="total">Total</label><span class="error">
												<?php print $elate_entry; ?></span></h5>
										<p><textarea name="total"><?php print $total; ?></textarea></p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="right-side-form">
										

										


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
