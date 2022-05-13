<?php
session_start();
$request=$_SERVER["REQUEST_URI"];
switch($request)
{
    case("/fatigram/"):

    case("/fatigram/index"):
        require __DIR__ . "/view/index.php";
        break;
    case("/fatigram/home"):
        if ($_SESSION["login_status"] == null && $_SESSION["login_status"] == false){
            require __DIR__ . "/view/index.php"; 
        //require __DIR__ . "/view/home.php";
        }
        else{
            require __DIR__ . "/view/home.php";   
        }
        break;
    case("/fatigram/login"):
        require __DIR__ . "/controller/login.php";
        break;
     case("/fatigram/register"):
        require __DIR__ . "/controller/register.php";
        break;
    case("/fatigram/posts"):
        require __DIR__ . "/controller/posts.php";
        break;
    case("/fatigram/personal.php"):
        require __DIR__ . "/view/personal.php";
        break;
        case("/fatigram/logout.php"):
            require __DIR__ . "/controller/logout.php";
            break;
    default:
    require __DIR__ . "/view/404.php";
}




?>