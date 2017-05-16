<?php include("private.php");?><?php include("header.php"); ?>
<?php include("menu.php");?><?php include("caption.php");?>	
<div id="pa-content" >	
		<div id="pa-content-main">
			<div id="pa-content-main-inner">
                <table class='pa-table'>
				   <thead id="childthead"><tr><th class="childth_1">Child ID</th><th class="childth_2">Child Name</th><th class="childth_3">Birthday</th><th class="childth_4">Gender</th><th class="childth_5">Doctor Name</th><th class="childth_6">Doctor Phone</th></tr></thead>
			       <?php
					include("db_include.inc");
					$mysqli= db_access();
					$sql="SELECT children.child_id, children.name, children.birthday, children.gender, doctors.name, doctors.phone FROM parents JOIN children ON parents.parent_id= children.parent_id  JOIN doctors ON parents.doctor_id= doctors.doctor_id";
					$res =mysqli_query($mysqli, $sql);
					if (!$res){
					   throw new My_Db_Exception('Database error:'. mysqli_error());
					}
					echo" <tbody id='childtbody'>";
					while ($row = mysqli_fetch_array($res))
					{
						  echo"<tr id='$row[0]'>";
						  echo"<td class='childcol_1'>$row[0]</td>";
						  echo"<td class='childcol_2'>$row[1]</td>";
						  echo"<td class='childcol_3'>$row[2]</td>";
						  echo"<td class='childcol_4'>$row[3]</td>";
						  echo"<td class='childcol_5'>$row[4]</td>";
						  echo"<td class='childcol_6'>$row[5]</td>";
						  echo"</tr>";
					}
					echo "</tbody>";
			      ?>
			   </table>
			</div>
	     </div>
</div>
<?php include("footer.php");?>