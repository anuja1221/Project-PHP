<html>
	<head>
		<style>
			input[type=text]{
				width:100%;
				padding: 12px 20px;
				margin: 8px 0;
				border: 1px solid red;
				border-radius: 4px;;
			}
			input[type=submit]{
				width:10%;
				background-color:slateblue;
				color:white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			}
			input[type=password]{
				width:100%;
				padding: 12px 20px;
				margin: 8px 0;
				border: 1px solid red;
				border-radius: 4px;;
			}
		</style>
		<center>
		<body>
			<h1>Forgot Password:</h1>
			<form name='login' method="post">
				<table>
					<tr><td><b>Enter email ID</b></td><td><input type="text" name="mail" placeholder="Email address"/></td></tr>
					<tr><td><b>New Password:</b></td><td><input type="password" name="pwd" placeholder="new password"/></td></tr>
					<tr><td><b>Confirm Password:</b></td><td><input type="password" name="confpwd" placeholder="confirm password"/></td></tr>
				</table>
					<input type="submit" name="sub" value="Save"/>
			</form>


		</body>
	</head>
</html>
<?php
	$conn=mysqli_connect('localhost','anuja','@Anuja_kumari12','USER');
	if (isset($_POST['sub']))
	{
		if (empty($_POST['mail']) || empty($_POST['pwd']) || empty($_POST['confpwd']))
		{
			echo "<script>alert('Enter The Values')</script>";
		}
		else
		{
			$uemail=$_POST['mail'];
			$ua=mysqli_query($conn,"select count(*) from user_info where email='$uemail'");
			$uc=mysqli_fetch_row($ua);
			if ($uc[0]!=1)
			{
				echo "<script>alert('Invalid Email_id')</script>";
			}
			else
			{
				$pass=$_POST['pwd'];
				$confirm=$_POST['confpwd'];
				if (preg_match("/^[A-Za-z0-9!$*_]+/", $pass))
				{
					if ($pass==$confirm)
					{
						mysqli_query($conn,"update user_info SET password='$pass' where email='$uemail'");
						echo "<script>alert('password change successfull');document.location='login.php'</script>";
					}
					else
					{
						echo "<script>alert('passwords does not match')</script>";
					}

				}
				else
				{
					echo "<script>alert('Invalid Password pattern')</script>";
					
				}
			}
		}
	}
?>
