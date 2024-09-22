<?php

$conn = mysqli_connect("localhost","root","","phptutorial");

$s_id=$_GET['id'];

$get_sql="Select * from students Where id='$s_id'";

$query=mysqli_query($conn,$get_sql);

$row= mysqli_fetch_assoc($query);


		if(isset($_POST['update']))
		{
			$s_id=$_GET['id'];

			$s_name = $_POST['name'];

			$s_email = $_POST['email'];

			$update_sql = "Update students set name='$s_name', email='$s_email' where id='$s_id'";

			$data = mysqli_query($conn,$update_sql);


			if ($data) {
		echo"<script>alert('data updated successfully')</script>";

			header("Location:display.php");
			}

		}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Update Page</h1>


	<form action="" method="POST">
		
		<div>
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $row['name'] ?>">
		</div>

		<br><br>

		<div>
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $row['email'] ?>">
		</div>

		<br><br>


		<div>
			 
			<input type="submit" name="update" value="update">
		</div>

		<br><br>
	</form>

</body>
</html>