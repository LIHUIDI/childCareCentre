
<div id="pa-footer">
		
		<div id="pa-footer-logo">
			<a href="http://padstowchild.com.au" title="PCCC Home">
				<img width="65" height="65" src="images/logo.jpg" alt="PCCC: telecoms components">
			</a>
		</div>
		<div id= "pa-footer-address-abn">		
			<div id = "pa-address">44 Pitt RD, Padstow NSW 2211<BR>TEL 02 9819 1115 </div>
			<div id = "pa-abn">(ABN 60 001 693 141)</div>
		</div>
		<div id="pa-footer-navbar">
		<ul>
		        <li>
					<a href="mainpage.php" title="PCCC Home">Copyright</a>
				</li>
				<li>
					<a href="about.php" title="About PCCC">Privacy</a>
				</li>
				<li>
					<a href="about.php" title="About PCCC">Disclaimer</a>
				</li>
				<li>
					<a href="mainpage.php" title="PCCC Home">Contact Us</a>
				</li>
		</ul>
		</div>
		
		
	</div>
	</div>
	
	<script type="text/javascript">
(function() {
	    var rotator = document.getElementById('rotator');  
        var imageDir = 'images/';                              
        var delayInSeconds = 5;                            
        var images = ['child2.jpg', 'child3.jpg','child1.jpg'];
	    
	    var num = 0;
        var changeImage = function() {
	        var len = images.length;
	        rotator.src = imageDir + images[num++];
        if (num == len) {
            num = 0;
        }
    };
    	    setInterval(changeImage, delayInSeconds * 1000);
	})();
	</script>
	
</body>

<script>
$(function(){
	var mypatable = new patable();
	var mypachildtable = new pactable();
	mypatable.bindEvents("/pccc/", mypachildtable);
	
 });
</script>
</html>