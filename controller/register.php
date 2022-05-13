<?php include "model/database.php";
session_start();
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
if($password==$confirm_pass){

    if(strlen($username)>=4){
        $users_count=$db->query("SELECT * FROM users WHERE username='$username'")->num_rows;
    
    
    if($users_count == 0)
    {
    $secure_password=md5($password);
    $db->query("INSERT INTO users(first_name,last_name,username,password,email,birthday,mobile_number,gender) VALUES('$firstname','$lastname','$username','$secure_password','$email','$birthday','$phone',$gender)");
    $_SESSION["message"]="Congratulation:) Welcome to our family.";
    $_SESSION["message_type"]="success";
    }
    else
    {
    $_SESSION["message"]="This username is already taken" ;
    $_SESSION["message_type"]="error";
    }
}
else{
    $_SESSION["message"]="Your username length must be >=4 " ;
    $_SESSION["message_type"]="error";
}
}
else{
    $_SESSION["message"]="Unvalid password";
    $_SESSION["message_type"]="error";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //$emailErr = "Invalid email format";
    $_SESSION["message"]="Invalid email format";
    $_SESSION["message_type"]="error";
}

header("Location:index");



?>
