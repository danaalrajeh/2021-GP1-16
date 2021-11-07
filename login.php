<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="btn.css">
<style >

	#title{

		padding-left: 45%;
    

	}



#log_a_login{
  color:  #cccccc;
  padding-left: 40%;
  padding-bottom: 13%;
  display: block;
}

#sig_a{
  display: none;
}

a{
	text-decoration: none;
}
</style>


</head>
<body style="background-color: #ADD8E6;margin: 0px;padding: 0px;">


<div id="c_a_log">
	<h1 id="title">Login</h1>
	<form action="login_process.php" method="post">
		<input class="acc_email"  type="email" name="email" placeholder="Email Address"><br><br>
		<input  class="acc_password" type="password" name="pwd" placeholder="Password"><br><br><br><br>
                <button id="btn_create1">Login</button><br>
        </form><br>
	<p id="log_a_login">Don't have an Account? <a href="create_accuont.php"> &nbsp;Sign up</a></p>
  <p id="sig_a" align="center">Oops! one of the credentials is incorrect, please try again or <a href="create_accuont.php" style="color: #D8200D;">Sign up</a> if you haven't registered</p>
</div>

<div style="color:red">
            <?php
                if(isset($_GET['message']) && !empty($_GET['message'])){
                  if ($_GET['message'] == 'error') echo '<script>
                        var x = document.getElementById("sig_a");
                        var y = document.getElementById("log_a");
                        x.style.display = "block";
                        y.style.display = "none";
                  </script>';
              else if ($_GET['message'] == 'empty') echo '<script>alert("please enter email and password")</script>';

                  
                }
            ?>
        </div>
</body>
</html>