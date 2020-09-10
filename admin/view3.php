<div id="padding">
<div class="section-title">
    <h3>Indformation Technology  Department Admission</h3>
</div>

        <?php 

        if(isset($_GET['did']))
        {
        delete();
        print '<h6 class= "successMessage">Batch Deleted.</h6>';
        }
               

                /* $cn = mysqli_connect("localhost", "root", "", "db_admission");*/
				$sql = "select * from department";
				
				$table = mysqli_query($cn, $sql);
				
				
				print '<table>';
				print '<tr><th>Year Of Batch</th><th>Standared  Of Intake</th><th>Counselling</th><th>Mangement</th><th>Lateral Entry</th><th>Total</th><th>Action</th></tr>';
				
				while($row = mysqli_fetch_assoc($table))
				{
					print '<tr>';
					print '<td>'.htmlentities($row["year"]).'</td>';
					print '<td>'.htmlentities($row["std_in"]).'</td>';
					
					print '<td>'.htmlentities($row["counselling"]).'</td>';
					print '<td>'.htmlentities($row["management"]).'</td>';
					print '<td>'.htmlentities($row["late_entry"]).'</td>';
					print '<td>'.htmlentities($row["total"]).'</td>';
					print '<td> <a class= "action-e" href= "?a=edit3&eyearr='.$row["year"].'"><i class="fa fa-wrench" title="Update"></i></a>
					<a class= "action-d" href= "?a='.$_GET['a'].'&did='.$row['year'].'"><i class="fa fa-trash" title="Delete"></i></a></td>';
					print '</tr>';
				}
	
				print '</table>';


    function delete()
        {
            global $cn;
            $sql = "delete from department where year = ".$_GET['did'];
            mysqli_query($cn, $sql);
        }
	
    ?>
     
</div>
