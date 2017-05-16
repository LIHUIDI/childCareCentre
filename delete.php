<?php
if(isset($_POST['delete']))
{
    $selection = $_POST['selection'];
    $parentID = $_POST['parentID'];
	
    if (!$selection) 
    {
	DisplayErrMsg(" Error: please select\n");
	go_back();
    exit();   
    }

    include_once("db_include.inc");
	$mysqli= db_access();
	
	for($x=0;$x<count($selection);$x++)
	{
	  $index=$selection[$x];
	  $parent=$parentID[$index];
	
	  $query_delete_parents ="DELETE FROM parents WHERE parent_id='$parent'";
	
	  $resultone=mysqli_query($mysqli,$query_delete_parents);
	
	  if($resultone)
	  {
        echo "You Have Delete the family successfully!";
      }
      else 
      {
       echo "Error!";
      }
    }
    
    mysqli_close($mysqli);	
	
}?>