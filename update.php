<?php include("private.php");?><?php include("header.php"); ?>
<?php include("menu.php");?>

<div id="update">

<!--this part for update family-->
<div id="updateFamily">		
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
     <table>
      <tr><td>Enter Old Family ID</td><td><input type="text" size="10" name="parentID"/></td><td>Not Sure Parent ID? Don't Forget <a href="filter.php">SEARCH!</a></td></tr>
      <tr><td>Enter New Family Information</td><td></td><td>Parent First Name </td><td><input type="text" size="10" name="parentFname"/></td><td>Phone </td><td><input type="text" size="10" name="phone"/></td></tr>
      <tr><td></td><td></td><td>Parent Last Name</td><td><input type="text" size="10" name="parentLname"/></td><td>doctor</td>
          <td><SELECT NAME=docName><OPTION VALUE=></OPTION>
	         <?php include("db_include.inc");
			    $mysqli= db_access();
                $sql="SELECT doctors.doctor_id, doctors.name from doctors";
                $res =mysqli_query($mysqli, $sql);
				if (!$res){
				   throw new My_Db_Exception('Database error:'. mysqli_error());
				}
                
                while ($row = mysqli_fetch_array($res))
				{
					  echo"<option value=$row[0]>$row[1]</option>";
	                  
				}?>
		      </SELECT>		
		  </td>
      </tr>
      <tr><td>Enter New Family Address </td><td></td><td>Street</td><td><input type="text" size="10" name="street"/></td>
          <td>Town </td><td><input type="text" size="10" name="town"/></td>
      </tr>
      <tr><td></td><td></td><td>State</td>
          <td>
		     <SELECT NAME=state>
		     <OPTION VALUE=NSW>NSW</OPTION>
		     <OPTION VALUE=QLD>QLD</OPTION>
		     <OPTION VALUE=VIC>VIC</OPTION>
		     <OPTION VALUE=SA>SA</OPTION>
		     <OPTION VALUE=NT>NT</OPTION>
		     <OPTION VALUE=ACT>ACT</OPTION>
		     <OPTION VALUE=WA>WA</OPTION>
		     <OPTION VALUE=TAS>TAS</OPTION>
		     <OPTION VALUE=OTHER>OTHER</OPTION>
		     </SELECT>		
		  </TD>
          <td>Postcode </td><td><input type="text" size="10" name="postcode"/></td></tr>
	  <tr><td><input type=submit  name= 'submitFamily' value='update'/>&nbsp&nbsp<input type=reset   value='reset'/></td>
      </tr>
    </table>
  </form>
</div>

<!--this part for update medicine-->
<div id="updateMedicine">		
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          
    <table>
      <tr><td>Enter Old Medicine ID</td><td><input type="text" size="10" name="medicineID"/>&nbspNot Sure Medicine ID? Don't forget <a href="filter.php">SEARCH!</a></td></tr>
      <tr><td span="2">Enter New Medicine Information</td></tr>
      <tr>
    
         <td>Medicine Name </td><td><input type="text" size="10" name="medName"/></td></tr>
	  <tr><td>Medicine Description </td><td><input type="text" size="50" name="medDescription"/></td></tr>
	  <tr><td><input type=submit  name= 'submitMedicine' value='update'/>&nbsp&nbsp<input type=reset   value='reset'/></td>
      </tr>
    </table>
  </form>
</div>

<!--this part for update Allergies-->
<div id="updateAllergies">		
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          
    <table>
      <tr><td>Enter Old Allergy ID</td><td><input type="text" size="10" name="medicineID"/>&nbspNot Sure Allergy ID? Don't forget <a href="filter.php">SEARCH!</a> </td></tr>
      <tr><td span="2">Enter New Allergy Information</td></tr>
      <tr><td>Allergy Description </td><td><input type="text" size="50" name="medDescription"/></td></tr>
      <tr><td>Symptom </td><td><input type="text" size="50" name="medName"/></td></tr>
	  <tr><td>Dangerous </td><td><input type="text" size="50" name="medName"/></td></tr>
	  <tr><td><input type=submit  name= 'submitMedicine' value='update'/>&nbsp&nbsp<input type=reset   value='reset'/></td><tr>
      </tr>
    </table>
  </form>
</div>

</div>
<?php
if(isset($_POST['submitFamily']))
{
   $parentID = $_POST['parentID'];
   
   $ParentFName = $_POST['parentFname'];
   $ParentLName = $_POST['parentLname'];
   $ParentPhone = $_POST['phone'];
   $docId = $_POST['docName'];
   $Street = $_POST['street'];
   $Town = $_POST['town'];
   $State = $_POST['state'];
   $Postcode = $_POST['postcode'];
	
    if (!$parentID && !$ParentFName && !$ParentLName && !$ParentPhone&& !$Street&& !$Town&& !$State&& !$Postcode&& !$docId) 
    {
	DisplayErrMsg(" Error: please add data\n");
	go_back();
    exit();   
    }

    include_once("db_include.inc");
	$mysqli= db_access();
		
	$query_update_parents ="UPDATE parents SET fname='$ParentFName',lname='$ParentLName',phone='$ParentPhone',doctor_id='$docId' WHERE parents.parent_id='$parentID'";
	$query_update_address ="UPDATE address SET street='$Street',town='$Town',state='$State',postcode='$Postcode' WHERE address.parent_id='$parentID'";
	
	$resultone=mysqli_query($mysqli,$query_update_parents);
	$resulttwo=mysqli_query($mysqli,$query_update_address);
	if($resultone&&$resulttwo){
      echo "You Have updated successfully!";
    }
    else {
    echo "Error!";
    }
    	
}elseif(isset($_POST['submitMedicine']))
{
   $medicineID = $_POST['medicineID'];
   $medicineId = $_POST['medicineId'];
   $medDescription = $_POST['medDescription'];
   $medName = $_POST['medName'];
   	
    if ($medicineID && $medicineId && $medDescription && !$medName) 
    {
	DisplayErrMsg(" Error: please add data\n");
	go_back();
    exit();   
    }

    include_once("db_include.inc");
	$mysqli= db_access();
		
	$query_update_medicines ="UPDATE medicines SET medicine_id='$medicineId',name='$medName',description='$medDescription' WHERE medicine_id='$medicineID'";
	
	$resultone=mysqli_query($mysqli,$query_update_medicines);
	if($resultone){
    	echo "You Have updated successfully!";
    }
    else {
    	echo "Error!";
    }
    
}elseif(isset($_POST['submitMedicine']))
{
   $medicineID = $_POST['medicineID'];
   $medicineId = $_POST['medicineId'];
   $medDescription = $_POST['medDescription'];
   $medName = $_POST['medName'];
   	
    if ($medicineID && $medicineId && $medDescription && !$medName) 
    {
	DisplayErrMsg(" Error: please add data\n");
	go_back();
    exit();   
    }

    include_once("db_include.inc");
	$mysqli= db_access();
		
	$query_update_medicines ="UPDATE medicines SET medicine_id='$medicineId',name='$medName',description='$medDescription' WHERE medicine_id='$medicineID'";
	
	$resultone=mysqli_query($mysqli,$query_update_medicines);
	if($resultone){
      echo "You Have updated successfully!";
    }
    else {
    echo "Error!";
    }
    
}
?><?php include("footer.php");?>
	
	
	
	