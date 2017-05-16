<?php

    require("common.php");
    
    // This variable will be used to re-display the user's username to them in the
    // login form if they fail to enter the correct password.  It is initialized here
    // to an empty value, which will be shown if the user has not submitted the form.
    $submitted_username = '';
    
    // This if statement checks to determine whether the login form has been submitted
    // If it has, then the login code is run, otherwise the form is displayed
    if(!empty($_POST))
    {
        // This query retreives the user's information from the database using
        // their username.
        $query = "SELECT id,username,password,salt,email FROM users WHERE username = :username";
        
        // The parameter values
        $query_params = array(
            ':username' => $_POST['username']
        );
        
        try
        {
            // Execute the query against the database
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code. 
            die("Failed to run query: " . $ex->getMessage());
        }
        
        // This variable tells us whether the user has successfully logged in or not.
        // We initialize it to false, assuming they have not.
        // If we determine that they have entered the right details, then we switch it to true.
        $login_ok = false;
        
        // Retrieve the user data from the database.  If $row is false, then the username
        // they entered is not registered.
        $row = $stmt->fetch();
        if($row)
        {
            // Using the password submitted by the user and the salt stored in the database,
            // we now check to see whether the passwords match by hashing the submitted password
            // and comparing it to the hashed version already stored in the database.
            $check_password = hash('sha256', $_POST['password'] . $row['salt']);
            for($round = 0; $round < 65536; $round++)
            {
                $check_password = hash('sha256', $check_password . $row['salt']);
            }
            
            if($check_password === $row['password'])
            {
                // If they do, then we flip this to true
                $login_ok = true;
            }
        }
        
        // If the user logged in successfully, then we send them to the private members-only page
        // Otherwise, we display a login failed message and show the login form again
        if($login_ok)
        {
            // Here I am preparing to store the $row array into the $_SESSION by
            // removing the salt and password values from it.  Although $_SESSION is
            // stored on the server-side, there is no reason to store sensitive values
            // in it unless you have to.  Thus, it is best practice to remove these
            // sensitive values first.
            unset($row['salt']);
            unset($row['password']);
            
            // This stores the user's data into the session at the index 'user'.
            // We will check this index on the private members-only page to determine whether
            // or not the user is logged in.  We can also use it to retrieve
            // the user's details.
            $_SESSION['user'] = $row;
            
            // Redirect the user to the private members-only page.
            header("Location: mainpage.php");
            die("Redirecting to: mainpage.php");
        }
        else
        {
            // Tell the user they failed
            print("Login Failed.");
            
            // Show them their username again so all they have to do is enter a new
            // password.  The use of htmlentities prevents XSS attacks.  You should
            // always use htmlentities on user submitted values before displaying them
            // to any users (including the user that submitted them).  For more information:
            // http://en.wikipedia.org/wiki/XSS_attack
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
        }
    }
    
?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Padstow Child Care Centre</title>
<link rel="stylesheet" href="css/pa.css" type="text/css"/>
<link rel="stylesheet" href="css/table.css" type="text/css"/>
<link rel="stylesheet" href="css/add.css" type="text/css"/>
<link rel="stylesheet" href="css/menu.css" type="text/css"/>
<!--<script type="text/javascript" src="pa/patable.js?0052"></script>
<script type="text/javascript" src="pa/pactable.js?0015"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>-->
</head>
<body id="body">
    <div id="wrapper">
		<div id="pa-header">
		
		
		
		<div id="pa-header-logo">
			<a href="mainpage.php" title="PCCC Home">
				<img width="100" height="100" src="images/logo.jpg" alt="Padstow Child Care Center">
			</a>
		</div>
			
		<div id = "centreName"><a href="mainpage.php" style="text-decoration:none" title="PCCC">Padstow Child Care Centre</a></div>
			
		<div id="pa-header-navbar">
			<ul>
				<li>
					<a href="mainpage.php" title="PCCC Home">Home</a>
				</li>
				<li>
					<a href="about.php" title="About PCCC">About Us</a>
				</li>
				<li>
					<a href="about.php" title="About PCCC">Philosophy</a>
				</li>
				<li>
					<a href="mainpage.php" title="PCCC Home">Program</a>
				</li>
				<li>
					<a href="mainpage.php" title="PCCC Home">Contact Us</a>
				</li>
			</ul>
		</div></div><?php include("menu.php");?>
<div id="pa-content" >	
	<div id="pa-content-main">
		<!--<div id="life-pic">
			<img width="545" height="368" src="images/child4.jpg" alt="PCCC:our life"/>
		</div>-->
		
        
		<div  id="login-form">
             <form action="login.php" method="post">
                <table border="0">

                <tr><td>Username:&nbsp&nbsp</td><td><input type="text" name="username" value="<?php echo $submitted_username; ?>" /></td></tr>
    
                <tr><td>Password:&nbsp&nbsp</td><td><input type="password" name="password" value="" /></td></tr></br>
                <tr><td></td><td><input type="submit" value="Login" />&nbsp&nbsp&nbsp&nbsp&nbsp<input type="reset" value="clear"/></td></tr>
	            <tr><td colspan="2"><a href="register.php"style="text-decoration: none;">New User Click Here To Register (only demo)</a></td></tr>
	            </table>
              </form>
		</div>
		
		<div id="context">
		<p>collaborative relationships &nbsp&nbsp&nbsp environmental exploration &nbsp&nbsp&nbsp   creative expression</p>
        </div>
        <div id="pa-pic">
			<img width="330" height="240" src="images/child1.jpg" alt="our life" id="rotator"/>
			<!--<img width="200" height="154" src="images/child2.jpg" alt="our life"/>
			<img width="200" height="154" src="images/child3.jpg" alt="our life"/>-->
			
		</div>
        
     </div>
</div>
<?php include("footer.php");?>
