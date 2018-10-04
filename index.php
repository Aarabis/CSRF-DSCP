<!DOCTYPE html>
<html>
	<head>
		<title>CSRF Double Submit Cookies Pattern</title>
        <link rel="stylesheet" type="text/css" href="source_style.css">   
	</head>
    
	<body>        
        <div id="parent">
            <form action="home_page.php" method="post" id="form_login">                
                <h1>Login </h1>
                <div id="userpass">
                    Username: <input type="text" name="username" placeholder="Enter Username">                    
					<br> <br>
                    Password: <input type="password" name="password" placeholder="Enter Username">
                    <br> <br>
                	<input type="Submit" value="Login">  
                </div>                    
            </form>
        </div>
	</body> 
</html>

