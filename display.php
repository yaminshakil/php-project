<?php

$conn = mysqli_connect("localhost","root","","phptutorial");

if(isset($_GET['id']))
{
	$s_id = $_GET['id'];

	$del_sql = "Delete from students Where id='$s_id'";

	$data = mysqli_query($conn,$del_sql);

}

	if(isset($_GET['search']))
	{

		$search = $_GET['my_search'];


				$sql = "SELECT * from students Where concat(name,email) LIKE '%$search%' ";


				$result=mysqli_query($conn,$sql);


	}

	else

	{

		$sql ="Select * from students";

		$result= mysqli_query($conn,$sql);


	}





?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>


	<style type="text/css">
		table
		{
			border: 4px solid black;
		}

		th 
		{
			text-align: center;
			font-weight: bold;
			background: skyblue;
		}

		td
		{
			text-align: center;
			padding: 15px;
		}
	</style>
</head>
<body>

	</br></br>

	<div>
		
		<form action="" method="GET">

			<input type="text" name="my_search">

			<input type="submit" name="search" value="Search">
		</form>

	</div>

</br></br>


	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Image</th>
			<th>Delete</th>
			<th>Update</th>
			 
		</tr>


		<?php

		while($row=mysqli_fetch_assoc($result))

		{
		
		?>

		<tr>
			<td>
				<?php echo $row['id'] ?>
			</td>

			<td>
				<?php echo $row['name'] ?>
			</td>

			<td>
				<?php echo $row['email'] ?>
			</td>

			<td>
				<img height="80px" width="80px" alt="Image not found" src="uploads/<?php echo $row['image']; ?>">
			</td>



			<td>
				<a href="display.php?id=<?php echo $row['id'] ?>">Delete</a>
			</td>

			<td>
				<a href="update.php?id=<?php echo $row['id'] ?>">Update</a>
			</td>

			

			 
		</tr>


		<?php 

		}

		?>


	</table>

</body>
</html>