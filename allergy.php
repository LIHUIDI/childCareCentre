<?php include("private.php");?><?php include("header.php"); ?>
<?php include("menu.php");?><?php include("caption.php");?>	
<div id="pa-content" >	
    <div id="pa-content-main">
        <div id="pa-content-main-inner">
            <table class='pa-table'>
               <thead id="allergythead"><tr><th class="allergyth_1">Allergy ID</th><th class="allergyth_2">Child ID</th><th class="allergyth_3">Child Name</th><th class="allergyth_4">Parent Name</th><th class="allergyth_5">Parent Phone</th><th class="allergyth_6">Doctor Name</th><th class="allergyth_7">Doctor Phone</th></tr></thead>
               <?php
				include("db_include.inc");
				$mysqli= db_access();
				$sql="SELECT allergies.allergy_code, children.child_id, children.name,parents.fname, parents.lname, parents.phone,doctors.name, doctors.phone FROM allergies, children,parents,doctors, children_has_allergies WHERE parents.parent_id= children.parent_id AND parents.doctor_id= doctors.doctor_id AND allergies.allergy_code=children_has_allergies.allergy_code AND children.child_id=children_has_allergies.child_id";
			
				$res =mysqli_query($mysqli, $sql);
				if (!$res){
					throw new My_Db_Exception('Database error:'. mysqli_error());
				}
				echo" <tbody id='allergytbody'>";
				while ($row = mysqli_fetch_array($res))
				{
					echo"<tr id='$row[0]'>";
					echo"<td class='allergycol_1'>$row[0]</td>";
					echo"<td class='allergycol_2'>$row[1]</td>";
					echo"<td class='allergycol_3'>$row[2]</td>";
					echo"<td class='allergycol_4'>$row[3]&nbsp$row[4]</td>";
					echo"<td class='allergycol_5'>$row[5]</td>";
					echo"<td class='allergycol_6'>$row[6]</td>";
					echo"<td class='allergycol_7'>$row[7]</td>";
					echo"</tr>";
				}
				echo "</tbody>";
				mysqli_close($mysqli);
               ?>
            </table>
         </div>
    </div>
</div>
<?php include("footer.php");?>