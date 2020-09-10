<div id="padding">
<div class="section-title">
    <h3>Third Year Hostell Details</h3>
</div>

        <?php 

        if(isset($_GET['did']))
        {
        delete();
        print '<h6 class= "successMessage">Student Deleted.</h6>';
        }
               

                /* $cn = mysqli_connect("localhost", "root", "", "db_admission");*/
				$sql = "select * from hostel where year=3";
				
				$table = mysqli_query($cn, $sql);
				
				
				print '<table>';
				print '<tr><th>Reg No.</th><th>Student Name</th><th>Department</th><th>Year</th><th>Room No.</th><th>Native</th><th>Address</th><th>Contact</th></tr>';
				
				while($row = mysqli_fetch_assoc($table))
				{
					print '<tr>';
					print '<td>'.htmlentities($row["regno"]).'</td>';
                    print '<td>'.htmlentities($row["name"]).'</td>';
                    print '<td>'.htmlentities($row["dept"]).'</td>';
                    print '<td>'.htmlentities($row["year"]).'</td>';
                    print '<td>'.htmlentities($row["room"]).'</td>';
                    print '<td>'.htmlentities($row["native"]).'</td>';
                    print '<td>'.htmlentities($row["address"]).'</td>';
					print '<td>'.htmlentities($row["contact"]).'</td>';
					
					print '<td> <a class= "action-e" href= "?a=edit&eid='.$row["id"].'"><i class="fa fa-wrench" title="Update"></i></a>
					<a class= "action-d" href= "?a='.$_GET['a'].'&did='.$row['id'].'"><i class="fa fa-trash" title="Delete"></i></a></td>';
					print '</tr>';
				}
	
				print '</table>';


    function delete()
        {
            global $cn;
            $sql = "delete from student where id = ".$_GET['did'];
            mysqli_query($cn, $sql);
        }
	
    ?>
     
</div>
