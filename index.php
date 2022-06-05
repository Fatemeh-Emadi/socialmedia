<?php
session_start();
$request=$_SERVER["REQUEST_URI"];
$request=str_replace("/fatigram","",$request);
switch($request)
{
    case("/"):

    case("/index"):
        require "controller/index.php";
        break;
    case("/home"):
        if ($_SESSION["login_status"] == null && $_SESSION["login_status"] == false){
            require "controller/index.php"; 
        //require __DIR__ . "/view/home.php";
        }
        else{
            require "controller/home.php";   
        }
        break;
    case("/login"):
        require "controller/login.php";
        break;
     case("/register"):
        require "controller/register.php";
        break;
    case("/posts"):
        require "controller/posts.php";
        break;
    case("/send-comment"):
        require "controller/send_comment.php";
        break;
    case("/send-like"):
        require "controller/send_like.php";
        break;
   
    case("/personal"):
        require "controller/personal.php";
        break;
    case("/follow"):
        require "controller/follow.php";
        break;
    
        case("/logout.php"):
            require "controller/logout.php";
            break;
    default:
    require __DIR__ . $request;
    //require __DIR__ . "view/404.php";
}




?>