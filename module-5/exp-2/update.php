<?php include "db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update form</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            
            
            $mail=$_POST['mail'];
            $password=$_POST['password'];
            $id=$_POST['id'];

            
            $query  = "UPDATE data SET ";
            $query .= "mail = '$mail',";
            $query .= "password = '$password'";
            $query .= "WHERE id = '$id'";

            
            $result = mysqli_query($connection,$query);
            if(!$result)
            {
                die("Query failed". mysqli_error($connection) );
            }else{
                echo "<br /> Updated Your Record";
            }
        }
    
    ?>

<h2>Update Form</h2>
<form action="update.php" method="post">
<input type="email" name="mail" placeholder="enter your mail">
<input type="password" name="password" placeholder="enter your password">
<select name="id" id="">

<?php 

$query= "SELECT * FROM data";
$result=mysqli_query($connection,$query);

if(!$result){
    echo  ("query failed " . mysqli_error($connection));
    }else{
        echo "result is working <br/>";

        while($row= mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                echo "<option value='$id'>$id</option>";
            }
        }
?>

    </select>
<input type="submit" value="Update" name="submit">
</form>
</body>
</html>