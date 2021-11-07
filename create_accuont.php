<!DOCTYPE html>
<html>
<head>
	<title>create account</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="btn.css">
<style >


a{
	text-decoration: none;
}

#already {
	display: none;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
  
input[type=number] {
  -moz-appearance: textfield;
}
input{
  font-size: 2vw;
  cursor: alias;
}

</style>


</head>
<body style="background-color: #ADD8E6;margin-top: 0px;margin-bottom: 0;"><!-- comment -->
<div id="c_a_account">
    <h1 id="title">Create account</h1><br>
	<form action="signup.php" method="post">
		<input class="acc_input"  type="text" name="fname" placeholder="First name" required>
		<input class="acc_input" type="text" name="lname" placeholder="Last name" required><br><br>
		<input class="acc_email" type="email" name="email" placeholder="Email Address" required><br><br>
		<input class="acc_password" type="password" name="pwd" placeholder="Password" required><br><br>

		<br>
		<p id="already" align="center">Oops! its looks like you are already registered, please try to <a href="login.php">Log in</a></p><br>
		<button  id="btn_create" >Create Account</button>
		
        </form><br>
	<p id="log_a_create" style="font-size: 20px">Already have an Account?&nbsp;&nbsp; <a href="login.php">Log in</a></p>
</div>
<div style="color:red">
            <?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'successful') echo '<script></script>';
              else if ($_GET['msg'] == 'sorry') echo '<script>
              	  var x = document.getElementById("already");
              	  var y = document.getElementById("log_a");
        		  x.style.display = "block";
        		  y.style.display = "none";
        		  </script>'; 
                }
            ?>
        </div>
        <script type="text/javascript">

        </script>
</body>
</html>