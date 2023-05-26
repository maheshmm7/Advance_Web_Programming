<?php

$connection = mysqli_connect("localhost","root","","registration");

if(!$connection){
    die( "Database connection failed");
}

$query= "SELECT * FROM data";

$result=mysqli_query($connection,$query);

if(!$result){
    echo  ("query failed " . mysqli_error($connection));
    }else{
        echo "result is working <br/>";

        while($row= mysqli_fetch_assoc($result))
            {
                $id = $row['id'];
                $mail = $row['mail'];
                $password = $row['password'];
                echo"<table border='1'>";
                echo"<tr>";
                echo"<td>$id</td>";
                echo"<td>$mail</td>";
                echo"<td>$password</td>";
                echo"<tr/>";
                echo"</table>";
            }
    }

?>