<?php include("private.php");?><?php include("header.php");?>
<?php include("menu.php");?><?php include("caption.php");?>	
	
	<div id="pa-content" >	
		<div id="pa-content-main">
			<div id="pa-content-main-inner">
              <table class='pa-table'>
				
			
				<thead id="paythead"><tr><th class="payth_1">Family ID</th><th class="payth_2">First Name</th><th class="payth_3">Last Name</th><th class="payth_4">Phone</th><th class="payth_5">Address</th><th class="payth_6">Paid Amount</th><th class="payth_7">Due Amount</th><th class="payth_8">Due Date</th></tr></thead>
               
				<?php
					include("db_include.inc");
					$mysqli= db_access();
					$sql="SELECT parents.parent_id,parents.fname, parents.lname, parents.phone, address.street, address.town, address.state, address.postcode, payments.paid_amount,payments.due_amount, payments.due_date FROM parents JOIN address ON parents.parent_id = address.parent_id JOIN payments ON parents.parent_id = payments.parent_id WHERE paid_amount < due_amount AND due_date< CURDATE()";
					$res =mysqli_query($mysqli, $sql);
					if (!$res){
					   throw new My_Db_Exception('Database error:'. mysqli_error());
					}
					echo" <tbody id='paytbody'>";
					while ($row = mysqli_fetch_array($res))
					{
						  echo"<tr id='$row[0]'>";
						  echo"<td class='paycol_1'>$row[0]</td>";
						  echo"<td class='paycol_2'>$row[1]</td>";
						  echo"<td class='paycol_3'>$row[2]</td>";
						  echo"<td class='paycol_4'>$row[3]</td>";
						  echo"<td class='paycol_5'>$row[4],&nbsp$row[5]&nbsp$row[6]&nbsp$row[7]</td>";
						  echo"<td class='paycol_6'>$row[8]</td>";
						  echo"<td class='paycol_7'>$row[9]</td>";
						  echo"<td class='paycol_8'>$row[10]</td>";
						  
						  echo"</tr>";
					}
					echo "</tbody>";
				?>
			    
			  </table>
			</div>
		</div>
	</div>
<?php include("footer.php");?>

