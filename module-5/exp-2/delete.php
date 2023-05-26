<?php include "db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete form</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            
            $id=$_POST['id'];

            
            $query  = " DELETE from data  ";
            $query .= "WHERE id = '$id'";

            $result = mysqli_query($connection,$query);
            if(!$result)
            {
                die("Query failed". mysqli_error($connection) );
            }else{
                echo "<br /> $id Record Deleted ";
            }
        }
    
    ?>

<h2>Delete Form</h2>
<form action="delete.php" method="post">
<select name="id" id="">

<?php 

$query= "SELECT * FROM data";
$result=mysqli_query($connection,$query);

if(!$result){
    echo  ("query failed " . mysqli_error($connection));
    }else{
        echo "delete <br/>";

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