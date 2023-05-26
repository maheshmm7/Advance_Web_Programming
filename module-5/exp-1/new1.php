<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
 $connection = mysqli_connect("localhost","root","","registration");

 if ($connection){
     echo "Database connected";
}
else{
   die("Database not connected");
}
?>
<?php if (isset($_POST['submit'])){

  $mail = $_POST['mail'];
  $password = $_POST['password'];

  $hashfunction ="$2y$10$";
  $salt = "usesomesillystringforsalt";

  $hash_salt = $hashfunction . $salt;

  $password = crypt($password,$hash_salt);

}

$query = "INSERT INTO data (mail,password) VALUES ('$mail','$password')";
$result = mysqli_query($connection,$query); 
if ($result){
  echo "Your Data updated";
}
else{
  echo "Your data not updated";
}
    ?>
    <legend><h2>Registartion Form</h2></legend>
    <form action="new1.php" method="post">
    <label for="mail">mail</label>
    <input type="text" name="mail" id="">
    <label for="password">password</label>
    <input type="password" name="password" id="">
    <input type="submit"  name ="submit"value="Submit">


    </form>
</body>
</html>