<!DOCTYPE html>
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
		</div>
		<div id="welcome-msg">
Hello <?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>, Welcome!
<a href="logout.php" style="text-decoration: none;">Logout</a> Or
<a href="edit_account.php" style="text-decoration: none;">Edit Account</a>
</div>
		<!--<div id="life-pic3"><img width="300" height="50" src="images/child6.jpg" alt="PCCC:our life"/></div>--></div>