<?php

$conn = mysqli_connect("localhost","root","","phptutorial");

    if(isset($_POST['register']))
    {
        $name = $_POST['username'];

        $email = $_POST['email'];

        $pass = $_POST['password'];

        $hash = password_hash($pass, PASSWORD_DEFAULT);



        $image_name=$_FILES['my_image']['name'];

        $tmp=explode(".",$image_name);

        $newfilename = round(microtime(true)).'.'.end($tmp);

        $uploadpath="uploads/".$newfilename;

        move_uploaded_file($_FILES['my_image']["tmp_name"],$uploadpath );



        $sql = "INSERT INTO students(name,email,password,image) VALUES ('$name','$email','$hash','$newfilename')";


        $data=mysqli_query($conn,$sql);

        if ($data) 
        {
            
            echo "<script>alert('Data Uploaded Succesfully');</script>";
        }

        else
        {
            echo "<script>alert('Data Not Uploaded ');</script>";
        }


    }


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <style type="text/css">
        label
        {   
            display: block;
            width: 300px;
        }
    </style>
</head>
<body>

    <h2>Upload data to datbase in PHP</h2>


    <div>
        
        <form action="#" method="POST" enctype="multipart/form-data">
            
            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>

            <br><br>

            <div>
                <label>email</label>
                <input type="email" name="email">
            </div>

            <br><br>
            <div>
                <label>password</label>
                <input type="password" name="password">
            </div>

            <br><br>

            <div>
                <input type="file" name="my_image">
            </div>

            <br><br>
             
            <div>
               
                <input type="submit" name="register" value="register">
            </div>


        </form>
    </div>

</body>
</html>