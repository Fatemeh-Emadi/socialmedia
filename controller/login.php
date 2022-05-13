<?php 

include "model/database.php";
//session_start();
$username=$_POST["username"];
$password=$_POST["password"];
$secure_password=md5($password);
$result=$db->query("SELECT * FROM users WHERE username='$username' AND password='$secure_password'");
$check_username=$db->query("SELECT * FROM users WHERE username='$username'");

$users_count=$result->num_rows;
$username_count=$check_username->num_rows;

if($users_count == 1)
{
    $user = $result->fetch_assoc();
    $_SESSION["login_status"] = true;
    $_SESSION["username"] = $username;
    $_SESSION["user_id"] = $user["id"];
    header("Location: home");
}
else{
    if($username_count==0){
    $_SESSION["message"]="incorrect username ";
    $_SESSION["message_type"]="error";
    header("Location: index");
    }
    else 
    {
        $_SESSION["message"]="incorrect password ";
        $_SESSION["message_type"]="error";
        header("Location: index");
    }
}


?>