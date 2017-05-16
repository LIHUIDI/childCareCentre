<?php include("private.php");?><?php include("header.php"); ?><?php include("menu.php");?><?php include("caption.php");?>
<div id="pa-content-main">
	<div id="pa-content-main-inner">
		<form action="delete.php" method="post">
            <table class="pa-table">
               <thead class="familythead"><tr><th class="familyth_1">Parent ID</th><th class="familyth_2">First Name</th><th class="familyth_3">Last Name</th><th class="familyth_4">Phone</th><th class="familyth_5">Address</th><th class="familyth_6">Child's Name</th></tr></thead>
               <?php
				include("db_include.inc");
			    $mysqli= db_access();
                $sql="SELECT parents.parent_id, parents.fname, parents.lname, parents.phone, address.street, address.town, address.state, address.postcode, children.name from parents JOIN address ON parents.parent_id= address.parent_id JOIN children ON children.parent_id = parents.parent_id ";
                $res =mysqli_query($mysqli, $sql);
				if (!$res){
				   throw new My_Db_Exception('Database error:'. mysqli_error());
				}
                echo" <tbody class='familytbody'>";
				
                while ($row = mysqli_fetch_array($res))
				{
                      echo"<tr>";
					  echo"<td class='familycol_1'>$row[0]</td>";
	                 // echo"<input type='hidden' name='parentID[]' value='$row[0]'/>";
					  echo"<td class='familycol_2'>$row[1]</td>";
	                  echo"<td class='familycol_3'>$row[2]</td>";
	                  echo"<td class='familycol_4'>$row[3]</td>";
	                  echo"<td class='familycol_5'>$row[4],&nbsp$row[5]&nbsp$row[6]&nbsp$row[7]</td>";
	                  echo"<td class='familycol_6'>$row[8]</td>";
					 // echo"<td class='familycol_7'><input type='checkbox' name='selection[]' value='$x'/></td>";
					  echo"</tr>";
					  
				}
				echo "</tbody>";
			  ?>
			</table>
		</form>
	</div>
</div><?php include("footer.php");?>