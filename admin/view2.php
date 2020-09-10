<div id="padding">
<div class="section-title">
    <h3>Faculties list</h3>
</div>

        <?php 

        if(isset($_GET['dcon']))
        {
        delete();
        print '<h6 class= "successMessage">faculty Deleted.</h6>';
        }
               

                /* $cn = mysqli_connect("localhost", "root", "", "db_admission");*/
				$sql = "select * from faculty";
				
				$table = mysqli_query($cn, $sql);
				
				
				print '<table>';
				print '<tr><th>Faculty Name</th><th>Contact</th><th>Email</th><th>Qualification</th><th>Gender</th><th>Blood Group</th><th>Address</th><th>Action</th></tr>';
				
				while($row = mysqli_fetch_assoc($table))
				{
					print '<tr>';
					print '<td>'.htmlentities($row["sname"]).'</td>';
					print '<td>'.htmlentities($row["contact"]).'</td>';
					print '<td>'.htmlentities($row["email"]).'</td>';
					print '<td>'.htmlentities($row["qualification"]).'</td>';
					print '<td>'.htmlentities($row["gender"]).'</td>';
					print '<td>'.htmlentities($row["blgroup"]).'</td>';
					print '<td>'.htmlentities($row["address"]).'</td>';
					print '<td> <a class= "action-e" href= "?a=edit2&econ='.$row["contact"].'"><i class="fa fa-wrench" title="Update"></i></a>
					<a class= "action-d" href= "?a='.$_GET['a'].'&dcon='.$row['contact'].'"><i class="fa fa-trash" title="Delete"></i></a></td>';
					print '</tr>';
				}
	
				print '</table>';


    function delete()
        {
            global $cn;
            $sql = "delete from faculty where contact = ".$_GET['dcon'];
            mysqli_query($cn, $sql);
        }
	
    ?>
     
</div>
