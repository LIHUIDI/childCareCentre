<?php include("private.php");?>
<?php include("header.php");?>
<?php include("menu.php");?>
<div id="add">
	
<!--this part for add family-->
	<div id="add-fmaily">	
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <table>
           <tr><td>Parent First Name </td><td><input type="text" size="10" name="parentFname"/></td>
               <td>Parent Last Name </td><td><input type="text" size="10" name="parentLname"/></td>
           </tr>
           <tr><td>Phone </td><td><input type="text" size="10" name="phone"/></td><td>doctor</td>
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
	                  
				         }mysqli_close($mysqli);
				    ?>
		           </SELECT>		
		       </td>
           </tr>
           <tr><td>Street </td><td><input type="text" size="10" name="street"/></td>
               <td>Town </td><td><input type="text" size="10" name="town"/></td>
           </tr>
           <tr><td>State </td><td>
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
		      </td>
              <td>Postcode </td><td><input type="text" size="10" name="postcode"/></td><td></td></tr>
	      <tr><td><input type=submit  name= 'submitFamily' value='submit family'/>&nbsp<input type=reset value='reset'></td>
          </tr>
      </table>
   </form>
</div>

<!--this part for add child-->
<div id="add-child">
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
     <table>  
        <tr><td>Child Name </td><td><input type="text" size="10" name="childname"/></td>
	        <td>Child Birthday </td><td><input type="text" size="10" name="birthday"/></td>
	        <td>Gender <SELECT NAME=gender>
		               <OPTION VALUE=></OPTION>
		               <OPTION VALUE=fmale>Fmale</OPTION>
		               <OPTION VALUE=male>Male</OPTION></td></tr>
       <tr><td>Employee On Duty</td><td>
               <SELECT NAME=empName><OPTION VALUE=></OPTION>
	           <?php //include("db_include.inc");
			         $mysqli= db_access();
                     $sql="SELECT employee.employee_id, employee.name from employee where employee.duty='on'";
                     $res =mysqli_query($mysqli, $sql);
				     if (!$res){
				        throw new My_Db_Exception('Database error:'. mysqli_error());
				     }
                     while ($row = mysqli_fetch_array($res))
				     {
					  echo"<option value=$row[0]>$row[1]</option>";
	                  
				     }mysqli_close($mysqli);
				?>
		       </SELECT>		
		   </td>
		   <td>Parent ID</td><td><input type="text" size="10" name="childParentId"/></td><td>Not Sure The Child's Parent? Don't Forget <a href="filter.php">SEARCH!</a></td></tr>
       <tr><td><input type=submit  name= 'submitChild' value='submitChild'/><input type=reset value='reset'/></td>
       </tr>
    </table>
  </form>
</div>

<!--this part for add payment-->
<div id="add-payment">
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
     <table> 
        <tr><td>Due Amount</td><td> <input type="text" size="10" name="dueAmount"/></td>
	        <td>Due Day</td><td>
	        <select name=DueDay>
	        <OPTION VALUE=>day</OPTION>
            <?php		
		      for ($i = 1; $i < 32; $i++)
              {
	             printf("<OPTION VALUE=\"%s\">%s</OPTION>\n", $i, $i);    
              }
		      printf(" </SELECT>
	                   <SELECT NAME=DueMonth>
                       <OPTION VALUE=>month</OPTION>
                       <OPTION VALUE=01>January</OPTION>
                       <OPTION VALUE=02>February</OPTION>
                       <OPTION VALUE=03>March</OPTION>
                       <OPTION VALUE=04>April</OPTION>
                       <OPTION VALUE=05>May</OPTION>
                       <OPTION VALUE=06>June</OPTION>
                       <OPTION VALUE=07>July</OPTION>
                       <OPTION VALUE=08>August</OPTION>
                       <OPTION VALUE=09>September</OPTION>
                       <OPTION VALUE=10>October</OPTION>
                       <OPTION VALUE=11>November</OPTION>
                       <OPTION VALUE=12>December</OPTION>
                       </SELECT>

                       <SELECT NAME=DueYear>
                       <OPTION VALUE=>year</OPTION>");
                       for ($i = 2012; $i < 3000; $i++)
                       {
                          printf("<OPTION VALUE=%s>%s</OPTION>\n", $i, $i); 
                       }
            ?>
            </SELECT></td>
        </tr>
        <tr><td>Paid Amount </td><td><input type="text" size="10" name="paidAmount"/></td>
	        <td>Paid Day</td><td>
	        <select name=PaidDay>
	        <OPTION VALUE=>day</OPTION>
	        <?php
		      for ($i = 1; $i < 32; $i++)
              {
	             printf("<OPTION VALUE=\"%s\">%s</OPTION>\n", $i, $i);    
              }
		      printf("  </SELECT>
					    <SELECT NAME=PaidMonth>
					    <OPTION VALUE=>month</OPTION>
					    <OPTION VALUE=01>January</OPTION>
					    <OPTION VALUE=02>February</OPTION>
					    <OPTION VALUE=03>March</OPTION>
						<OPTION VALUE=04>April</OPTION>
						<OPTION VALUE=05>May</OPTION>
						<OPTION VALUE=06>June</OPTION>
						<OPTION VALUE=07>July</OPTION>
						<OPTION VALUE=08>August</OPTION>
						<OPTION VALUE=09>September</OPTION>
						<OPTION VALUE=10>October</OPTION>
						<OPTION VALUE=11>November</OPTION>
						<OPTION VALUE=12>December</OPTION>
						</SELECT>
					
						<SELECT NAME=PaidYear>
						<OPTION VALUE=>year</OPTION>");
						
              for ($i = 2012; $i < 3000; $i++)
              {
                 printf("<OPTION VALUE=%s>%s</OPTION>\n", $i, $i); 
              }
	        ?>
            </SELECT></td></tr>
         <tr><td></td><td></td><td>Parent ID</td><td><input type="text" size="10" name="payParentId"/>&nbsp&nbspNot Sure Who's Payment? Don't Forget <a href="filter.php">SEARCH!</a></td></tr>
         <tr><td><input type=submit  name= 'submitPay' value='submit pay'/><input type=reset value='reset'/></td>
         </tr>
     </table>
   </form>
</div>

<!--this part for add subject-->
<div id="add-subject" >
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
     <table> 
        <tr><td>Description </td><td><input type="text" size="10" name="actDescription"/></td>
	        <td>Material </td><td><input type="text" size="10" name="actMaterial"/></td><td>Employee On Duty</td>
	        <td><SELECT NAME=empName><OPTION VALUE=></OPTION>
	              <?php 
	                //include("db_include.inc");
			        $mysqli= db_access();
                    $sql="SELECT employee.employee_id, employee.name from employee where employee.duty='on'";
                    $res =mysqli_query($mysqli, $sql);
				    if (!$res)
				    {
				        throw new My_Db_Exception('Database error:'. mysqli_error());
				    }
                
                    while ($row = mysqli_fetch_array($res))
				    {
					    echo"<option value=$row[0]>$row[1]</option>";
	                  
				    }
				    mysqli_close($mysqli);
				  ?>
		       </SELECT>		
		   </td>
	   <tr><td>Location </td><td><input type="text" size="10" name="actLocation"/></td>
	       <td>Day </td><td><select name=actDay>
	           <OPTION VALUE=>day</OPTION>
                  <?php		
		            for ($i = 1; $i < 32; $i++)
                    {
	                   printf("<OPTION VALUE=\"%s\">%s</OPTION>\n", $i, $i);    
                    }
		            printf(" </SELECT>
	                        <SELECT NAME=actMonth>
							<OPTION VALUE=>month</OPTION>
							<OPTION VALUE=01>January</OPTION>
							<OPTION VALUE=02>February</OPTION>
							<OPTION VALUE=03>March</OPTION>
							<OPTION VALUE=04>April</OPTION>
							<OPTION VALUE=05>May</OPTION>
							<OPTION VALUE=06>June</OPTION>
							<OPTION VALUE=07>July</OPTION>
							<OPTION VALUE=08>August</OPTION>
							<OPTION VALUE=09>September</OPTION>
							<OPTION VALUE=10>October</OPTION>
							<OPTION VALUE=11>November</OPTION>
							<OPTION VALUE=12>December</OPTION>
							</SELECT>
                            <SELECT NAME=actYear>
                            <OPTION VALUE=>year</OPTION>");
                    for ($i = 2012; $i < 3000; $i++)
                    {
                        printf("<OPTION VALUE=%s>%s</OPTION>\n", $i, $i); 
                    }
                  ?>
               </SELECT></td><td>Time </td>
               <td><select name=hour>
	               <OPTION VALUE=>hour</OPTION>
                   <?php		
		             for ($i = 0; $i < 24; $i++)
                     {
	                     printf("<OPTION VALUE=\"%s\">%s</OPTION>\n", $i, $i);    
                     }
                   ?>
		            </SELECT>
	
	           <SELECT NAME=min>
               <OPTION VALUE=>min</OPTION>
                   <?php		
		             for ($i = 0; $i < 60; $i++)
                     {
	                     printf("<OPTION VALUE=\"%s\">%s</OPTION>\n", $i, $i);    
                     }
                   ?>
              </SELECT>
              </td></tr>
          <tr><td><input type=submit  name= 'submitSubject' value='submit subject'/></td><td><input type=reset value='reset'/></td>
          </tr>
       </table>
    </form>
  </div>
  
</div>

<?php
if(isset($_POST['submitFamily']))
{
   
   $ParentFName = $_POST['parentFname'];
   $ParentLName = $_POST['parentLname'];
   $ParentPhone = $_POST['phone'];
   $doctorID= $_POST['docName'];
   $Street = $_POST['street'];
   $Town = $_POST['town'];
   $State = $_POST['state'];
   $Postcode = $_POST['postcode'];
	
    if (!$ParentId && !$ParentFName && !$ParentLName && !$ParentPhone&& !$doctorID&&!$Street&& !$Town&& !$State&& !$Postcode&& !$AddressId) 
    {
	DisplayErrMsg(" Error: please add data\n");
	go_back();
    exit();   
    }

    include_once("db_include.inc");
	$mysqli= db_access();
	
	$query_insert_parents ="insert into parents(fname,lname,phone,doctor_id) values('$ParentFName','$ParentLName','$ParentPhone','$doctorID')";
	$resultone=mysqli_query($mysqli,$query_insert_parents);
	
	
	//get the last id after insert
	$parentID= mysqli_insert_id($mysqli);
	
	
    $query_insert_address ="insert into address (street,town,state,postcode,parent_id) values('$Street','$Town','$State','$Postcode','$parentID')";
	$resulttwo=mysqli_query($mysqli,$query_insert_address);
	if($resultone&&$resulttwo){
      echo "You Have Added successfully!";
    }
    else {
    echo "Error!";
    }
    mysqli_close($mysqli);	
	
} elseif(isset($_POST['submitChild']))
{
   
   $ChildName = $_POST['childname'];
   $Birthday = $_POST['birthday'];
   $Gender = $_POST['gender'];
   $ChildParentId = $_POST['childParentId'];
   $ChildEmployeeId = $_POST['empName'];
   
    if (!$ChildName && !$Birthday && !$Gender&& !$ChildParentId&& !$ChildEmployeeId) 
    {
	DisplayErrMsg(" Error: please add data\n");
	go_back();
    exit();   
    }

    include_once("db_include.inc");
	$mysqli= db_access();
	
	$query_insert_children ="insert into children(name,birthday,gender,parent_id,employee_id) values('$ChildName','$Birthday','$Gender','$ChildParentId','$ChildEmployeeId')";
	
	$resultone=mysqli_query($mysqli,$query_insert_children);
	
	if($resultone){
      echo "You Have Added $ChildName successfully!";
    }
    else {
    echo "Error!";
   
    }
    mysqli_close($mysqli);
    
}else if(isset($_POST['submitPay']))
{

   $PayParentId = $_POST['payParentId'];
   $DueAmount = $_POST['dueAmount'];
   $DueDay = $_POST['DueDay'];
   $DueMonth = $_POST['DueMonth'];
   $DueYear = $_POST['DueYear'];
   $PaidAmount = $_POST['paidAmount'];
   $PaidDay = $_POST['PaidDay'];
   $PaidMonth = $_POST['PaidMonth'];
   $PaidYear = $_POST['PaidYear'];
   $DueDate = $DueYear."-".$DueMonth."-".$DueDay;
   $PaidDate =$PaidYear."-".$PaidMonth."-".$PaidDay;
   
   if (!$PayId && !$DueAmount && !$DueDate && !$PaidAmount&& !$PaidDate) 
    {
	DisplayErrMsg(" Error: please add data\n");
	go_back();
    exit();   
    }

    include_once("db_include.inc");
	$mysqli= db_access();
	
	$query_insert_pay ="insert into payments(parent_id,due_date,paid_date,due_amount,paid_amount) values('$PayParentId','$DueDate','$PaidDate','$DueAmount','$PaidAmount')";
	
	$resultone=mysqli_query($mysqli,$query_insert_pay);
	
	if($resultone){
      echo "You Have Added Payment successfully!";
    }
    else {
    echo "Error!";
   
    }
    mysqli_close($mysqli);
    
}elseif(isset($_POST['submitSubject']))
{
   
   $ActDescription = $_POST['actDescription'];
   $ActMaterial = $_POST['actMaterial'];
   $ActStaffID = $_POST['empName'];
   $ActLocation = $_POST['actLocation'];
   $ActDay = $_POST['actDay'];
   $ActMonth = $_POST['actMonth'];
   $ActYear = $_POST['actYear'];
   $Hour = $_POST['hour'];
   $Min = $_POST['min'];
   $ActDate=$ActYear."-".$ActMonth."-".$ActDay;
   $Time=$Hour.":".$Min;
	if (!$ActDescription && !$ActMaterial && !$ActStaffID&& !$ActLocationd&& !$ActDate&& !$Time) {
		DisplayErrMsg(" Error: please add data\n");
		go_back();
    	exit();   
    }
    include_once("db_include.inc");
	$mysqli= db_access();
	$query_insert_activity ="insert into activity(location,date,time,material_required,description,employee_id) values('$ActLocation','$ActDate','$Time','$ActMaterial','$ActDescription','$ActStaffID')";
	$resultone=mysqli_query($mysqli,$query_insert_activity);
	if ($resultone) {
      echo "You Have Added successfully!";
    }
    else {
    echo "Error!";
    }
    mysqli_close($mysqli);
    
}
?><?php include("footer.php");?>