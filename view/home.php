<?php include "header.php"; ?>
<?php include "navbar.php"; 
$posts=$db->query("SELECT * FROM posts ");
//$user_id=$posts["user_id"];
//$users=$db->query("SELECT * FROM users WHERE id=$user_id")->fetch_assoc();



?>
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-6 ">


      <div class="card">
        <div class="card-header ">
          What's on your mind?
        </div>
        <div class="card-body">
          <form method="post" action="posts" id="new-post-form">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Write caption</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="caption"></textarea>
            </div>
            <div class=" mb-3">

              <input type="file" class="form-control" id="formFile">

            </div>
          </form>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit" form="new-post-form">Upload new post</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center mt-5">
    <div class="col-6 ">
      <?php foreach($posts as $post):?>
      <div class="card">
        <div class="card-header ">
          <div class="row">
            <div class="col-2 mt-3">
              <img src="" class="img-fluid rounded-circle " alt="...">

            </div>
            
                  
              <p>
                
           
              </p>
              <p class="text-secondary"> <small>
              <?php echo $post["time"];?>
                </small></p>

            </div>

          </div>
        </div>

        <div class="card-body">
          <p><?php echo $post["caption"];?></p>
          <img src="<?php echo $post["media"];?>" class="img-fluid" >
        </div>
       
        <div class="card-footer">
          <button type="button" class="btn  position-relative mt-1">
            <i class="fa fa-heart"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              99+
              <span class="visually-hidden">unread messages</span>
            </span>
          </button>
        </div>
      </div>
      <br>
      <br>
     <?php endforeach;?>
    </div>
  </div>

</div>


<?php include "footer.php"; ?>