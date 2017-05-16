<?php
    function db_access()
{	$host="localhost";
    $user="root";
    $pwd="";
    $db="mydb";
    $mysqli=mysqli_connect($host,$user,$pwd,$db);
	return $mysqli;
}
?>