<?php include("private.php");?><?php include("header.php"); ?>
<?php include("menu.php");?><?php include("caption.php");?>
<div id="pa-content" >	
	<div id="pa-content-main">
		<div id="pa-content-main-inner">
            <table class='pa-table'>
				<thead id="docthead"><tr><th class="docth_1">Doctor ID</th><th class="docth_2">Doctor Name</th><th class="docth_3">Parent First Name</th><th class="docth_4">Parents Last Name</th><th class="docth_5">Family Phone</th><th class="docth_6">Family Address</th></tr></thead>
			    <?php
					include("db_include.inc");
					$mysqli= db_access();
					$sql="SELECT doctors.doctor_id, doctors.name,parents.fname, parents.lname,parents.phone,address.street,address.town,address.state,address.postcode FROM parents JOIN doctors ON parents.doctor_id = doctors.doctor_id JOIN address ON parents.parent_id = address.parent_id";
					$res =mysqli_query($mysqli, $sql);
					if (!$res){
					   throw new My_Db_Exception('Database error:'. mysqli_error());
					}
					echo" <tbody id='doctbody'>";
					while ($row = mysqli_fetch_array($res))
					{
						  echo"<tr id='$row[0]'>";
						  echo"<td class='doccol_1'>$row[0]</td>";
						  echo"<td class='doccol_2'>$row[1]</td>";
						  echo"<td class='doccol_3'>$row[2]</td>";
						  echo"<td class='doccol_4'>$row[3]</td>";
						  echo"<td class='doccol_5'>$row[4]</td>";
						  echo"<td class='doccol_6'>$row[5],&nbsp$row[6]&nbsp$row[7]&nbsp$row[8]</td>";
						  echo"</tr>";
					}
					echo "</tbody>";
			    ?>
			    
			</table>
		  </div>
	</div>
</div>
<?php include("footer.php");?>