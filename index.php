<?php
$request=$_SERVER["REQUEST_URI"];
switch($request)
{
    case("/fatigram"):
    case("/fatigram/"):
    case("/fatigram/login.php"):
    case("/fatigram/index.php"):
    case("/fatigram/view/index.php"):

        require __DIR__ . "/view/index.php";
        break;
    case("/fatigram/home.php"):
        require __DIR__ . "/view/home.php";
        break;
    case("/fatigram/personal.php"):
        require __DIR__ . "/view/personal.php";
        break;
    default:
    require __DIR__ . "/view/404.php";
}




?>