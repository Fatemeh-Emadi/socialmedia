<?php 
//session_start();
include "model/database.php";

$caption = $_POST["caption"];
$userid=$_SESSION["user_id"];


 if (isset($_FILES["user_file"]["name"]))
{
     
      $file= "images/posts/" .$_FILES["user_file"]["name"];
      $file_name=$_FILES["user_file"]["name"];
      move_uploaded_file($_FILES["user_file"]["tmp_name"] ,$file);
      $file_name_ex = explode('.', $file_name); // تقسیم کردن نام فایل به دو قسمت
      $file_format = end($file_name_ex); // گرفتن قسمت دوم فایل (فرمت) آن
      $formats_image = array("png", "PNG", "jpg", "JPG"); // فرمت های قابل قبول
      $formats_audio = array("mp3", "wav","MP3","WAV");
      $formats_video = array("mp4", "MP4","mpeg","MPEG");
      if(in_array($file_format, $formats_image))       
      {
       
      $type = 'image';
 
      $db->query("INSERT INTO posts(media,caption,user_id,file_type) VALUES ('$file','$caption',$userid,'$type')");
      }
      elseif(in_array($file_format, $formats_audio))
      {
        $type = 'audio';
 
        $db->query("INSERT INTO posts(media,caption,user_id,file_type) VALUES ('$file','$caption',$userid,'$type')");
      }
      elseif(in_array($file_format, $formats_video))
      {
        $type = 'video';
 
        $db->query("INSERT INTO posts(media,caption,user_id,file_type) VALUES ('$file','$caption',$userid,'$type')");
      }


      header("Location:home");
}
        
?>