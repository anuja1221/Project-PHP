# Project-PHP
#Login.PHP
<html>
	<head>
		<style>
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
			input[type=text] {
				width:100%;
				padding: 12px 20px;
				margin: 8px 0;
				border: 1px solid red;
				border-radius: 4px;
			}
			input[type=password]{
				width:100%;
				padding: 12px 20px;
				margin: 8px 0;
				border: 1px solid red;
				border-radius: 4px;
			}
			body{
				height:100%;
				margin:0;
			}
			.bg{
				background-image:url('sunset.jpg');
				height:100%;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}
		</style>
		<div class="bg">
		<center>
			<body>
				<div>
				<form name="login" method="post">
					<h1>Welcome To Adventure Land</h1><h3>LOGIN HERE:</h3>
					<table>
						<tr><td><b>Enter EmailId:</b></td><td><input size="20" type="text" name="email" placeholder="Email Address"/></td></tr>
						<tr><td><b>Password:</b></td><td><input size="20" type="password" name="pwd" placeholder="password"/></td></tr>
					</table>
					<input type="submit" name="submit1" value="Sign In"/><br>
					<input type="submit" name="fwpd" value="Forgot Password"/><br>
				</form></div>

			</body></center></div>
	</head>
</html>
<?php
	if (isset($_POST['submit1']))
	{
		session_start();
		if (empty($_POST['email'])||empty($_POST['pwd']))
		{
			echo"<script>alert('Please enter both values')</script>";
		}
		else
		{
			$uemail=$_POST['email'];
			$upass=$_POST['pwd'];
			$conn=mysqli_connect('localhost','anuja','@Anuja_kumari12','USER');
			if (!$conn)
			{
				echo "Somekind of connection Error".mysqli_connect_error();
			}
			else
			{
				$uc=mysqli_query($conn,"SELECT count(*) from user_info where email='$uemail'");
				$pc=mysqli_query($conn,"SELECT password from user_info where email='$uemail'");
				$u1=mysqli_fetch_row($uc);
				$p1=mysqli_fetch_row($pc);
				echo $u1[0];
				if ($u1[0]!=1)
				{
					echo "<script>alert('Email ID doesn't exist')</script>";
				}
				else
				{
					if ( $p1[0] == $upass)
					{
						$_SESSION['aemail']=$_POST['email'];
						header('location:userhomepage.php');
					}
					else
					{
						echo "<script>alert('Invalid Password')</script>";
					}
				}
			}
		}
	}
	if (isset($_POST['fwpd']))
	{
		header("location:forgot_pwd.php");
	}
?>
