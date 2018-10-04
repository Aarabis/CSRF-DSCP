<?php
	
	if(isset($_POST['username'],$_POST['password'])){
		$uname = $_POST['username'];
		$pwd = $_POST['password'];
		
		if($uname == 'admin' && $pwd == 'admin123'){
			echo "<h2>";
			echo 'You have Successfully logged in!';
			echo "</h2>";			
			
			session_start();
			$_SESSION['csfr_token'] = base64_encode(openssl_random_pseudo_bytes(32));
			$session_id = session_id();
			setcookie('session_Cookie',$session_id,time()+60*60*24*365,'/');
			setcookie('csrf_Cookie',$_SESSION['csrf_token'],time()+60*60*24*365,'/');
		}	
			
		else{
			echo "<h2>";
			echo 'Invalid Credentials! Try Again!';
			echo "</h2>";
			exit();
		}		
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CSRF Double Submit Cookies Pattern</title>
        <link rel="stylesheet" type="text/css" href="source_style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
		<script>		    
            $(document).ready(function(){	
            	var name = "csrf_Cookie" + "=";
                var cookie_value = "";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');

                for(var i = 0; i <ca.length; i++) {
                    var c = ca[i];
                    
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                       cookie_value = c.substring(name.length, c.length);
                       document.getElementById("token_to_be_added").setAttribute('value', cookie_value) ;
                    }
                }	
            });
                    
                
        </script>        
    </head>
   
    <body>
        <div id="parent">
        <form action="new_postpage.php" method="post" id="form_login">          
            <br>  <h1>Post your comments here...</h1>
            <br> <br>
            
            <div id="userpass">
                    Enter your comment: <input type="text" name="comment">
            </div>
            
            <br>
            <input type="Submit" value="Update Comment">
            
            <div id="div1">
                <input type="hidden" name="csrf_token" value="" id="token_to_be_added"/>
            </div>           
        </form>
        </div>
    </body> 
</html>
