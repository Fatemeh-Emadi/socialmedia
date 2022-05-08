<?php include "database.php";

$firstname = $_POST["fname"];
$lastname = $_POST["lname"];
$username = $_POST["username"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$confirm_pass = $_POST["confirmpass"];
$birthday = $_POST["birthday"];
$gender_val = $_POST["gender"];
//echo"a1";


if ($gender_val == "female")
{
    $gender = 1;
} 
else 
{
    $gender = 0;
}
$pass_length=strlen($password);
if($password==$confirm_pass && $pass_length>4){
    
    $db->query("INSERT INTO users(first_name,last_name,username,password,email,birthday,mobile_number,gender) VALUES('$firstname','$lastname','$username','$password','$email','$birthday','$phone',$gender)");
    //echo"a3";
    header("Location: ../view/index.php");
}
else{
    echo "Unvalid password";
}




?>