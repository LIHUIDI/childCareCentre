<?php include("private.php");?><?php include("header.php"); ?><?php include("menu.php");?>
<div class="action">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	
		<div>
		Search&nbsp
		<SELECT NAME=ChooseSearch>
		<OPTION VALUE=1>Family</OPTION>
		<OPTION VALUE=2>Allergy</OPTION>
		<OPTION VALUE=3>Medicine</OPTION>
		</SELECT>
		</div>
		
		<div class='pa-table-filter'>
			ID</br>
			<input type=text id='pa-table-filter-id' class='pa-table-filter-input' name='id'/>
		</div>
		
		<div class='pa-table-filter'>
			First Name</br>
			<input type=text id='pa-table-filter-fname' class='pa-table-filter-input' name='fname'/>
		</div>
		
		<div class='pa-table-filter'>
			Last Name</br>
			<input type=text id='pa-table-filter-lname' class='pa-table-filter-input' name='lname'/>
		</div>
		
		<div class='pa-table-searchbar'>					
			<input type=submit  class='pa-seachbutton' value='Find'/>
		</div>
						
	</form>
		<div class='pa-table-operations'>
			<div class='pa-table-operations-element'>
				<a href='update.php' id='pa-table-update'  title='Update Record'>
					<img width='22' height='22' src='images/edit.png' alt='edit'>
				</a>
			</div>
							
			<div class='pa-table-operations-element'>
				<a href='add.php' id='pa-table-add'  title='Add Record'>
					<img width='22' height='22' src='images/add.jpg' alt='add'>
				</a>
			</div>
		</div>
</div>

<div id="pa-content-main">
	<div id="pa-content-main-inner">
			
<?php

$ParentId = $_POST['id'];
$ParentFName = $_POST['fname'];
$ParentLName = $_POST['lname'];
$SearchOption = $_POST['ChooseSearch'];

if($SearchOption==1)
{
    if (!$ParentId && !$ParentFName && !$ParentLName) 
    {
	//Error(" Error: At least one search criteria should be present\n");
	//go_back();
    	exit();   
    }
    // $searchStmt is the General SQL stmt
    $searchStmt = "SELECT parents.parent_id, parents.fname, parents.lname, parents.phone, address.street, address.town, address.state, address.postcode, children.name from parents JOIN address ON parents.parent_id= address.parent_id JOIN children ON children.parent_id = parents.parent_id where ";
    if ($ParentId)
    {
    	$searchStmt .= "parents.parent_id = '$ParentId'";
	}
	if ($ParentFName)
    {
	    $ParentFName = strtolower($ParentFName);
    	$searchStmt .= "LCASE(parents.fname) like '%$ParentFName%'";
	}
	if ($ParentLName)
    {
	    $ParentLName = strtolower($ParentLName);
    	$searchStmt .= "LCASE(parents.lname) like '%$ParentLName%'";
	}
	$stmt= substr($searchStmt, 0, strlen($searchStmt));
    $stmt = $stmt . " order by parents.parent_id desc";
	
	include_once("db_include.inc");
	$mysqli= db_access();
	
	$res =mysqli_query($mysqli,$stmt);
	if (!$res){
				   throw new My_Db_Exception('Database error:'. mysqli_error());
				}
				echo"<form action='delete.php' method='post'>";
                echo"<table class='pa-table'>";
                echo"<thead class='familythead'><tr><th class='familyth_1'>Parent ID</th><th class='familyth_2'>First Name</th><th class='familyth_3'>Last Name</th><th class='familyth_4'>Phone</th><th class='familyth_5'>Address</th><th class='familyth_6'>Child's Name</th><th class='familyth_7'>Select</th></tr></thead>";
                
                
                echo" <tbody class='familytbody'>";
				$x=0;
                while ($row = mysqli_fetch_array($res))
				{
                      echo"<tr>";
					  echo"<td class='familycol_1'>$row[0]</td>";
	                  echo"<input type='hidden' name='parentID[]' value='$row[0]'/>";
					  echo"<td class='familycol_2'>$row[1]</td>";
	                  echo"<td class='familycol_3'>$row[2]</td>";
	                  echo"<td class='familycol_4'>$row[3]</td>";
	                  echo"<td class='familycol_5'>$row[4],&nbsp$row[5]&nbsp$row[6]&nbsp$row[7]</td>";
	                  echo"<td class='familycol_6'>$row[8]</td>";
					  echo"<td class='familycol_7'><input type='checkbox' name='selection[]' value='$x'/></td>";
					  echo"</tr>";
					  $x++;
				}
			   echo "</tbody>";
	           echo"</table>";
			   echo"<div id='actionbottom'>";
			   echo"<input type='submit' name='delete' value='delete'/>&nbsp<input type='reset' value='clear'></br>";
			
			   echo"</div>";
			   echo"</form>";
			   mysqli_close($mysqli);
}elseif($SearchOption==2)
{

	if (!$ParentId && !$ParentFName && !$ParentLName) 
    {
	//Error(" Error: At least one search criteria should be present\n");
	//go_back();
    	exit();   
    }
    // $searchStmt is the General SQL stmt
    $searchStmt = "SELECT allergies.allergy_code, allergies.description from allergies where ";
    if ($ParentId)
    {
    	$searchStmt .= "allergies.allergy_code = '$ParentId'";
	}
	if ($ParentFName)
    {
	    $ParentFName = strtolower($ParentFName);
    	$searchStmt .= "LCASE(allergies.description) like '%$ParentFName%'";
	}
	if ($ParentLName)
    {
	    $ParentLName = strtolower($ParentLName);
    	$searchStmt .= "LCASE(allergies.description) like '%$ParentLName%'";
	}
	$stmt= substr($searchStmt, 0, strlen($searchStmt));
    $stmt = $stmt . " order by allergies.allergy_code desc";
	
	include_once("db_include.inc");
	$mysqli= db_access();
	
	$res =mysqli_query($mysqli,$stmt);
	if (!$res){
				   throw new My_Db_Exception('Database error:'. mysqli_error());
				}
				echo"<form action='delete.php' method='post'>";
                echo"<table class='pa-table'>";
                echo"<thead class='familythead'><tr><th class='familyth_1'>Allergy ID</th><th class='familyth_2'>Allergy Name</th><th class='familyth_7'>Select</th></tr></thead>";
                
                
                echo" <tbody class='familytbody'>";
				$x=0;
                while ($row = mysqli_fetch_array($res))
				{
                      echo"<tr>";
					  echo"<td class='familycol_1'>$row[0]</td>";
	                  echo"<input type='hidden' name='parentID[]' value='$row[0]'/>";
					  echo"<td class='familycol_2'>$row[1]</td>";
					  echo"<td class='familycol_7'><input type='checkbox' name='selection[]' value='$x'/></td>";
					  echo"</tr>";
					  $x++;
				}
				echo "</tbody>";
	            echo"</table>";
			    echo"<div id='actionbottom'>";
			    echo"<input type='submit' name='delete' value='delete'/>&nbsp<input type='reset' value='clear'></br>";
			
			    echo"</div>";
			    echo"</form>";
			    mysqli_close($mysqli);
			
}elseif($SearchOption==3){

	if (!$ParentId && !$ParentFName && !$ParentLName) 
    {
	//Error(" Error: At least one search criteria should be present\n");
	//go_back();
    	exit();   
    }
    // $searchStmt is the General SQL stmt
    $searchStmt = "SELECT medicines.medicine_id,medicines.name from medicines where ";
    if ($ParentId)
    {
    	$searchStmt .= "medicines.medicine_id = '$ParentId'";
	}
	if ($ParentFName)
    {
	    $ParentFName = strtolower($ParentFName);
    	$searchStmt .= "LCASE(medicines.name) like '%$ParentFName%'";
	}
	if ($ParentLName)
    {
	    $ParentLName = strtolower($ParentLName);
    	$searchStmt .= "LCASE(medicines.name) like '%$ParentLName%'";
	}
	$stmt= substr($searchStmt, 0, strlen($searchStmt));
    $stmt = $stmt . " order by medicines.medicine_id desc";
	
	include_once("db_include.inc");
	$mysqli= db_access();
	
	$res =mysqli_query($mysqli,$stmt);
	if (!$res){
				   throw new My_Db_Exception('Database error:'. mysqli_error());
				}
				echo"<form action='delete.php' method='post'>";
                echo"<table class='pa-table'>";
                echo"<thead class='familythead'><tr><th class='familyth_1'>medicine ID</th><th class='familyth_2'>Medicine Name</th><th class='familyth_7'>Select</th></tr></thead>";
                
                
                echo" <tbody class='familytbody'>";
				$x=0;
                while ($row = mysqli_fetch_array($res))
				{
                      echo"<tr>";
					  echo"<td class='familycol_1'>$row[0]</td>";
	                  echo"<input type='hidden' name='parentID[]' value='$row[0]'/>";
					  echo"<td class='familycol_2'>$row[1]</td>";
					  echo"<td class='familycol_7'><input type='checkbox' name='selection[]' value='$x'/></td>";
					  echo"</tr>";
					  $x++;
				}
				echo "</tbody>";
	           echo"</table>";
			echo"<div id='actionbottom'>";
			echo"<input type='submit' name='delete' value='delete'/>&nbsp<input type='reset' value='clear'></br>";
			
			echo"</div>";
			echo"</form>";
			mysqli_close($mysqli);
			
}
?>
</div>
</div><?php include("footer.php");?>
